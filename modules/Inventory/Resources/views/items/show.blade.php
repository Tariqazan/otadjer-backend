@extends('layouts.admin')

@section('title', $item->name)

@section('new_button')
    <div class="dropup header-drop-top">
        <button type="button" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-chevron-down"></i>&nbsp; {{ trans('general.more_actions') }}
        </button>

        <div class="dropdown-menu" role="menu">
            <a class="dropdown-item" href="{{ route('items.duplicate', $item->id) }}" target="_blank">
                {{ trans('general.duplicate') }}
            </a>

            <a class="dropdown-item" href="{{ route('inventory.items.edit', $item->id) }}">
                {{ trans('general.edit') }}
            </a>

            <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="{{ route('inventory.items.export-history', $item->id, request()->input()) }}">
                {{ trans('general.export') }}
            </a>

            @if ($item->inventory()->value('barcode'))
                <a class="dropdown-item" href="{{ route('inventory.items.print-barcode', $item->id) }}" target="_blank">
                    {{ trans('inventory::general.print_barcode') }}
                </a>
            @endif

            <div class="dropdown-divider"></div>

            {!! Form::deleteLink($item, 'inventory.items.destroy', 'inventory::general.items') !!}
        </div>
    </div>

    <a href="{{ route('inventory.items.create') }}" class="btn btn-white btn-sm">
        {{ trans('general.add_new') }}
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group mb-4">
                <li class="list-group-item border-0">
                    <img class="text-sm font-weight-600 img-center" src="{{ $item->picture ? Storage::url($item->picture->id) : asset('public/img/otadjer-logo-black.svg') }}" class="img-thumbnail" height="200" width="200" alt="{{ $item->name }}">
                </li>
            </ul>

            <ul class="list-group mb-4">
                @stack('item_information_start')
                    <li class="list-group-item border-0">
                        <h3 class="card-title">{{ trans('inventory::general.information') }}</h3>

                        @if ($item->inventory()->value('returnable') == true)
                            <span class="badge badge-info">{{ trans('inventory::items.returnable') }}</span>
                        @endif

                        @if ($item->enabled)
                            <span class="badge badge-success">{{ trans('general.enabled') }}</span>
                        @else
                            <span class="badge badge-danger">{{ trans('general.disabled') }}</span>
                        @endif
                    </li>
                @stack('item_information_end')

                @stack('item_sku_start')
                    <li class="list-group-item border-0 border-top-1">
                        <div class="font-weight-600">{{ trans('inventory::general.sku') }}</div>
                        <div><small class="long-texts" title="{{ $item->inventory()->value('sku') }}">{{ $item->inventory()->value('sku') }}</small></div>
                    </li>
                @stack('item_sku_end')

                @stack('item_sales_price_start')
                    <li class="list-group-item border-0 border-top-1">
                        <div class="font-weight-600">{{ trans('items.sales_price') }}</div>
                        <div>
                            <small class="long-texts" title="@money($item->sale_price, setting('default.currency'), true)">
                                @money($item->sale_price, setting('default.currency'), true)
                            </small>
                        </div>
                    </li>
                @stack('item_sales_price_end')
 <?php 

                                 $role_id = \DB::table('user_roles')->where("user_id",auth()->id())->first();

                                 $status = true;
                                 //if($role_id->role_id == 2){
                                    $data = \DB::table('role_permissions')
                                        ->where("role_id",$role_id->role_id)
                                        ->where("permission_id",279)
                                        ->first();
                                   
                                    if($data == null  ){
                                        $status = false;
                                    }
                                 //}
                                 ?>
                @stack('item_purchase_price_start')
                    <?php if($status){ ?>
                    <li class="list-group-item border-0 border-top-1">
                        <div class="font-weight-600">{{ trans('items.purchase_price') }}</div>
                        <div>
                            <small class="long-texts" title="@money($item->purchase_price, setting('default.currency'), true)">
                                @money($item->purchase_price, setting('default.currency'), true)
                            </small>
                        </div>
                    </li>
                <?php } ?>
                @stack('item_purchase_price_end')

                @stack('item_opening_stock_value_start')
                    @if ($item->inventory()->sum('opening_stock_value'))
                        <li class="list-group-item border-0 border-top-1">
                            <div class="font-weight-600">{{ trans('inventory::items.opening_stock') }}</div>
                            <div><small>{{ $item->inventory()->sum('opening_stock_value') }}</small></div>
                        </li>
                    @endif
                @stack('item_opening_stock_value_end')

                @stack('item_unit_start')
                    @if ($item->inventory()->value('unit'))
                        <li class="list-group-item border-0 border-top-1">
                            <div class="font-weight-600">{{ trans('inventory::general.unit') }}</div>
                            <div><small>{{ $item->inventory()->value('unit') }}</small></div>
                        </li>
                    @endif
                @stack('item_unit_end')

                @stack('item_category_start')
                    <li class="list-group-item border-0 border-top-1">
                        <div class="font-weight-600">{{ trans_choice('general.categories', 1) }}</div>
                        <div><small>{{ $item->category->name }}</small></div>
                    </li>
                @stack('item_category_end')

                @stack('tax_input_start')
                    @if ($item->tax)
                        <li class="list-group-item border-0 border-top-1">
                            <div class="font-weight-600">{{ trans_choice('general.taxes', 1) }}</div>
                            <div><small>{{ $item->tax->name }}</small></div>
                        </li>
                    @endif
                @stack('tax_input_end')
            </ul>

            <ul class="list-group mb-4">
                <li class="list-group-item border-0">
                    <h3 class="card-title">{{ trans('general.description') }}</h3>
                </li>
                <li class="list-group-item border-0 border-top-1">
                    <div><small class="long-texts" title="{{ $item->description }}">{{ $item->description }}</small></div>
                </li>
            </ul>

            @if ($item->inventory()->value('barcode'))
                <div class="card-header with-border">
                    <div class="row align-items-center">
                        <div class="col-6 text-nowrap">
                            <h3 class="mb-0">{{ trans('inventory::general.barcode') }}</h3>
                        </div>

                        <div class="col-6 hidden-sm pr-0">
                            <el-tooltip class="new-button float-right"
                                content=" {{ trans('inventory::general.print_barcode') }}"
                                effect="light"
                                :open-delay="100"
                                placement="top">
                                    <a class="mr-4" href="{{ route('inventory.items.print-barcode', $item->id) }}" target="_blank">
                                        <span class="fa fa-print text-default"></span>
                                    </a>
                            </el-tooltip>
                        </div>
                    </div>
                </div>

                <div class="card-header border-bottom-0 show-transaction-card-header">
                    <div class="text-center">
                        <img src="{{ $barcode ? Storage::url($barcode->id) : asset('modules/Inventory/Resources/assets/img/barcode/code_128.png') }}" class="image-style">
                    </div>
                    <div class="text-monospace text-center">
                        {{ $item->inventory()->value('barcode') ?? 'brcd123456789' }}
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-wrapper pt-0">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                                    <i class= "mr-2"></i>{{ trans('inventory::general.overview') }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#reports" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                    <i class="mr-2"></i>{{ trans_choice('inventory::general.histories', 1) }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="cutomer-tab-content">
                        <div class="tab-pane tab active" id="overview">
                            <div class="row">
                                @widget('Modules\Inventory\Widgets\Items\TotalStock', $item)
                                @widget('Modules\Inventory\Widgets\Items\TotalIncome', $item)
                                @widget('Modules\Inventory\Widgets\Items\TotalExpense', $item)
                                @widget('Modules\Inventory\Widgets\Items\IncomeLineChart', $item)
                                @widget('Modules\Inventory\Widgets\Items\TotalCurrentStock', $item)
                                @widget('Modules\Inventory\Widgets\Items\WarehouseReorderLevel', $item)
                            </div>
                        </div>

                        <div class="card tab-pane fade" id="reports">
                            <div class="card">

                                <div class="card-header border-bottom-0">
                                    <div class="row">
                                        <div class="col-12 card-header-search card-header-space">
                                            <span class="table-text hidden-lg card-header-search-text">{{ trans('inventory::general.menu.histories') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush" id="tbl-transactions">
                                        <thead class="thead-light">
                                            <tr class="row table-head-line">
                                                <th class="col-md-2">{{ trans('general.date') }}</th>
                                                <th class="col-md-3">{{ trans_choice('inventory::general.warehouses', 1) }}</th>
                                                <th class="col-md-4">{{ trans('inventory::general.action') . ' ' . trans_choice('general.types', 1) }}</th>
                                                <th class="col-md-3">{{ trans('inventory::general.stock') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($item_histories as $item)
                                                <tr class="row align-items-center border-top-1">
                                                    <td class="col-md-2">
                                                        @date($item->created_at)
                                                    </td>
                                                    <td class="col-md-3">
                                                        <a href="{{ route('inventory.warehouses.show', [$item->warehouse_id]) }}">{{ $item->warehouse->name }}</a>
                                                    </td>
                                                    <td class="col-md-4">
                                                        <a href="{{ url($item->action_url) }}">{{ $item->action_type }}</a>
                                                    </td>
                                                    <td class="col-md-3">
                                                        {{ $item->quantity }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer table-action">
                                    <div class="row align-items-center">
                                        @include('partials.admin.pagination', ['items' => $item_histories, 'type' => 'item_histories'])
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
    <script src="{{ asset('modules/Inventory/Resources/assets/js/items.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
