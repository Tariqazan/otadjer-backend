@extends('layouts.admin')

@section('title', trans_choice('inventory::general.item_groups', 2))

@section('new_button')
    @permission('create-inventory-item-groups')
        <span><a href="{{ route('inventory.item-groups.create') }}" class="btn btn-success btn-sm header-button-top">{{ trans('general.add_new') }}</a></span>
        <span><a href="{{ route('import.create', ['inventory', 'item-groups']) }}" class="btn btn-white btn-sm header-button-top">{{ trans('import.import') }}</a></span>
    @endpermission
    <span><a href="{{ route('inventory.item-groups.export', request()->input()) }}" class="btn btn-white btn-sm header-button-top">{{ trans('general.export') }}</a></span>
@endsection

@section('content')
    @if ($item_groups->count() || request()->get('search', false))
        <div class="card">
            <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
                {!! Form::open([
                    'method' => 'GET',
                    'route' => 'inventory.item-groups.index',
                    'role' => 'form',
                    'class' => 'mb-0'
                ]) !!}
                    <div class="align-items-center" v-if="!bulk_action.show">
                        <x-search-string model="Modules\Inventory\Models\ItemGroup" />
                    </div>

                    {{ Form::bulkActionRowGroup('inventory::general.item_groups', $bulk_actions, ['group' => 'inventory', 'type' => 'itemGroups']) }}
                {!! Form::close() !!}
            </div>

            <div class="table-responsive">
                <table class="table table-flush table-hover">
                    <thead class="thead-light">
                        <tr class="row table-head-line">
                            <th class="col-sm-2 col-md-1 col-lg-1 col-xl-1 hidden-sm">{{ Form::bulkActionAllGroup() }}</th>
                            <th class="col-xs-4 col-sm-4 col-md-4 col-lg-3 col-xl-4">@sortablelink('name', trans('general.name'), ['filter' => 'active, visible'], ['class' => 'col-aka', 'rel' => 'nofollow'])</th>
                            <th class="col-md-3 hidden-xs">@sortablelink('category', trans_choice('general.categories', 1))</th>
                            <th class="col-md-2 hidden-xs">{{ trans_choice('general.items', 2) }}</th>
                            <th class="col-md-1 hidden-xs">@sortablelink('enabled', trans('general.enabled'))</th>
                            <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($item_groups as $item_group)
                            <tr class="row align-items-center border-top-1">
                                <td class="col-sm-2 col-md-1 col-lg-1 col-xl-1 hidden-sm border-0">{{ Form::bulkActionGroup($item_group->id, $item_group->name) }}</td>
                                <td class="col-xs-4 col-sm-4 col-md-4 col-lg-3 col-xl-4 py-2">
                                    <img src="{{ $item_group->picture ? Storage::url($item_group->picture->id) : asset('public/img/otadjer-logo-black.svg') }}" class="avatar image-style p-1 mr-3 item-img hidden-md col-aka" alt="{{ $item_group->name }}">
                                    <a href="{{ route('inventory.item-groups.edit', $item_group->id) }}">{{ $item_group->name }}</a>
                                </td>
                                <td class="col-md-3 hidden-xs border-0">{{ $item_group->category ? $item_group->category->name : trans('general.na') }}</td>
                                <td class="col-md-2 hidden-xs border-0">{{ $item_group->items->count() }}</td>
                                <td class="col-md-1 hidden-xs border-0">
                                    @if (user()->can('update-inventory-warehouses'))
                                        {{ Form::enabledGroup($item_group->id, $item_group->name, $item_group->enabled) }}
                                    @else
                                        @if ($item_group->enabled)
                                            <badge rounded type="success" class="mw-60">{{ trans('general.yes') }}</badge>
                                        @else
                                            <badge rounded type="danger" class="mw-60">{{ trans('general.no') }}</badge>
                                        @endif
                                    @endif
                                </td>
                                <td class="col-xs-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 text-center border-0">
                                    <div class="dropdown">
                                        <a class="btn btn-neutral btn-sm text-light items-align-center p-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-muted"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('inventory.item-groups.edit', $item_group->id) }}">{{ trans('general.edit') }}</a>
                                            @permission('create-inventory-item-groups')
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ route('inventory.item-groups.duplicate', $item_group->id) }}">{{ trans('general.duplicate') }}</a>
                                            @endpermission
                                            @permission('delete-inventory-item-groups')
                                                <div class="dropdown-divider"></div>
                                                {!! Form::deleteLink($item_group, 'inventory.item-groups.destroy', 'inventory::general.item_groups') !!}
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
                    @include('partials.admin.pagination', ['items' => $item_groups, 'type' => 'item_groups'])
                </div>
            </div>
        </div>
    @else
        @include('inventory::partials.empty_page', ['page' => 'item-groups'])
    @endif
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/item_groups.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
