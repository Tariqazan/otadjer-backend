<?php

namespace Modules\CompositeItems\Reports;

use Date;
use App\Abstracts\Report;
use App\Models\Document\Document;
use App\Models\Banking\Transaction;
use Modules\CompositeItems\Models\CompositeItem as Model;

class SaleSummary extends Report
{
    public $default_name = 'composite-items::general.reports.name.sale_summary';

    public $category = 'composite-items::general.name';

    public $icon = 'fa fa-users';

    public $columns = [];

    public function setViews()
    {
        parent::setViews();
        $this->views['table.header']    = 'composite-items::reports.sale_summary.table.header';
        $this->views['table.rows']      = 'composite-items::reports.sale_summary.table.rows';
        $this->views['table.footer']    = 'composite-items::reports.sale_summary.table.footer';
    }

    public function setRows()
    {
        $models = Model::get();

        foreach ($this->dates as $date) {
            foreach ($this->tables as $table) {
                foreach ($models as $model) {
                    $this->row_names[$table][$date][$model->id][] = $model->item->name;
                    $this->row_values[$table][$date][$model->id]['main'] = 0;

                    foreach ($model->composite_items as $composite_item) {
                        $this->row_names[$table][$date][$model->id]['sub'][$composite_item->id] = $composite_item->item->name;
                        $this->row_values[$table][$date][$model->id]['sub'][$composite_item->item_id] = 0;
                    }
                }
            }
        }
    }

    public function setData()
    {
        $documents = Document::invoice()->paid()->get();

        foreach ($documents as $document) {
            foreach ($document->items as $document_item) {
                $model = Model::where('item_id', $document_item->item_id)->first();
                foreach ($model->composite_items as $composite_item) {
                    $date = $this->getFormattedDate(Date::parse($model->created_at));

                    if (empty($date)) {
                        continue;
                    }
        
                    $this->row_values['default'][$date][$model->id]['sub'][$composite_item->item_id] += $composite_item->quantity;
    
                }
                $this->row_values['default'][$date][$model->id]['main']++;
        
                $this->footer_totals['default'][$date]++;
            }
        }
    }

    public function getGrandTotal()
    {
        $total = trans('general.na');

        return $total;
    }
}
