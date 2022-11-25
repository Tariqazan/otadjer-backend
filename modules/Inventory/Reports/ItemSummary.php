<?php

namespace Modules\Inventory\Reports;

use App\Abstracts\Report;
use App\Models\Common\Item;
use App\Events\Report\RowsShowing;

class ItemSummary extends Report
{
    public $default_name = 'inventory::general.reports.name.item_summary';

    public $category = 'inventory::general.name';

    public $icon = 'fa fa-cubes';

    public function getGrandTotal()
    {
        if (!$this->loaded) {
            $this->load();
        }

        $grand_total = trans('general.na');

        return $grand_total;
    }

    public function setViews()
    {
        parent::setViews();
        $this->views['table.header'] = 'inventory::reports.item-summary.table.header';
        $this->views['table.rows'] = 'inventory::reports.item-summary.table.rows';
        $this->views['table.footer'] = 'inventory::reports.item-summary.table.footer';
    }

    public function setData()
    {
        $items = Item::get();

        $inventory_items = [];

        foreach ($items as $item) {
            if (! $item->inventory()->first()) {
                $this->unsetCoreItem($item);

                continue;
            }

            $inventory_items[] = $item;
        }

        $this->setTotals($inventory_items, '');
    }

    public function setTotals($items, $date_field, $check_type = false, $table = 'default', $with_tax = true)
    {
        foreach ($items as $item) {
            $this->row_values[$table][$item->id]['item_id'] = $item->id;
            $this->row_values[$table][$item->id]['warehouses'] = $item->inventory()->get();
            $this->row_values[$table][$item->id][$this->columns[1]] = $item->category->name;
            $this->row_values[$table][$item->id][$this->columns[2]] = $item->inventory()->value('sku');
            $this->row_values[$table][$item->id][$this->columns[3]] = $item->inventory()->value('unit');
            $this->row_values[$table][$item->id][$this->columns[4]] = $item->inventory()->value('barcode');
            $this->row_values[$table][$item->id][$this->columns[5]] = $item->inventory()->value('opening_stock');
            $this->row_values[$table][$item->id][$this->columns[6]] = $item->inventory()->value('reorder_level');
            $this->row_values[$table][$item->id][$this->columns[7]] = $item->sale_price;
            $this->row_values[$table][$item->id][$this->columns[8]] = $item->purchase_price;
        }
    }

    public function setColumns()
    {
        $this->columns[0] = trans('general.name');
        $this->columns[1] = trans_choice('general.categories', 1);
        $this->columns[2] = trans('inventory::general.sku');
        $this->columns[3] = trans('inventory::general.unit');
        $this->columns[4] = trans('inventory::general.barcode');
        $this->columns[5] = trans('inventory::general.stock');
        $this->columns[6] = trans('inventory::items.reorder_level');
        $this->columns[7] = trans('items.sales_price');
        $this->columns[8] = trans('items.purchase_price');

        foreach ($this->columns as $column) {
            foreach ($this->tables as $table) {
                $this->footer_totals[$table][$column] = 0;
            }
        }

        $this->dates = $this->columns;
    }

    public function setDates()
    {
        $this->setColumns();
    }

    public function setRows()
    {
        event(new RowsShowing($this));

        if (!isset($this->row_values['default'])) {
            return;
        }

        foreach ($this->row_values['default'] as $id => $row_value) {
            $this->row_values['default'][$id][trans('general.name')] = $this->row_names['default'][$id];
        }
    }

    public function unsetCoreItem($item)
    {
        foreach ($this->row_values['default'] as $key => $row_value) {
            if ($row_value[trans('general.name')] == $item->name) {
                unset($this->row_values['default'][$key]);
            }
        }
    }
}
