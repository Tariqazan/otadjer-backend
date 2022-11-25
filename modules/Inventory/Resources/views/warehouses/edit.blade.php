@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('inventory::general.warehouses', 1)]))

@section('content')
    {!! Form::model($warehouse, [
        'id' => 'warehouse',
        'method' => 'PATCH',
        'route' => ['inventory.warehouses.update', $warehouse->id],
        '@submit.prevent' => 'onSubmit',
        '@keydown' => 'form.errors.clear($event.target.name)',
        'files' => true,
        'role' => 'form',
        'class' => 'form-loading-button',
        'novalidate' => true
    ]) !!}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    {{ Form::textGroup('name', trans('general.name'), 'id-card') }}

                    {{ Form::textGroup('email', trans('general.email'), 'envelope', []) }}

                    {{ Form::textGroup('phone', trans('general.phone'), 'phone', []) }}

                    {{ Form::textareaGroup('address', trans('general.address'), '', $warehouse->address, ['rows' => '2', 'v-model' => 'form.address']) }}

                    {{ Form::textGroup('city', trans_choice('general.cities', 1), 'city', []) }}

                    {{ Form::textGroup('zip_code', trans('general.zip_code'), 'mail-bulk', []) }}

                    {{ Form::textGroup('state', trans('general.state'), 'city', []) }}

                    {{ Form::selectGroup('country', trans_choice('general.countries', 1), 'globe-americas', trans('countries'), $warehouse->country, ['model' => 'form.country']) }}

                    {{ Form::textareaGroup('description', trans('general.description')) }}

                    {{ Form::radioGroup('default_warehouse', trans('inventory::general.default_warehouse'), $warehouse->default_warehouse) }}

                    {{ Form::radioGroup('enabled', trans('general.enabled'), $warehouse->enabled) }}
                </div>
            </div>
        </div>

        @stack('edit_warehouse_users_start')

        <div class="card">
            @permission('update-inventory-warehouses')
                <div class="card-footer">
                    <div class="row save-buttons">
                        {{ Form::saveButtons('inventory.warehouses.index') }}
                    </div>
                </div>
            @endpermission
        </div>
    {!! Form::close() !!}
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/warehouses.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
