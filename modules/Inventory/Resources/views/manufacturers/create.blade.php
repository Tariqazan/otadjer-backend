@extends('layouts.admin')

@section('title', trans('general.title.new', ['type' => trans_choice('inventory::general.manufacturers', 1)]))

@section('content')
    <div class="card">
        {!! Form::open([
            'route' => 'inventory.manufacturers.store',
            'id' => 'manufacturer',
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

                    {{ Form::textareaGroup('description', trans('general.description')) }}

                    {{ Form::radioGroup('enabled', trans('general.enabled'), true) }}

                    @stack('create_vendor_input_start')
                    <div id=customer-create-vendor" class="form-group col-md-12 margin-top">
                        <div class="custom-control custom-checkbox">
                            {{ Form::checkbox('create_vendor', '1', null, [
                                'v-model' => 'form.create_vendor',
                                'id' => 'create_vendor',
                                'class' => 'custom-control-input',
                                '@input' => 'onCreateVendor($event)'
                            ]) }}

                            <label class="custom-control-label" for="create_vendor">
                                <strong>{{ trans('inventory::manufacturers.allow_vendor') }}</strong>
                            </label>
                        </div>
                    </div>
                    @stack('create_vendor_input_end')

                    <div v-if="create_vendor" class="row col-md-12">
                        {{ Form::selectAddNewGroup('vendor_id', trans_choice('general.vendors', 1), 'user', $vendors, config('general.vendors'), ['required' => 'required', 'path' => route('modals.vendors.create')]) }}
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row save-buttons">
                    {{ Form::saveButtons('inventory.warehouses.index') }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/manufacturers.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
