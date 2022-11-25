{{
    Form::dateGroup(
        'expected_delivery_date',
        trans('sales-purchase-orders::purchase_orders.expected_delivery_date'),
        'calendar',
        [
            'id'               => 'expected_delivery_date',
            'class'            => 'form-control datepicker',
            'period'           => setting('purchase_order.delivery_terms'),
            'show-date-format' => company_date_format(),
            'date-format'      => 'Y-m-d',
            'min-date'         => 'form.issued_at',
            'min-date-dynamic' => 'min_due_date',
            'data-value-min'   => true,
            'autocomplete'     => 'off',
        ],
        $expected_delivery_date
    )
}}
