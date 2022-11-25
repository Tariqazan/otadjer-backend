@extends('layouts.admin')

@section('title', $transfer_order->transfer_order)

@section('new_button')
    <div class="dropup header-drop-top">
        <button type="button" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-chevron-down"></i>&nbsp; {{ trans('general.more_actions') }}
        </button>

        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="{{ route('inventory.transfer-orders.edit', $transfer_order->id) }}">
                {{ trans('general.edit') }}
            </a>

            <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="{{ route('inventory.transfer-orders.print', $transfer_order->id) }}" target="_blank">
                {{ trans('general.print') }}
            </a>

            <a class="dropdown-item" href="{{ route('inventory.transfer-orders.download', $transfer_order->id) }}">
                {{ trans('general.download_pdf') }}
            </a>

            @if (($transfer_order->status == 'cancelled'))
                <a class="dropdown-item disabled" href="{{ route('inventory.transfer-orders.cancelled', $transfer_order->id) }}">
                    {{ trans('general.cancel') }}
                </a>
            @else
                <a class="dropdown-item" href="{{ route('inventory.transfer-orders.cancelled', $transfer_order->id) }}">
                    {{ trans('general.cancel') }}
                </a>
            @endif

            <div class="dropdown-divider"></div>
            {!! Form::deleteLink($transfer_order, 'inventory.transfer-orders.destroy', 'inventory::general.transfer_orders') !!}
        </div>
    </div>

    <a href="{{ route('inventory.transfer-orders.create') }}" class="btn btn-white btn-sm">
        {{ trans('general.add_new') }}
    </a>
@endsection

@section('content')
    <div class="row" style="font-size: inherit !important">
        <div class="col-md-2">
            {{ trans_choice('general.statuses', 1) }}
            <br>

            <strong>
                <span class="float-left">
                    @if ( $transfer_order->status == 'draft')
                        <span class="badge badge-default">
                            {{ trans('inventory::transferorders.draft') }}
                        </span>
                    @elseif ($transfer_order->status == 'ready')
                        <span class="badge badge-danger">
                            {{ trans('inventory::transferorders.ready') }}
                        </span>
                    @elseif ($transfer_order->status == 'in_transfer')
                        <span class="badge badge-warning">
                            {{ trans('inventory::transferorders.in_transfer') }}
                        </span>
                    @elseif ($transfer_order->status == 'transferred')
                        <span class="badge badge-success">
                            {{ trans('inventory::transferorders.transferred') }}
                        </span>
                    @elseif ($transfer_order->status == 'cancelled')
                        <span class="badge badge-dark">
                            {{ trans('inventory::transferorders.cancelled') }}
                        </span>
                    @endif
                </span>
            </strong>
            <br><br>
        </div>

        <div class="col-md-2">
            {{ trans('inventory::transferorders.source_warehouse') }}
            <br>

            <strong>
                <span class="float-left">
                    {{ $transfer_order->source_warehouse->name }}
                </span>
            </strong>
            <br><br>
        </div>

        <div class="col-md-4">
            <marquee direction="right"><i class="fas fa-truck-moving fa-2x"></i></marquee>
        </div>

        <div class="col-md-2">
            {{ trans('inventory::transferorders.destination_warehouse') }}
            <br>

            <strong>
                <span class="float-left">
                    {{ $transfer_order->destination_warehouse->name }}
                </span>
            </strong>
            <br><br>
        </div>

        <div class="col-md-2">
            {{ trans('inventory::transferorders.date') }}
            <br>

            <strong>
                <span class="float-left">
                    @date($transfer_order->date)
                </span>
            </strong>
            <br><br>
        </div>
    </div>

    @if ($transfer_order->status != 'transferred')
        <div class="card">
            <div class="card-body">
                <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                    <div class="timeline-block">
                        <span class="timeline-step badge-primary">
                            <i class="fas fa-plus"></i>
                        </span>

                        <div class="timeline-content">
                            <h2 class="font-weight-500">
                                {{ trans('inventory::transferorders.create_transfer_order') }}
                            </h2>
                            <small>
                                {{ trans('general.date') .  ':' }}
                            </small>
                            <small>
                                @date($transfer_order->created_at) {{ Date::parse($transfer_order->created_at)->format('H:i') }}
                            </small>

                            <div class="mt-3">
                                <a href="{{ route('inventory.transfer-orders.edit', $transfer_order->id) }}" class="btn btn-primary btn-sm btn-alone header-button-top">
                                    {{ trans('general.edit') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-block">
                        <span class="timeline-step badge-danger">
                            <i class="fas fa-luggage-cart"></i>
                        </span>

                        <div class="timeline-content">
                            <h2 class="font-weight-500">
                                {{ trans('inventory::transferorders.ready_to_transfer') }}
                            </h2>

                            <small>
                                {{ trans('general.date') . ':' }}
                            </small>

                            <small>
                                @if (isset($transfer_order->ready->created_at))
                                    @date($transfer_order->ready->created_at) {{ Date::parse($transfer_order->ready->created_at)->format('H:i') }}
                                @elseif (!isset($transfer_order->ready->created_at ) && ($transfer_order->status == 'in_transfer' || $transfer_order->status == 'transferred'))
                                    @date($transfer_order->histories[count($transfer_order->histories)-1]->created_at)
                                    {{ Date::parse($transfer_order->histories[count($transfer_order->histories)-1]->created_at)->format('H:i') }}
                                @endif
                            </small>

                            <div class="mt-3">
                                @if (($transfer_order->status != 'draft'))
                                    <a href="{{ route('inventory.transfer-orders.ready', $transfer_order->id) }}" class="btn btn-danger btn-sm header-button-top disabled">
                                        {{ trans('inventory::transferorders.ready') }}
                                    </a>
                                @else
                                    <a href="{{ route('inventory.transfer-orders.ready', $transfer_order->id) }}" class="btn btn-danger btn-sm header-button-top">
                                        {{ trans('inventory::transferorders.ready') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="timeline-block">
                        <span class="timeline-step badge-warning">
                            <i class="fas fa-route"></i>
                        </span>

                        <div class="timeline-content">
                            <h2 class="font-weight-500">
                                {{ trans('inventory::transferorders.in_transfer') }}
                            </h2>

                            <small>
                                {{ trans('general.date') . ':' }}
                            </small>

                            <small>
                                @if (isset($transfer_order->intransfer->created_at))
                                    @date($transfer_order->intransfer->created_at) {{ Date::parse($transfer_order->intransfer->created_at)->format('H:i') }}
                                @elseif (!isset($transfer_order->intransfer->created_at ) && $transfer_order->status == 'transferred')
                                    @date($transfer_order->histories[count($transfer_order->histories)-1]->created_at)
                                    {{ Date::parse($transfer_order->histories[count($transfer_order->histories)-1]->created_at)->format('H:i') }}
                                @endif
                            </small>

                            <div class="mt-3">
                                @if (($transfer_order->status == 'in_transfer' || $transfer_order->status == 'transferred'))
                                    <a href="{{ route('inventory.transfer-orders.in-transfer', $transfer_order->id) }}" class="btn btn-warning btn-sm header-button-top disabled">
                                        {{ trans('inventory::transferorders.in_transfer') }}
                                    </a>
                                @else
                                    <a href="{{ route('inventory.transfer-orders.in-transfer', $transfer_order->id) }}" class="btn btn-warning btn-sm header-button-top">
                                        {{ trans('inventory::transferorders.in_transfer') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="timeline-block">
                        <span class="timeline-step badge-success">
                            <i class="fas fa-clipboard-check"></i>
                        </span>

                        <div class="timeline-content">
                            <h2 class="font-weight-500">
                                {{ trans('inventory::transferorders.transferred') }}
                            </h2>

                            <small>
                                {{ trans('general.date') . ':' }}
                            </small>

                            <small>
                                @if (isset($transfer_order->transferred->created_at))
                                    @date($transfer_order->transferred->created_at) {{ Date::parse($transfer_order->transferred->created_at)->format('H:i') }}
                                @endif
                            </small>

                            <div class="mt-3">
                                @if (($transfer_order->status == 'transferred'))
                                    <a href="{{ route('inventory.transfer-orders.transferred', $transfer_order->id) }}" class="btn btn-success btn-sm header-button-top disabled">
                                        {{ trans('inventory::transferorders.transferred') }}
                                    </a>
                                @else
                                    <a href="{{ route('inventory.transfer-orders.transferred', $transfer_order->id) }}" class="btn btn-success btn-sm header-button-top">
                                        {{ trans('inventory::transferorders.transferred') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="card" style="padding: 0; padding-left: 15px; padding-right: 15px; border-radius: 0; box-shadow: 0 4px 16px rgba(0,0,0,.2);">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="text">
                        <h3>
                            {{ trans_choice('inventory::general.transfer_orders', 1) }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row border-bottom-1">
                <div class="col-md-7">
                    <div class="text company">
                        <img  class="d-logo" src="{{ $logo }}" alt="{{ setting('company.name') }}" />
                    </div>
                </div>

                <div class="col-md-5">
                    <div>
                        <strong>{{ setting('company.name') }}</strong><br>
                        <p>{!! nl2br(setting('company.address')) !!}</p>
                        <p>
                            @if (setting('company.phone'))
                                {{ setting('company.phone') }}
                            @endif
                        </p>
                        <p>{{ setting('company.email') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="text company">
                        <br>
                            <strong>
                                {{ trans('inventory::transferorders.source_warehouse') . ':'}}
                            </strong>
                            <span class="float-right">{{ $transfer_order->source_warehouse->name }}</span><br><br>

                            <strong>
                                {{ trans('inventory::transferorders.destination_warehouse') . ':'}}
                            </strong>
                            <span class="float-right">{{ $transfer_order->destination_warehouse->name }}</span><br><br>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text company">
                        <br>
                        <strong>
                            {{ trans('inventory::transferorders.name') . ':'}}
                        </strong>
                        <span class="float-right">{{ $transfer_order->transfer_order }}</span><br><br>
                        <strong>
                            {{ trans('inventory::transferorders.number') . ':'}}
                        </strong>
                        <span class="float-right">{{ $transfer_order->transfer_order_number }}</span><br><br>
                        <strong>
                            {{ trans('inventory::transferorders.date') . ':'}}
                        </strong>
                        <span class="float-right">@date($transfer_order->date)</span><br><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="text">
                        <table class="lines">
                            <thead style="background-color:{{ setting('invoice.color', '#55588b') }} !important; -webkit-print-color-adjust: exact;">
                                <tr>
                                    <th class="item text-left text-white">{{ trans_choice('general.items', 2)}}</th>

                                    <th class="quantity text-white">{{ trans('inventory::general.quantity')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transfer_order->transfer_order_items as $item)
                                    <tr>
                                        <td class="item">{{ $item->item->name }}</td>
                                        <td class="quantity">{{ $item->transfer_quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="accordion">
                <div class="card">
                    <div class="card-header" id="accordion-histories-header" data-toggle="collapse" data-target="#accordion-histories-body" aria-expanded="false" aria-controls="accordion-histories-body">
                        <h4 class="mb-0">{{ trans_choice('inventory::general.histories', 2) }}</h4>
                    </div>

                    <div id="accordion-histories-body" class="collapse hide" aria-labelledby="accordion-histories-header">
                        <div class="table-responsive">
                            <table class="table table-flush table-hover">
                                <thead class="thead-light">
                                    <tr class="row table-head-line">
                                        <th class="col-xs-4 col-sm-3">
                                            {{ trans('general.date') }}
                                        </th>
                                        <th class="col-xs-4 col-sm-3 text-left">
                                            {{ trans_choice('general.statuses', 1) }}
                                        </th>
                                        <th class="col-xs-4 col-sm-6 text-left long-texts">
                                            {{ trans('general.description') }}
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($transfer_order->histories as $item)
                                        <tr class="row align-items-center border-top-1 tr-py">
                                            @stack('row_footer_histories_body_td_start')
                                            <td class="col-xs-4 col-sm-3">
                                                @date($item->created_at) {{ Date::parse($item->created_at)->format('H:i') }}
                                            </td>
                                            <td class="col-xs-4 col-sm-3 text-left">
                                                {{ trans('inventory::transferorders.' . $item->status) }}
                                            </td>
                                            <td class="col-xs-4 col-sm-6 text-left long-texts">
                                                @if ($item->status == 'draft')
                                                    {{ trans('inventory::transferorders.created_by') . $item->user->name }}
                                                @else
                                                    {{ trans('inventory::transferorders.changed_by') . $item->user->name }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts_start')
    <link rel="stylesheet" href="{{ asset('public/css/print.css?v=' . version('short')) }}" type="text/css">
    <script src="{{ asset('modules/Inventory/Resources/assets/js/transfer_orders.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
