@extends('layouts.admin')

@section('title', trans_choice('inventory::general.transfer_orders', 2))

@section('new_button')
    @permission('create-inventory-transfer-orders')
        <span><a href="{{ route('inventory.transfer-orders.create') }}" class="btn btn-success btn-sm header-button-top">{{ trans('general.add_new') }}</a></span>
        <span><a href="#" class="btn btn-white btn-sm header-button-top">{{ trans('import.import') }}</a></span>
    @endpermission
    <span><a href="#" class="btn btn-white btn-sm header-button-top">{{ trans('general.export') }}</a></span>
@endsection

@section('content')
    @if ($transfer_orders->count() || request()->get('search', false))
        <div class="card">
            <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
                {!! Form::open([
                    'method' => 'GET',
                    'route' => 'inventory.transfer-orders.index',
                    'role' => 'form',
                    'class' => 'mb-0'
                ]) !!}
                    <div class="align-items-center" v-if="!bulk_action.show">
                        <x-search-string model="Modules\Inventory\Models\TransferOrder" />
                    </div>

                    {{ Form::bulkActionRowGroup('inventory::general.transfer-orders', $bulk_actions, ['group' => 'inventory', 'type' => 'transfer-orders']) }}
                {!! Form::close() !!}
            </div>

            <div class="table-responsive">
                <table class="table table-flush table-hover">
                    <thead class="thead-light">
                        <tr class="row table-head-line">
                            <th class="col-sm-2 col-md-1 col-lg-1 col-xl-1 hidden-sm">{{ Form::bulkActionAllGroup() }}</th>
                            <th class="col-md-2">@sortablelink('transfer_order_number', trans_choice('general.numbers', 1))</th>
                            <th class="col-md-2">@sortablelink('transfer_order', trans_choice('inventory::general.transfer_orders', 1))</th>
                            <th class="col-md-2">@sortablelink('source_warehouse_id', trans('inventory::transferorders.source'))</th>
                            <th class="col-md-2">@sortablelink('destination_warehouse_id', trans('inventory::transferorders.destination'))</th>
                            <th class="col-md-1">@sortablelink('date', trans('general.date'))</th>
                            <th class="col-md-1">@sortablelink('status', trans_choice('general.statuses', 1))</th>
                            <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($transfer_orders as $item)
                            <tr class="row align-items-center border-top-1">
                                <td class="col-sm-2 col-md-1 col-lg-1 col-xl-1 hidden-sm border-0">{{ Form::bulkActionGroup($item->id, $item->transfer_order) }}</td>
                                <td class="col-md-2 border-0">
                                    <a href="{{ route('inventory.transfer-orders.show', $item->id) }}">
                                        {{ $item->transfer_order_number }}
                                    </a>
                                </td>
                                <td class="col-md-2 border-0">{{ $item->transfer_order }}</td>
                                <td class="col-md-2 border-0">{{ $item->source_warehouse->name }}</td>
                                <td class="col-md-2 border-0">{{ $item->destination_warehouse->name }}</td>
                                <td class="col-md-1 border-0">@date($item->date)</td>
                                <th class="col-md-1 border-0">
                                    @if ( $item->status == 'draft')
                                        <span class="badge badge-default">
                                            {{ trans('inventory::transferorders.draft') }}
                                        </span>
                                    @elseif ($item->status == 'ready')
                                        <span class="badge badge-danger">
                                            {{ trans('inventory::transferorders.ready') }}
                                        </span>
                                    @elseif ($item->status == 'in_transfer')
                                        <span class="badge badge-warning">
                                            {{ trans('inventory::transferorders.in_transfer') }}
                                        </span>
                                    @elseif ($item->status == 'transferred')
                                        <span class="badge badge-success">
                                            {{ trans('inventory::transferorders.transferred') }}
                                        </span>
                                    @elseif ($item->status == 'cancelled')
                                        <span class="badge badge-dark">
                                            {{ trans('inventory::transferorders.cancelled') }}
                                        </span>
                                    @endif
                                </th>
                                <td class="col-xs-4 col-sm-3 col-md-1 col-lg-1 col-xl-1 text-center border-0">
                                    <div class="dropdown">
                                        <a class="btn btn-neutral btn-sm text-light items-align-center p-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('inventory.transfer-orders.show', $item->id) }}">
                                                {{ trans('general.show') }}
                                            </a>

                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="{{ route('inventory.transfer-orders.print', $item->id) }}" target="_blank">
                                                {{ trans('general.print') }}
                                            </a>

                                            <a class="dropdown-item" href="{{ route('inventory.transfer-orders.download', $item->id) }}">
                                                {{ trans('general.download_pdf') }}
                                            </a>

                                            @if (($item->status == 'cancelled'))
                                                <a class="dropdown-item disabled" href="{{ route('inventory.transfer-orders.cancelled', $item->id) }}">
                                                    {{ trans('general.cancel') }}
                                                </a>
                                            @else
                                                <a class="dropdown-item" href="{{ route('inventory.transfer-orders.cancelled', $item->id) }}">
                                                    {{ trans('general.cancel') }}
                                                </a>
                                            @endif
                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="{{ route('inventory.transfer-orders.edit', $item->id) }}">
                                                {{ trans('general.edit') }}
                                            </a>

                                            @permission('delete-inventory-transfer-orders')
                                                <div class="dropdown-divider"></div>
                                                {!! Form::deleteLink($item, 'inventory.transfer-orders.destroy', 'inventory::general.transfer_orders') !!}
                                            @endpermission
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer table-action">
                <div class="row align-items-center">
                    @include('partials.admin.pagination', ['items' => $transfer_orders, 'type' => 'transfer_orders'])
                </div>
            </div>
        </div>
    @else
        @include('inventory::partials.empty_page', ['page' => 'transfer-orders', 'icon' => 'fas fa-dolly-flatbed fa-10x'])
    @endif
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/transfer_orders.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
