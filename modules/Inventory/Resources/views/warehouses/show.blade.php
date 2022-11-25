@extends('layouts.admin')

@section('title', $warehouse->name)

@section('new_button')
    <div class="dropup header-drop-top">
        <button type="button" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-chevron-down"></i>&nbsp; {{ trans('general.more_actions') }}
        </button>

        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="{{ route('inventory.warehouses.edit', $warehouse->id) }}" >
                {{ trans('general.edit') }}
            </a>

            <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="{{ route('inventory.warehouses.export-show', $warehouse->id, request()->input()) }}">
                {{ trans('general.export') }}
            </a>

            <div class="dropdown-divider"></div>

            {!! Form::deleteLink($warehouse, 'inventory.warehouses.destroy') !!}
        </div>
    </div>

    <a href="{{ route('inventory.warehouses.create') }}" class="btn btn-white btn-sm">
        {{ trans('general.add_new') }}
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('inventory::general.information') }}</h3>
                    @if (setting('inventory.default_warehouse') == $warehouse->id)
                        <span class="badge badge-info">{{ trans('inventory::general.default_warehouse') }}</span>
                    @endif

                    @if ($warehouse->enabled)
                        <span class="badge badge-success">{{ trans('general.enabled') }}</span>
                    @else
                        <span class="badge badge-danger">{{ trans('general.disabled') }}</span>
                    @endif
                </div>

                <div class="card-header border-bottom-0 show-transaction-card-header">
                    <b class="text-sm font-weight-600">{{ trans('general.email') }}</b> <a class="float-right text-xs">{{ $warehouse->email }}</a>
                </div>

                <div class="card-header border-bottom-0 show-transaction-card-header">
                    <b class="text-sm font-weight-600">{{ trans('general.phone') }}</b> <a class="float-right text-xs">{{ $warehouse->phone }}</a>
                </div>

                @if ($warehouse->city)
                    <div class="card-header border-bottom-0 show-transaction-card-header">
                        <b class="text-sm font-weight-600">{{ trans_choice('general.cities', 1) }}</b> <a class="float-right text-xs">{{ $warehouse->city }}</a>
                    </div>
                @endif

                @if ($warehouse->zip_code)
                    <div class="card-header border-bottom-0 show-transaction-card-header">
                        <b class="text-sm font-weight-600">{{ trans('general.zip_code') }}</b> <a class="float-right text-xs">{{ $warehouse->zip_code }}</a>
                    </div>
                @endif


                @if ($warehouse->state)
                    <div class="card-header border-bottom-0 show-transaction-card-header">
                        <b class="text-sm font-weight-600">{{ trans('general.state') }}</b> <a class="float-right text-xs">{{ $warehouse->state }}</a>
                    </div>
                @endif

                @if ($warehouse->country)
                    <div class="card-header border-bottom-0 show-transaction-card-header">
                        <b class="text-sm font-weight-600">{{ trans_choice('general.countries', 1) }}</b> <a class="float-right text-xs">{{ trans('countries.' . $warehouse->country) }}</a>
                    </div>
                @endif

                <div class="card-header border-bottom-0 show-transaction-card-header">
                    <b class="text-sm font-weight-600">{{ trans('inventory::warehouses.total_item') }}</b> <a class="float-right text-xs">{{ $warehouse->items->count(); }}</a>
                </div>

            </div>

            <div class="card ">
                <div class="card-header with-border">
                    <h3 class="mb-0">{{ trans('general.description') }}</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        {{ $warehouse->description }}
                    </p>
                </div>
            </div>

            <div class="card ">
                <div class="card-header with-border">
                    <h3 class="mb-0">{{ trans('general.address') }}</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">
                        {{ $warehouse->address }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="nav-wrapper pt-0">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                            <i class="mr-2"></i>{{ trans('inventory::general.overview') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#report" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                            <i class="mr-2"></i>{{ trans_choice('inventory::general.histories', 1) }}
                        </a>
                    </li>
                </ul>
            </div>
                <div class="card-shadow">
                    <div class="tab-content">
                        <div class="tab-pane tab active" id="overview">
                            <div class="row">
                                @widget('Modules\Inventory\Widgets\Warehouses\TotalStock', $warehouse)
                                @widget('Modules\Inventory\Widgets\Warehouses\TotalIncome', $warehouse)
                                @widget('Modules\Inventory\Widgets\Warehouses\TotalExpense', $warehouse)
                                @widget('Modules\Inventory\Widgets\Warehouses\TotalStockLineChart', $warehouse)
                            </div>
                        </div>
                        <div class="tab-pane fade" id="report">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header border-bottom-0">
                                            <div class="row">
                                                <div class="col-12 card-header-search card-header-space">
                                                    <span class="table-text hidden-lg card-header-search-text">{{ trans('inventory::general.stock') }}</span>
                                                    <span style="float: right"><a href="{{ route('inventory.warehouses.export-stock', $warehouse->id, request()->input()) }}" class="btn btn-white btn-sm header-button-top">{{ trans('general.export') }}</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush" id="tbl-transactions">
                                                <thead class="thead-light">
                                                    <tr class="row table-head-line">
                                                        <th class="col-md-4 text-center">{{ trans('general.name') }}</th>
                                                        <th class="col-md-2 hidden-xs">{{ trans_choice('general.categories', 1) }}</th>
                                                        <th class="col-md-2 hidden-xs">{{ trans('inventory::general.stock') }}</th>
                                                        <th class="col-md-2 text-right amount-space">{{ trans('items.sales_price') }}</th>
                                                        <th class="col-md-2 hidden-xs text-right amount-space">{{ trans('items.purchase_price') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($warehouse->core_items)
                                                        @foreach ($warehouse->core_items as $item)
                                                            <tr class="row align-items-center border-top-1">
                                                                <td class="col-md-4 border-0">
                                                                    <img src="{{ $item->picture ? Storage::url($item->picture->id) : asset('public/img/otadjer-logo-black.svg') }}" class="avatar image-style p-1 mr-3 item-img hidden-md" alt="{{ $item->name }}">
                                                                    <a href="{{ route('inventory.items.show', $item->id) }}">{{ $item->name }}</a>
                                                                </td>
                                                                <td class="col-md-2 hidden-xs border-0">{{ $item->category ? $item->category->name : trans('general.na') }}</td>
                                                                <td class="col-md-2 hidden-xs border-0">{{ $item->inventory()->where('warehouse_id', $warehouse->id)->value('opening_stock') }}</td>
                                                                <td class="col-md-2 text-right amount-space border-0">{{ money($item->sale_price, setting('default.currency'), true) }}</td>
                                                                <td class="col-md-2 hidden-xs text-right amount-space border-0">{{ money($item->purchase_price, setting('default.currency'), true) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer table-action">
                                            <div class="row align-items-center">
                                                @include('partials.admin.pagination', ['items' => $warehouse->item_pagination, 'type' => 'warehouse_items'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header border-bottom-0">
                                            <div class="row">
                                                <div class="col-12 card-header-search card-header-space">
                                                    <span class="table-text hidden-lg card-header-search-text">{{ trans('inventory::general.menu.histories') }}</span>
                                                    <span style="float: right"><a href="{{ route('inventory.warehouses.export-history', $warehouse->id, request()->input()) }}" class="btn btn-white btn-sm header-button-top">{{ trans('general.export') }}</a></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table align-items-center table-flush" id="tbl-transactions">
                                                <thead class="thead-light">
                                                    <tr class="row table-head-line">
                                                        <th class="col-md-2">{{ trans('general.date') }}</th>
                                                        <th class="col-md-3">{{ trans_choice('general.items', 1) }}</th>
                                                        <th class="col-md-4">{{ trans('inventory::general.action') . ' ' . trans_choice('general.types', 1) }}</th>
                                                        <th class="col-md-3">{{ trans('inventory::general.stock') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($warehouse->histories as $history)
                                                        @if ($history->item->id)
                                                            <tr class="row align-items-center border-top-1">
                                                                <td class="col-md-2 border-0">
                                                                    @date($history->created_at)
                                                                </td>
                                                                <td class="col-md-3 border-0">
                                                                    <a href="{{ route('inventory.items.show', $history->item->id) }}">{{ $history->item->name }}</a>
                                                                </td>
                                                                <td class="col-md-4">
                                                                    <a href="{{ url($history->action_url) }}">{{ $history->action_type }}</a>
                                                                </td>
                                                                <td class="col-md-3">
                                                                    {{ $history->quantity }}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer table-action">
                                            <div class="row align-items-center">
                                                @include('partials.admin.pagination', ['items' => $warehouse->history_pagination, 'type' => 'histories'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/warehouses.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
