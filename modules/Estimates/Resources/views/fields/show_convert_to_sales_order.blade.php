<div class="timeline-block">
    <span class="timeline-step badge-success">
        <i class="fas fa-file-invoice-dollar"></i>
    </span>

    <div class="timeline-content">
        <h2 class="font-weight-500">
            {{ trans('estimates::general.convert_to_sales_order') }}
        </h2>

        <div class="mt-3">
            @can('update-estimates-estimates')
                <a href="{{ route('estimates.estimates.convert-to-sales-order', $document->id) }}"
                   class="btn btn-success btn-sm header-button-top">
                    {{ trans('estimates::general.convert_to_sales_order') }}
                </a>
            @endcan
        </div>
    </div>
</div>
