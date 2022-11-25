<?php

namespace Modules\Inventory\Widgets\Warehouses;

use App\Abstracts\Widget;
use App\Models\Common\Item;
use App\Traits\Currencies;
use Modules\Inventory\Models\History;

class TotalExpense extends Widget
{
    use Currencies;

    public $default_name = 'inventory::widgets.total_expense';

    public $views = [
        'header' => 'partials.widgets.stats_header',
    ];

    public function getDefaultSettings()
    {
        return [
            'width' => 'col-md-4'
        ];
    }

    public function show($item = null)
    {
        if ($item) {
            $this->views['header'] = 'inventory::widgets.standard_header';
        } else {
            $this->views['header'] = 'inventory::widgets.stats_header';
        }

        $histories = History::where('warehouse_id', $item->id)
                            ->where('type_type', 'App\Models\Document\DocumentItem')
                            ->get();

        $value = 0;

        foreach ($histories as $history) {
            $document_item = $history->document_item;
            if ($document_item && $document_item->type == 'bill') {
                $value += $this->convertToDefault($document_item->total, $document_item->document->currency_code, $document_item->document->currency_rate);
            }
        }

        return $this->view('inventory::widgets.show_total_expense', [
            'total_expense' => $value,
        ]);
    }
}
