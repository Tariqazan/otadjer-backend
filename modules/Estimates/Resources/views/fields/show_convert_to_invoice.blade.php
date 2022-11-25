<div class="timeline-block">
    <span class="timeline-step badge-success">
        <i class="far fa-money-bill-alt"></i>
    </span>

    <div class="timeline-content">
        <h2 class="font-weight-500">
            {{ trans('estimates::general.convert_to_invoice') }}
        </h2>

        <small>
            {{ trans_choice('general.statuses', 1) . ':' }}
        </small>
        <small>
            @if($document->status !== 'invoiced')
                {{ trans('documents.statuses.not_invoiced') }}
            @else
                {{ trans('documents.statuses.invoiced') }}
            @endif
        </small>

        <div class="mt-3">
            @can('update-estimates-estimates')
                <a href="{{ route('estimates.estimates.convert', $document->id) }}"
                   class="btn btn-success btn-sm header-button-top">
                    {{ trans('estimates::general.convert_to_invoice') }}
                </a>
            @endcan
        </div>
    </div>
</div>
