@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('inventory::general.manufacturers', 1)]))

@section('content')
    <div class="card">
        {!! Form::model($manufacturer, [
            'id' => 'manufacturer',
            'method' => 'PATCH',
            'route' => ['inventory.manufacturers.update', $manufacturer->id],
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true
        ]) !!}

            <div class="card-body">
                <div class="row">
                    {{ Form::textGroup('name', trans('general.name'), 'id-card-o') }}

                    {{ Form::selectAddNewGroup('vendor_id', trans_choice('general.vendors', 1), 'user', $vendors, $manufacturer->vendor_id, ['required' => 'required', 'path' => route('modals.vendors.create'), 'change' => 'onChangeContact']) }}

                    {{ Form::textareaGroup('description', trans('general.description')) }}

                    {{ Form::radioGroup('enabled', trans('general.enabled'), $manufacturer->enabled) }}

                    @stack('create_vendor_input_start')
                    <div id="customer-create-vendor" class="form-group col-md-12 margin-top">
                        <strong>{{ trans('inventory::manufacturers.allow_vendor') }}</strong> &nbsp;  {{ Form::checkbox('create_vendor', '1', null, ['id' => 'create_vendor']) }}
                    </div>
                    @stack('create_vendor_input_end')
                </div>
            </div>

            @permission('update-inventory-manufacturers')
                <div class="card-footer">
                    <div class="row save-buttons">
                        {{ Form::saveButtons('inventory.manufacturers.index') }}
                    </div>
                </div>
            @endpermission
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/manufacturers.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
