<div class="timeline-block">
    <span class="timeline-step badge-info">
        <i class="far fa-user"></i>
    </span>

    <div class="timeline-content">
        <h2 class="font-weight-500">
            {{ trans('sales-purchase-orders::purchase_orders.confirm_purchase_orders') }}
        </h2>

        <small>
            {{ trans_choice('general.statuses', 1) . ':' }}
        </small>
        <small>
            @if($document->status !== 'issued')
                {{ trans('sales-purchase-orders::purchase_orders.statuses.not_issued') }}
            @else
                {{ trans('sales-purchase-orders::purchase_orders.statuses.issued') }}
            @endif
        </small>

        <div class="mt-3">
            @can('update-sales-purchase-orders-purchase-orders')
                <a href="{{ route('sales-purchase-orders.purchase-orders.issued', $document->id) }}"
                   class="btn btn-info btn-sm header-button-top">
                    {{ trans('sales-purchase-orders::purchase_orders.mark_issued') }}
                </a>
            @endcan
        </div>
    </div>
</div>
