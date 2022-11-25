@extends('layouts.admin')

@section('title', trans_choice('inventory::general.histories', 2))

@section('content')
    <div class="card">
        <div class="card-header border-bottom-0" :class="[{'bg-gradient-primary': bulk_action.show}]">
            {!! Form::open([
                'method' => 'GET',
                'route' => 'inventory.histories.index',
                'role' => 'form',
                'class' => 'mb-0'
            ]) !!}
                <div class="align-items-center" v-if="!bulk_action.show">
                    <x-search-string model="Modules\Inventory\Models\History" />
                </div>

                {{ Form::bulkActionRowGroup('inventory::general.warehouses', $bulk_actions, ['group' => 'inventory', 'type' => 'histories']) }}
            {!! Form::close() !!}
        </div>

        <div class="table-responsive">
            <table class="table table-flush table-hover" >
                <thead class="thead-light">
                    <tr class="row table-head-line">
                        <th class="col-md-2">{{ trans('general.date') }}</th>
                        <th class="col-md-3">{{ trans_choice('general.items', 1) }}</th>
                        <th class="col-md-3">{{ trans_choice('inventory::general.warehouses', 1) }}</th>
                        <th class="col-md-2">{{ trans('inventory::general.action') . ' ' . trans_choice('general.types', 1) }}</th>
                        <th class="col-md-2">{{ trans('inventory::general.stock') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($histories as $item)
                        <tr class="row align-items-center border-top-1">
                            <td class="col-md-2 border-0">
                                @date($item->created_at)
                            </td>
                            <td class="col-md-3 border-0">
                                <a href="{{ route('inventory.items.show', $item->item_id) }}">{{ $item->item->name }}</a>
                            </td>
                            <td class="col-md-3 border-0">
                                <a href="{{ route('inventory.warehouses.show', $item->warehouse_id) }}">{{ $item->warehouse->name }}</a>
                            </td>
                            <td class="col-md-2">
                                <a href="{{ url($item->action_url) }}">{{ $item->action_type }}</a>
                            </td>
                            <td class="col-md-2 border-0">
                                {{ $item->quantity }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

         <div class="card-footer table-action">
            <div class="row align-items-center">
                @include('partials.admin.pagination', ['items' => $histories, 'type' => 'histories'])
            </div>
        </div>
    </div>
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/histories.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
