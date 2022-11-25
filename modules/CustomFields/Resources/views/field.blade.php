@switch($input_type)
    @case('textGroup')
    @case('dateGroup')
    @case('dateTimeGroup')
    @case('timeGroup')
        {{ Form::$input_type($field->code, mb_convert_case($field->name, MB_CASE_TITLE, "UTF-8"), $field->icon, $input_attributes, $input_values, $input_col) }}
        @break

    @case('selectGroup')
        {{ Form::$input_type($field->code, mb_convert_case($field->name, MB_CASE_TITLE, "UTF-8"), $field->icon, $input_options, $input_values, $input_attributes, $input_col) }}
        @break
    
    @case('radioGroup')
        {{ Form::$input_type($field->code, mb_convert_case($field->name, MB_CASE_TITLE, "UTF-8"), $input_values, trans('general.yes'), trans('general.no'), $input_attributes, $input_col) }}
        @break
    
    @case('checkboxGroup')
        {{ Form::$input_type($field->code, mb_convert_case($field->name, MB_CASE_TITLE, "UTF-8"), $input_options, 'value', 'id', $input_values, $input_attributes, $input_col) }}
        @break
    
    @case('textareaGroup')
        {{ Form::$input_type($field->code, mb_convert_case($field->name, MB_CASE_TITLE, "UTF-8"), $field->icon, $input_values, $input_attributes, $input_col) }}
        @break

    @default
        @break
@endswitch
