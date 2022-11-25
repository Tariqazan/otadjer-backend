

<div class="row border-bottom-1">
    <div class="col-58 pdf-logo">
            @stack('company_logo_start')
            @if (!$hideCompanyLogo)
                @if (!empty($document->contact->logo) && !empty($document->contact->logo->id))
                    <img class="d-logo" src="{{ $logo }}" alt="{{ $document->contact_name }}"/>
                @else
                    <img class="d-logo" src="{{ $logo }}" alt="{{ setting('company.name') }}"/>
                @endif
            @endif
            @stack('company_logo_end')
    </div>
     @php
                $user_id = \DB::table("inventory_user_warehouses")->where("user_id",$document->created_by)->first();
            
                $warehouseDetails = \DB::table("inventory_warehouses")->where("id",$user_id->warehouse_id)->first();
            @endphp
            
    <div class="col-42">
        <div class="text company">
            @stack('company_details_start')
            @if (!$hideCompanyDetails)
                @if (!$hideCompanyName)
                    <strong>{{ setting('company.name') }}</strong><br>
                @endif
                <span class="pdf-details">{{ $warehouseDetails->name ?? 'N/A' }}</span>
                <p>
                    @if (!$hideCompanyAddress)
                        
                            {!! nl2br(setting('company.address')) !!}
                            <br>
                            {!! $document->company->location !!}
                        
                    @endif

                    

                    @if (!$hideCompanyPhone)
                    
                            @if (setting('company.phone'))
                                {{ setting('company.phone') }}
                            @endif
                        
                    @endif

                    @if (!$hideCompanyEmail)
                        {{ setting('company.email') }}
                    @endif
                </p>
            @endif
            @stack('company_details_end')
             <strong>
                       
                    </strong>
                    
                    <span class="pdf-details">{!! nl2br($warehouseDetails->address ?? 'N/A') !!}</span><br>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-58">
        <div class="text company">
            <br>
            @if (!$hideContactInfo)
                <strong>{{ trans($textContactInfo) }}</strong><br>
            @endif

            @stack('name_input_start')
                @if (!$hideContactName)
                    <strong>{{ $document->contact_name }}</strong><br>
                @endif
            @stack('name_input_end')

            <p>
                @stack('address_input_start')
                    @if (!$hideContactAddress)
                            {!! nl2br($document->contact_address) !!}
                            <br>
                            {!! $document->contact_location !!}
                    @endif
                @stack('address_input_end')

                @stack('tax_number_input_start')
                    @if (!$hideContactTaxNumber)
                            @if ($document->contact_tax_number)
                                {{ trans('general.tax_number') }}: {{ $document->contact_tax_number }}
                            @endif
                    @endif
                @stack('tax_number_input_end')

                @stack('phone_input_start')
                    @if (!$hideContactPhone)
                            @if ($document->contact_phone)
                                {{ $document->contact_phone }}
                            @endif
                    @endif
                @stack('phone_input_end')

                @stack('email_start')
                    @if (!$hideContactEmail)
                        <br>
                            {{ $document->contact_email }}
                    @endif
                @stack('email_input_end')
            </p>
        </div>
    </div>

    <div class="col-42">
        <div class="text company">
            
            @stack('document_number_input_start')
                @if (!$hideDocumentNumber)
                    <strong>
                        {{ trans($textDocumentNumber) }}:
                    </strong>
                    <span class="pdf-details">{{ $document->document_number }}</span><br>
                @endif
            @stack('document_number_input_end')

            @stack('order_number_input_start')
                @if (!$hideOrderNumber)
                    @if ($document->order_number)
                        <strong>
                            {{ trans($textOrderNumber) }}:
                        </strong>
                        <span class="pdf-details">{{ $document->order_number }}</span><br>
                    @endif
                @endif
            @stack('order_number_input_end')

            @stack('issued_at_input_start')
                @if (!$hideIssuedAt)
                    <strong>
                        {{ trans($textIssuedAt) }}:
                    </strong>
                    <span class="pdf-details">@date($document->issued_at)</span><br>
                @endif
            @stack('issued_at_input_end')

            @stack('due_at_input_start')
                @if (!$hideDueAt)
                    <strong>
                        {{ trans($textDueAt) }}:
                    </strong>
                    <span class="pdf-details">@date($document->due_at)</span><br>
                @endif
            @stack('due_at_input_end')
           
              
                    

        </div>
    </div>
</div>


<div class="row mb-3">
    <div class="col-100">
        <div class="pdf-title">
            <h3>
                {{ $textDocumentTitle }}
            </h3>

            @if ($textDocumentSubheading)
                <h5>
                    {{ $textDocumentSubheading }}
                </h5>
            @endif
        </div>
    </div>
</div>

@if (!$hideItems)
    <div class="row">
        <div class="col-100">
            <div class="text">
                <table class="lines">
                    <thead style="background-color:{{ $backgroundColor }} !important; -webkit-print-color-adjust: exact;">
                        <tr>
                            @stack('name_th_start')
                                @if (!$hideItems || (!$hideName && !$hideDescription))
                                    <th class="item text-left text-white">{{ (trans_choice($textItems, 2) != $textItems) ? trans_choice($textItems, 2) : trans($textItems) }}</th>
                                @endif
                            @stack('name_th_end')

                            @stack('quantity_th_start')
                                @if (!$hideQuantity)
                                    <th class="quantity text-white">{{ trans($textQuantity) }}</th>
                                @endif
                            @stack('quantity_th_end')

                            @stack('price_th_start')
                                @if (!$hidePrice)
                                    <th class="price text-white">{{ trans($textPrice) }}</th>
                                @endif
                            @stack('price_th_end')

                            @if (!$hideDiscount)
                                @if (in_array(setting('localisation.discount_location', 'total'), ['item', 'both']))
                                    @stack('discount_td_start')
                                        <th class="discount text-white">{{ trans('invoices.discount') }}</th>
                                    @stack('discount_td_end')
                                @endif
                            @endif

                            @stack('total_th_start')
                                @if (!$hideAmount)
                                    <th class="total text-white">{{ trans($textAmount) }}</th>
                                @endif
                            @stack('total_th_end')
                        </tr>
                    </thead>
                    <tbody>
                        @if ($document->items->count())
                            @foreach($document->items as $item)
                                <x-documents.template.line-item
                                    type="{{ $type }}"
                                    :item="$item"
                                    :document="$document"
                                    hide-items="{{ $hideItems }}"
                                    hide-name="{{ $hideName }}"
                                    hide-description="{{ $hideDescription }}"
                                    hide-quantity="{{ $hideQuantity }}"
                                    hide-price="{{ $hidePrice }}"
                                    hide-discount="{{ $hideDiscount }}"
                                    hide-amount="{{ $hideAmount }}"
                                />
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center empty-items">
                                    {{ trans('documents.empty_items') }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

<div class="row mt-9 clearfix">
    <div class="col-58">
        <div class="text company">
            @stack('notes_input_start')
                @if ($document->notes)
                    <br>
                    <strong>{{ trans_choice('general.notes', 2) }}</strong><br><br>
                    {!! nl2br($document->notes) !!}
                @endif
            @stack('notes_input_end')
        </div>
    </div>

    <div class="col-42 float-right text-right">
        <div class="text company">
            @foreach ($document->totals_sorted as $total)
                @if ($total->code != 'total')
                    @stack($total->code . '_total_tr_start')
                    <div class="border-top-1 py-1">
                        <strong class="float-left">{{ trans($total->title) }}:</strong>
                        <span>@money($total->amount, $document->currency_code, true)</span><br>
                    </div>
                    @stack($total->code . '_total_tr_end')
                @else
                    @if ($document->paid)
                        @stack('paid_total_tr_start')
                        <div class="border-top-1 py-1">
                            <strong class="float-left">{{ trans('invoices.paid') }}:</strong>
                            <span>- @money($document->paid, $document->currency_code, true)</span><br>
                        </div>
                        @stack('paid_total_tr_end')
                    @endif
                    @stack('grand_total_tr_start')
                    <div class="border-top-1 py-1">
                        <strong class="float-left">{{ trans($total->name) }}:</strong>
                        <span>@money($document->amount_due, $document->currency_code, true)</span>
                    </div>
                    @stack('grand_total_tr_end')
                @endif
            @endforeach
        </div>
    </div>
</div>

@if (!$hideFooter)
    @if ($document->footer)
        <div class="row mt-4">
            <div class="col-100 text-left">
                <div class="text company">
                    <strong>{!! nl2br($document->footer) !!}<strong>
                </div>
            </div>
        </div>
    @endif
@endif
