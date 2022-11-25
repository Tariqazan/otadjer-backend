<thead class="thead-light">
    <tr class="row font-size-unset">
        @foreach($class->columns as $column)
            @if ($column == trans('general.name'))
                <th class="col-sm-3">{{ $column }}</th>
            @elseif ($column == trans('inventory::general.barcode'))
                <th class="col-sm-2">{{ $column }}</th>
            @else
                <th class="col-sm-1">{{ $column }}</th>
            @endif
        @endforeach
    </tr>
</thead>
