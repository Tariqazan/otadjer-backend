<div class="timeline-block">
    <span class="timeline-step badge-success">
        <i class="far fa-money-bill-alt"></i>
    </span>

    <div class="timeline-content">
        <h2 class="font-weight-500">
            {{ trans('sales-purchase-orders::sales_orders.convert_to_invoice') }}
        </h2>

        <small>
            {{ trans_choice('general.statuses', 1) . ':' }}
        </small>
        <small>
            @if($document->status !== 'invoiced')
                {{ trans('sales-purchase-orders::sales_orders.statuses.not_invoiced') }}
            @else
                {{ trans('sales-purchase-orders::sales_orders.statuses.invoiced') }}
            @endif
        </small>

        <div class="mt-3">
            @can('update-sales-purchase-orders-sales-orders')
                <a href="{{ route('sales-purchase-orders.sales-orders.convert-to-invoice', $document->id) }}"
                   class="btn btn-success btn-sm header-button-top">
                    {{ trans('sales-purchase-orders::sales_orders.convert_to_invoice') }}
                </a>
                <a href="{{ route('sales-purchase-orders.sales-orders.convert-to-purchase-order', $document->id) }}"
                   class="btn btn-white btn-sm header-button-top">
                    {{ trans('sales-purchase-orders::sales_orders.convert_to_purchase_order') }}
                </a>
            @endcan
        </div>
    </div>
</div>
