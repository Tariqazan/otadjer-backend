@extends('layouts.admin')

@section('title', trans_choice('inventory::general.manufacturers', 2))

@section('new_button')
    @permission('create-inventory-manufacturers')
        <span><a href="{{ route('inventory.manufacturers.create') }}" class="btn btn-success btn-sm header-button-top"><span class="fa fa-plus"></span> &nbsp;{{ trans('general.add_new') }}</a></span>
        {{-- <span><a href="{{ route('import.create', ['inventory', 'manufacturers']) }}" class="btn btn-white btn-sm header-button-top"><span class="fa fa-upload "></span> &nbsp;{{ trans('import.import') }}</a></span> --}}
    @endpermission
    {{-- <span><a href="{{ route('inventory.manufacturers.export', request()->input()) }}" class="btn btn-white btn-sm header-button-top"><span class="fa fa-download"></span> &nbsp;{{ trans('general.export') }}</a></span> --}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
            {!! Form::open([
                'method' => 'GET',
                'route' => 'inventory.manufacturers.index',
                'role' => 'form',
                'class' => 'mb-0'
            ]) !!}
                <div class="align-items-center" v-if="!bulk_action.show">
                    <akaunting-search
                        :placeholder="'{{ trans('general.search_placeholder') }}'"
                        :options="{{ json_encode([]) }}"
                    ></akaunting-search>
                </div>

                {{ Form::bulkActionRowGroup('inventory::general.manufacturers', $bulk_actions, ['group' => 'inventory', 'type' => 'manufacturers']) }}
            {!! Form::close() !!}
        </div>

        <div class="table-responsive">
            <table class="table table-flush table-hover">
                <thead class="thead-light">
                    <tr class="row table-head-line">
                        <th class="col-sm-2 col-md-1 col-lg-1 col-xl-1 hidden-sm">{{ Form::bulkActionAllGroup() }}</th>
                        <th class="col-md-5">@sortablelink('name', trans('general.name'))</th>
                        <th class="col-md-4">@sortablelink('vendor', trans_choice('general.vendors', 1))</th>
                        <th class="col-md-1">@sortablelink('enabled', trans_choice('general.enabled', 1))</th>
                        <th class="col-md-1 text-center">{{ trans('general.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($manufacturers as $item)
                        <tr class="row align-items-center border-top-1">
                            <td class="col-sm-2 col-md-1 col-lg-1 col-xl-1 hidden-sm border-0">{{ Form::bulkActionGroup($item->id, $item->name) }}</td>
                            <td class="col-md-5 border-0"><a href="{{ route('inventory.manufacturers.show' , $item->id) }}">{{ $item->name }}</a></td>
                            <td class="col-md-4 border-0">
                                @if ($item->manufacturer_vendors()->count())
                                    @foreach($item->manufacturer_vendors as $manufacturer_vendor)
                                    @php $vendor = $manufacturer_vendor->vendor; @endphp
                                    {{ $vendor->name }}
                                    @endforeach
                                @else
                                    {{ trans('general.na') }}
                                @endif
                            </td>
                            <td class="col-md-1 border-0">
                                @if (user()->can('update-inventory-manufacturers'))
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
                                        <a class="dropdown-item" href="{{ route('inventory.manufacturers.show', $item->id) }}">{{ trans('general.show') }}</a>
                                        <a class="dropdown-item" href="{{ route('inventory.manufacturers.edit', $item->id) }}">{{ trans('general.edit') }}</a>
                                        @permission('create-inventory-manufacturers')
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('inventory.manufacturers.duplicate', $item->id) }}">{{ trans('general.duplicate') }}</a>
                                        @endpermission
                                        @permission('delete-inventory-manufacturers')
                                            <div class="dropdown-divider"></div>
                                            {!! Form::deleteLink($item, 'inventory.manufacturers.index') !!}
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
                @include('partials.admin.pagination', ['items' => $manufacturers, 'type' => 'manufacturers'])
            </div>
        </div>
    </div>
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/manufacturers.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
