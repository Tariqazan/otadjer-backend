@extends('layouts.admin')

@section('title', trans_choice('inventory::general.adjustments', 2))

@section('new_button')
    @permission('create-inventory-adjustments')
        <span><a href="{{ route('inventory.adjustments.create') }}" class="btn btn-success btn-sm header-button-top">{{ trans('general.add_new') }}</a></span>
        <span><a href="#" class="btn btn-white btn-sm header-button-top">{{ trans('import.import') }}</a></span>
    @endpermission
    <span><a href="#" class="btn btn-white btn-sm header-button-top">{{ trans('general.export') }}</a></span>
@endsection

@section('content')
    @if ($adjustments->count() || request()->get('search', false))
        <div class="card">
            <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
                {!! Form::open([
                    'method' => 'GET',
                    'route' => 'inventory.adjustments.index',
                    'role' => 'form',
                    'class' => 'mb-0'
                ]) !!}
                    <div class="align-items-center" v-if="!bulk_action.show">
                        <x-search-string model="Modules\Inventory\Models\Adjustment" />
                    </div>

                    {{ Form::bulkActionRowGroup('inventory::general.adjustments', $bulk_actions, ['group' => 'inventory', 'type' => 'adjustments']) }}
                {!! Form::close() !!}
            </div>

            <div class="table-responsive">
                <table class="table table-flush table-hover">
                    <thead class="thead-light">
                        <tr class="row table-head-line">
                            <th class="col-sm-2 col-md-1 col-lg-1 col-xl-1 hidden-sm">{{ Form::bulkActionAllGroup() }}</th>
                            <th class="col-md-2">{{ trans_choice('general.numbers', 1) }}</th>
                            <th class="col-md-3">{{ trans_choice('inventory::general.warehouses', 1) }}</th>
                            <th class="col-md-3">{{ trans('inventory::transferorders.reason') }}</th>
                            <th class="col-md-2">{{ trans('general.date') }}</th>
                            <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($adjustments as $item)
                            <tr class="row align-items-center border-top-1">
                                <td class="col-sm-2 col-md-1 col-lg-1 col-xl-1 hidden-sm border-0">{{ Form::bulkActionGroup($item->id, $item->adjustment) }}</td>
                                <td class="col-md-2 border-0">
                                    <a href="{{ route('inventory.adjustments.show', $item->id) }}">
                                        {{ $item->adjustment_number }}
                                    </a>
                                </td>
                                <td class="col-md-3 border-0">{{ $item->warehouse->name }}</td>
                                <td class="col-md-3 border-0">{{ $item->reason }}</td>
                                <td class="col-md-2 border-0">@date($item->date)</td>
                                <td class="col-xs-4 col-sm-3 col-md-1 col-lg-1 col-xl-1 text-center border-0">
                                    <div class="dropdown">
                                        <a class="btn btn-neutral btn-sm text-light items-align-center p-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('inventory.adjustments.show', $item->id) }}">
                                                {{ trans('general.show') }}
                                            </a>

                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="{{ route('inventory.adjustments.print', $item->id) }}" target="_blank">
                                                {{ trans('general.print') }}
                                            </a>

                                            <a class="dropdown-item" href="{{ route('inventory.adjustments.download', $item->id) }}">
                                                {{ trans('general.download_pdf') }}
                                            </a>
                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="{{ route('inventory.adjustments.edit', $item->id) }}">
                                                {{ trans('general.edit') }}
                                            </a>

                                            @permission('delete-inventory-adjustments')
                                                <div class="dropdown-divider"></div>
                                                {!! Form::deleteLink($item, 'inventory.adjustments.destroy', 'inventory::general.adjustments') !!}
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
                    @include('partials.admin.pagination', ['items' => $adjustments, 'type' => 'adjustments'])
                </div>
            </div>
        </div>
    @else
        @include('inventory::partials.empty_page', ['page' => 'adjustments', 'icon' => 'fas fa-exclamation-triangle fa-10x'])
    @endif
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/adjustments.min.js?v=' . module_version('inventory')) }}"></script>
@endpush

