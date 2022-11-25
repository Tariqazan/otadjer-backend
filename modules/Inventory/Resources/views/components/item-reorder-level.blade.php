@if ($notifications->count())
    <div class="accordion" id="inventory-items">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h5 class="h3 mb-0">{{ trans_choice('general.items', 2) }}</h5>
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('inventory.items.mark-read-all')}}"
                        class="btn btn-outline-success rounded-circle btn-icon-only btn-sm mr-2"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="{{ trans('notifications.mark_read_all') }}"
                        >
                            <span class="btn-inner--icon mt-2 d-block"><i class="fas fa-check-double"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-flush table-hover" id="tbl-reminder">
                    <thead class="thead-light">
                        <tr class="row table-head-line">
                            <th class="col-sm-6 col-md-5 col-lg-3 col-xl-3">{{ trans('general.name') }}</th>
                            <th class="col-lg-1 col-xl-2 d-none d-lg-block">{{ trans_choice('inventory::general.warehouses', 1) }}</th>
                            <th class="col-lg-1 col-xl-1 text-center d-none d-md-block">{{ trans('settings.invoice.quantity') }}</th>
                            <th class="col-lg-1 col-xl-1 text-center d-none d-md-block">{{ trans('inventory::items.reorder_level') }}</th>
                            <th class="col-md-3 col-lg-3 col-xl-2 text-right d-none d-md-block">{{ trans('items.sales_price') }}</th>
                            <th class="col-lg-2 col-xl-2 text-right d-none d-lg-block">{{ trans('items.purchase_price') }}</th>
                            <th class="col-xs-3 col-sm-2 col-md-1 col-lg-1 col-xl-1 text-center"><a>{{ trans('general.actions') }}</a></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($notifications as $item)
                            <tr class="row align-items-center border-top-1">
                                <td class="col-xs-4 col-sm-6 col-md-5 col-lg-3 col-xl-3 py-2">
                                    <a href="{{ route('inventory.items.show', $item->id) }}">{{ $item->item->name }}</a>
                                </td>
                                <td class="col-lg-1 col-xl-2 d-none d-lg-block long-texts">
                                    {{ $item->warehouse->name }}
                                </td>
                                <td class="col-lg-1 col-xl-1 text-center d-none d-md-block">
                                    {{ $item->opening_stock }}
                                </td>
                                <td class="col-lg-1 col-xl-1 text-center d-none d-md-block">
                                    {{ $item->reorder_level }}
                                </td>
                                <td class="col-md-3 col-lg-3 col-xl-2 text-right d-none d-md-block">
                                    {{ money($item->item->sale_price, setting('default.currency'), true) }}
                                </td>
                                <td class="col-lg-2 col-xl-2 text-right d-none d-lg-block">
                                    {{ money($item->item->purchase_price, setting('default.currency'), true) }}
                                </td>
                                <th class="col-xs-3 col-sm-2 col-md-1 col-lg-1 col-xl-1 text-center">
                                    {!! Form::open([
                                        'route' => 'inventory.items.mark-read',
                                        'id' => 'item',
                                        '@submit.prevent' => 'onSubmit',
                                        '@keydown' => 'form.errors.clear($event.target.name)',
                                        'files' => true,
                                        'role' => 'form',
                                        'class' => 'form-loading-button',
                                        'novalidate' => true
                                    ]) !!}
                                        <input class="form-control"
                                            name="notification_id"
                                            type="hidden"
                                            value="{{$item->notification_id}}"
                                        >

                                        {!! Form::button('<span class="btn-inner--icon"><i class="fa fa-check"></i></span>',
                                            [
                                                ':disabled' => 'form.loading',
                                                'type' => 'submit',
                                                'class' => 'btn btn-outline-success rounded-circle btn-icon-only btn-sm',
                                                'data-toggle' => 'tooltip',
                                                'data-placement' => 'right'
                                            ]
                                        ) !!}
                                    {!! Form::close() !!}
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
