{{
    Form::dateGroup(
        'expected_shipment_date',
        trans('sales-purchase-orders::sales_orders.expected_shipment_date'),
        'calendar',
        [
            'id'               => 'expected_shipment_date',
            'class'            => 'form-control datepicker',
            'period'           => setting('purchase_order.shipment_terms'),
            'show-date-format' => company_date_format(),
            'date-format'      => 'Y-m-d',
            'min-date'         => 'form.issued_at',
            'min-date-dynamic' => 'min_due_date',
            'data-value-min'   => true,
            'autocomplete'     => 'off',
        ],
        $expected_shipment_date
    )
}}
