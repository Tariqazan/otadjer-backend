@if (!isset($field->show) || (isset($field->show) && $field->show == 'always') || (isset($field->show) && $field->show == 'if_filled' && !empty($field_value)))
    @if($show_type == 'default')
        <strong>
            {{ $field->name }}:
        </strong>
        <span class="float-right">
            {{ $field_value }}
        </span>
        <br>
        <br>
    @elseif($show_type == 'items')
        <br>
        <small>
            {{ $field->name }}:{{ $field_value }}
        </small>
    @elseif($show_type == 'transactions')
        <tr>
            <td style="width: 20%; padding-bottom:3px; font-size:14px; font-weight: bold;">
                {{ $field->name }}:
            </td>

            <td class="border-bottom-1" style="width:80%; padding-bottom:3px; font-size:14px;">
                {{ $field_value }}
            </td>
        </tr>
    @elseif($show_type == 'informations')
        <li class="list-group-item border-0 border-top-1">
            <div class="font-weight-600">{{ $field->name }}</div>
            <div><small>{{ $field_value }}</small></div>
        </li>
    @endif
@endif