@extends('layouts.admin')

@section('title', trans_choice('inventory::general.variants', 2))

@section('new_button')
    @permission('create-inventory-variants')
        <span><a href="{{ route('inventory.variants.create') }}" class="btn btn-success btn-sm header-button-top">{{ trans('general.add_new') }}</a></span>
        <span><a href="{{ route('import.create', ['inventory', 'variants']) }}" class="btn btn-white btn-sm header-button-top">{{ trans('import.import') }}</a></span>
    @endpermission
    <span><a href="{{ route('inventory.variants.export', request()->input()) }}" class="btn btn-white btn-sm header-button-top">{{ trans('general.export') }}</a></span>
@endsection

@section('content')
    @if ($variants->count() || request()->get('search', false))
        <div class="card">
            <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
                {!! Form::open([
                    'method' => 'GET',
                    'route' => 'inventory.variants.index',
                    'role' => 'form',
                    'class' => 'mb-0'
                ]) !!}
                    <div class="align-items-center" v-if="!bulk_action.show">
                        <x-search-string model="Modules\Inventory\Models\variant" />
                    </div>

                    {{ Form::bulkActionRowGroup('inventory::general.variants', $bulk_actions, ['group' => 'inventory', 'type' => 'variants']) }}
                {!! Form::close() !!}
            </div>

            <div class="table-responsive">
                <table class="table table-flush table-hover">
                    <thead class="thead-light">
                        <tr class="row table-head-line">
                            <th class="col-sm-2 col-md-1 col-lg-1 col-xl-1 hidden-sm">{{ Form::bulkActionAllGroup() }}</th>
                            <th class="col-md-5">@sortablelink('name', trans('general.name'))</th>
                            <th class="col-md-4">@sortablelink('values', trans('inventory::variants.values'))</th>
                            <th class="col-md-1">@sortablelink('enabled', trans('general.enabled'))</th>
                            <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($variants as $item)
                            <tr class="row align-items-center border-top-1">
                                <td class="col-sm-2 col-md-1 col-lg-1 col-xl-1 hidden-sm border-0">{{ Form::bulkActionGroup($item->id, $item->name) }}</td>
                                <td class="col-md-5 border-0"><a href="{{ route('inventory.variants.edit', $item->id) }}">{{ $item->name }}</a></td>
                                <td class="col-md-4 border-0">{{ $item->values->count() }}</td>
                                <td class="col-md-1 hidden-xs border-0">
                                    @if (user()->can('update-inventory-variants'))
                                        {{ Form::enabledGroup($item->id, $item->name, $item->enabled) }}
                                    @else
                                        @if ($item->enabled)
                                            <badge rounded type="success" class="mw-60">{{ trans('general.yes') }}</badge>
                                        @else
                                            <badge rounded type="danger" class="mw-60">{{ trans('general.no') }}</badge>
                                        @endif
                                    @endif
                                </td>
                                <td class="col-xs-4 col-sm-3 col-md-1 col-lg-1 col-xl-1 text-center border-0">
                                    <div class="dropdown">
                                        <a class="btn btn-neutral btn-sm text-light items-align-center p-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('inventory.variants.edit', $item->id) }}">{{ trans('general.edit') }}</a>
                                            @permission('create-inventory-variants')
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ route('inventory.variants.duplicate', $item->id) }}">{{ trans('general.duplicate') }}</a>
                                            @endpermission
                                            @permission('delete-inventory-variants')
                                                <div class="dropdown-divider"></div>
                                                {!! Form::deleteLink($item, 'inventory.variants.destroy', 'inventory::general.variants') !!}
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
                    @include('partials.admin.pagination', ['items' => $variants, 'type' => 'variants'])
                </div>
            </div>
        </div>
    @else
        @include('inventory::partials.empty_page', ['page' => 'variants'])
    @endif
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/variants.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
