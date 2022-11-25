<div class="timeline-block">
    <span class="timeline-step badge-danger">
        <i class="far fa-envelope"></i>
    </span>

    <div class="timeline-content">
        <h2 class="font-weight-500">
            {{ trans('estimates::estimates.send_invoice') }}
        </h2>

        @if ($document->status != 'sent' && $document->status != 'approved' && $document->status != 'viewed')
            <small>
                {{ trans_choice('general.statuses', 1) . ':' }}
            </small>
            <small>
                {{ trans('invoices.messages.status.send.draft') }}
            </small>

            <div class="mt-3">
                @can('update-estimates-estimates')
                    @if($document->status == 'draft')
                        <a href="{{ route('estimates.estimates.sent', $document->id) }}" class="btn btn-white btn-sm">
                            {{ trans('invoices.mark_sent') }}
                        </a>
                    @else
                        <button type="button" class="btn btn-secondary btn-sm" disabled="disabled">
                            {{ trans('invoices.mark_sent') }}
                        </button>
                    @endif
                @endcan
        @elseif($document->status == 'viewed')
            <small>{{ trans_choice('general.statuses', 1) . ':' }}</small>
            <small>{{ trans('invoices.messages.status.viewed') }}</small>
        @else
            <small>{{ trans_choice('general.statuses', 1) . ':' }}</small>
            <small>{{ trans('invoices.messages.status.send.sent', ['date' => Date::parse($document->sent_at)->format($date_format)]) }}</small>
        @endif

        @if (!($document->status != 'sent' && $document->status != 'approved' && $document->status != 'viewed'))
            <div class="mt-3">
        @endif

        @if($document->contact_email)
            <a href="{{ route('estimates.estimates.email', $document->id) }}" class="btn btn-danger btn-sm">
                {{ trans('invoices.send_mail') }}
            </a>
        @else
            <el-tooltip content="{{ trans('invoices.messages.email_required') }}" placement="top">
                <button type="button" class="btn btn-danger btn-sm btn-tooltip disabled">
                    {{ trans('invoices.send_mail') }}
                </button>
            </el-tooltip>
        @endif
        @if ($document->status != 'cancelled')
            <a href="{{ $signedUrl }}" target="_blank" class="btn btn-white btn-sm">
                {{ trans('general.share') }}
            </a>
        @endif

                    </div>
            </div>
    </div>
