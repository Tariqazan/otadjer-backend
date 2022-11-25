<tr class="row rp-border-top-1 font-size-unset">
    @foreach ($rows as $row_id => $row)
        @if ($row_id == trans('general.name'))
            <td class="col-sm-3">
                <a href="{{ route('inventory.items.show', $rows['item_id']) }}">{{ $row }}</a>
                <i class="fas fa-angle-down"
                   data-toggle="collapse"
                   data-target="#collapse-{{ $rows['item_id'] }}"
                   aria-expanded="1"
                   aria-controls="collapse-{{ $rows['item_id'] }}">
                </i>
            </td>
        @elseif ($row_id == trans('inventory::general.barcode'))
            <td class="col-sm-2">{{ $row }}</td>
        @elseif ($row_id == trans('inventory::general.stock'))
            <td class="col-sm-1">
                <div class="collapse show"
                     id="collapse-{{ $rows['item_id'] }}"
                     aria-expanded="true"
                     data-parent="#collapse-{{ $rows['item_id'] }}">
                    {{ $row }}
                </div>
            </td>
        @elseif ($row_id == trans('inventory::items.reorder_level'))
            <td class="col-sm-1"></td>
        @elseif ($row_id == trans('items.sales_price') || $row_id == trans('items.purchase_price'))
        <td class="col-sm-1">
            {{ money($row, setting('default.currency'), true) }}
        </td>
        @elseif ($row_id == 'item_id' || $row_id == 'warehouses')
        @else
            <td class="col-sm-1">{{ $row }}</td>
        @endif
    @endforeach
</tr>
@foreach($rows['warehouses'] as $inventory_item)
    <tr class="row rp-border-top-1 font-size-unset collapse" id="collapse-{{ $rows['item_id']}}" data-parent="#collapse-{{ $rows['item_id'] }}">
        @foreach ($rows as $row_id => $row)
            @if ($row_id == trans('general.name'))
                <td class="col-sm-3" style="margin-left:25px;">
                    <i class="fas fa-level-up-alt fa-rotate-90 mr-1"></i>
                    <a href="{{ route('inventory.warehouses.show', $inventory_item->warehouse_id) }}">
                        {{ $inventory_item->warehouse->name }}
                    </a>
                </td>
            @elseif ($row_id == trans('inventory::general.barcode'))
                <td class="col-sm-2"></td>
            @elseif ($row_id == trans('inventory::general.stock'))
                @if ($inventory_item->reorder_level && $inventory_item->opening_stock < $inventory_item->reorder_level)
                    <td class="col-sm-1 d-none d-md-block text-danger" style="margin-left:-25px;">
                        {{ $inventory_item->opening_stock }}
                    </td>
                @else
                    <td class="col-sm-1 d-none d-md-block" style="margin-left:-25px;">
                        {{ $inventory_item->opening_stock }}
                    </td>
                @endif
            @elseif ($row_id == trans('inventory::items.reorder_level'))
                <td class="col-sm-1 text-left d-none d-md-block">
                    {{ $inventory_item->reorder_level }}
                </td>
            @elseif ($row_id == 'item_id' || $row_id == 'warehouses')
            @else
                <td class="col-md-1"></td>
            @endif
        @endforeach
@endforeach
