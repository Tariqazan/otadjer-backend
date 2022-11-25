@can('create-credit-debit-notes-debit-notes')
    @if ($bill->status !== 'draft')
        @php($caption = trans('general.title.create', ['type' => trans_choice('credit-debit-notes::general.debit_notes', 1)]))
        @if($amount_exceeded)
            <el-tooltip content="{{ trans('credit-debit-notes::bills.bill_amount_is_exceeded') }}" placement="top">
                <button type="button" class="btn btn-white btn-sm btn-tooltip disabled header-button-top">
                    {{ $caption }}
                </button>
            </el-tooltip>
        @else
            <a href="{{ route('credit-debit-notes.debit-notes.create', ['bill' => $bill->id]) }}" class="btn btn-white btn-sm">
                {{ $caption }}
            </a>
        @endif
    @endif
@endcan
