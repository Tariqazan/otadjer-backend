@can('create-credit-debit-notes-credit-notes')
    @if ($invoice->status !== 'draft')
        @php($caption = trans('general.title.create', ['type' => trans_choice('credit-debit-notes::general.credit_notes', 1)]))
        @if($amount_exceeded)
            <el-tooltip content="{{ trans('credit-debit-notes::invoices.invoice_amount_is_exceeded') }}" placement="top">
                <button type="button" class="btn btn-white btn-sm btn-tooltip disabled header-button-top">
                    {{ $caption }}
                </button>
            </el-tooltip>
        @else
            <a href="{{ route('credit-debit-notes.credit-notes.create', ['invoice' => $invoice->id]) }}" class="btn btn-white btn-sm">
                {{ $caption }}
            </a>
        @endif
    @endif
@endcan
