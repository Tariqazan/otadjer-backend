<div class="timeline-block">
    <span class="timeline-step badge-info">
        <i class="far fa-user"></i>
    </span>

    <div class="timeline-content">
        <h2 class="font-weight-500">
            {{ trans('sales-purchase-orders::sales_orders.confirm_sales_orders') }}
        </h2>

        <small>
            {{ trans_choice('general.statuses', 1) . ':' }}
        </small>
        <small>
            @if($document->status !== 'confirmed')
                {{ trans('sales-purchase-orders::sales_orders.statuses.not_confirmed') }}
            @else
                {{ trans('sales-purchase-orders::sales_orders.statuses.confirmed') }}
            @endif
        </small>

        <div class="mt-3">
            @can('update-sales-purchase-orders-sales-orders')
                <a href="{{ route('sales-purchase-orders.sales-orders.confirmed', $document->id) }}"
                   class="btn btn-info btn-sm header-button-top">
                    {{ trans('sales-purchase-orders::sales_orders.mark_confirmed') }}
                </a>
            @endcan
        </div>
    </div>
</div>
