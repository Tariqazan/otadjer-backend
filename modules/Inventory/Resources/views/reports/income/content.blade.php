@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header with-border">
                    <div class="card-filter d-flex align-items-center">
                        <span class="title-filter hidden-xs mr-2">{{ trans('general.search') }}:</span>
                        {!! Form::text('from_date', request('search'), ['class' => 'form-control input-filter form-control-sm w-auto mr-2', 'placeholder' => trans('general.search_placeholder')]) !!}
                        {!! Form::text('to_date', request('search'), ['class' => 'form-control input-filter form-control-sm w-auto mr-2', 'placeholder' => trans('general.search_placeholder')]) !!}
                        {!! Form::button('<span class="fa fa-filter"></span> &nbsp;' . trans('general.filter'), ['type' => 'submit', 'class' => 'btn btn-default btn-sm btn-filter']) !!}
                    </div>
                </div> --}}

                <div class="table-responsive">
                    <table class="table table-flush table-hover">
                        <thead class="thead-light">
                        <tr class="row table-head-line">
                            <th class="col-md-3 text-left">{{ trans('general.name') }}</th>
                            <th class="col-md-1 text-right">{{ trans('items.sales_price') }}</th>
                            <th class="col-md-1 text-right">{{ trans('items.purchase_price')  }}</th>
                            <th class="col-md-1 text-right">{{ trans('settings.invoice.quantity') }}</th>
                            <th class="col-md-1 text-right">{{ trans('inventory::general.expented_income') }}</th>
                            <th class="col-md-1 text-right">{{ trans('inventory::general.sale_item_quantity') }}</th>
                            <th class="col-md-1 text-right">{{ trans('inventory::general.sale_item_amount') }}</th>
                            <th class="col-md-1 text-right">{{ trans('inventory::general.purchase_item_quantity') }}</th>
                            <th class="col-md-1 text-right">{{ trans('inventory::general.purchase_item_amount') }}</th>
                            <th class="col-md-1 text-right">{{ trans('inventory::general.income') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($class->items as $item)
                                <tr class="row align-items-center border-top-1">
                                    <td class="col-md-3 border-0 text-left">{{ $item->name }}</td>
                                    <td class="col-md-1 border-0 text-right">@money($item->sale_price, setting('default.currency'), true)</td>
                                    <td class="col-md-1 border-0 text-right">@money($item->purchase_price, setting('default.currency'), true)</td>
                                    <td class="col-md-1 border-0 text-right">{{ $item->quantity }}</td>
                                    <td class="col-md-1 border-0 text-right">@money($item->expected_income, setting('default.currency'), true)</td>
                                    <td class="col-md-1 border-0 text-right">{{ $item->sale_quantity }}</td>
                                    <td class="col-md-1 border-0 text-right">@money($item->sale_amount, setting('default.currency'), true)</td>
                                    <td class="col-md-1 border-0 text-right">{{ $item->bill_quantity }}</td>
                                    <td class="col-md-1 border-0 text-right">@money($item->bill_amount, setting('default.currency'), true)</td>
                                    <td class="col-md-1 border-0 text-right">@money($item->income, setting('default.currency'), true)</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
