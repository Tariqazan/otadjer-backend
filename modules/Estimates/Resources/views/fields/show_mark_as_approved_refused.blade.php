<div class="timeline-block">
    <span class="timeline-step badge-info">
        <i class="far fa-user"></i>
    </span>

    <div class="timeline-content">
        <h2 class="font-weight-500">
            {{ trans('estimates::general.mark_approved_or_refused') }}
        </h2>

        <small>
            {{ trans_choice('general.statuses', 1) . ':' }}
        </small>
        <small>
            @if($document->status === 'approved')
               {{ trans('documents.statuses.approved') }}
            @elseif($document->status === 'refused')
                {{ trans('documents.statuses.refused') }}</small>
            @else
                {{ trans('estimates::general.messages.status.await_action') }}
            @endif
        </small>

        <div class="mt-3">
            @can('update-estimates-estimates')
                @if($document->status === 'approved')
                    <a href="{{ route('estimates.estimates.approve', $document->id) }}" class="btn btn-success btn-sm header-button-top disabled">{{ trans('estimates::general.mark_approved') }}</a>
                @else
                    <a href="{{ route('estimates.estimates.approve', $document->id) }}" class="btn btn-success btn-sm header-button-top">{{ trans('estimates::general.mark_approved') }}</a>
                @endif

                @if($document->status === 'refused')
                    <a href="{{ route('estimates.estimates.refuse', $document->id) }}" class="btn btn-danger btn-sm header-button-top disabled">{{ trans('estimates::general.mark_refused') }}</a>
                @else
                    <a href="{{ route('estimates.estimates.refuse', $document->id) }}" class="btn btn-danger btn-sm header-button-top">{{ trans('estimates::general.mark_refused') }}</a>
                @endif
            @endcan
        </div>
    </div>
</div>
