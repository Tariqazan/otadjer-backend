{{
    Form::dateGroup(
        'expire_at',
        trans('estimates::general.expiry_date'),
        'calendar',
        [
            'id'               => 'expire_at',
            'class'            => 'form-control datepicker',
            'period'           => setting('estimates.estimate.approval_terms'),
            'show-date-format' => company_date_format(),
            'date-format'      => 'Y-m-d',
            'min-date'         => 'form.issued_at',
            'min-date-dynamic' => 'min_due_date',
            'data-value-min'   => true,
            'autocomplete'     => 'off',
        ],
        $expire_at
    )
}}
