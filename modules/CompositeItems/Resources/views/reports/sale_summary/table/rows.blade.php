{{-- @dd($id,$class) --}}
@php $row_total = 0; @endphp
<tr class="row rp-border-top-1 font-size-unset">
    <td class="{{ $class->column_name_width }}">{{ $class->row_names[$table][$id] }}</td>
    @foreach($rows as $row)
        @php $row_total += $row; @endphp
        <td class="{{ $class->column_value_width }} text-right px-0">{{ $row }}</td>
    @endforeach
    <td class="{{ $class->column_name_width }} text-right pl-0 pr-4">{{ $row_total }}</td>
</tr>