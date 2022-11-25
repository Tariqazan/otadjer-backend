<div class="timeline-block">
    <span class="timeline-step badge-success">
        <i class="far fa-money-bill-alt"></i>
    </span>

    <div class="timeline-content">
        <h2 class="font-weight-500">
            {{ trans('sales-purchase-orders::purchase_orders.convert_to_bill') }}
        </h2>

        <small>
            {{ trans_choice('general.statuses', 1) . ':' }}
        </small>
        <small>
            @if($document->status !== 'billed')
                {{ trans('sales-purchase-orders::purchase_orders.statuses.not_billed') }}
            @else
                {{ trans('sales-purchase-orders::purchase_orders.statuses.billed') }}
            @endif
        </small>

        <div class="mt-3">
            @can('update-sales-purchase-orders-purchase-orders')
                <a href="{{ route('sales-purchase-orders.purchase-orders.convert-to-bill', $document->id) }}"
                   class="btn btn-success btn-sm header-button-top">
                    {{ trans('sales-purchase-orders::purchase_orders.convert_to_bill') }}
                </a>
            @endcan
        </div>
    </div>
</div>
