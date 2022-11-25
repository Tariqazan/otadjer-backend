@extends('layouts.admin')

@section('title', trans('general.title.new', ['type' => trans_choice('crm::general.deals', 1)]))

@section('content')
    <div class="card">
        {!! Form::open([
            'route' => 'crm.deals.store',
            'id' => 'deal',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'autocomplete' => "off",
            'class' => 'form-loading-button needs-validation',
            'novalidate' => 'true'
        ]) !!}

        <div class="card-body">
            <div class="row">
                {{ Form::textGroup('name', trans('general.name'), 'font') }}

                @stack('color_input_start')
                    <div class="form-group col-md-6 required {{ $errors->has('color') ? 'has-error' : ''}}">
                        {!! Form::label('color', trans('general.color'), ['class' => 'form-control-label']) !!}
                        <div class="input-group input-group-merge" id="category-color-picker">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <el-color-picker v-model="color" size="mini" :predefine="predefineColors" @change="onChangeColor"></el-color-picker>
                                </span>
                            </div>
                            {!! Form::text('color', '#e5e5e5', ['v-model' => 'form.color', '@input' => 'onChangeColorInput', 'id' => 'color', 'class' => 'form-control color-hex', 'required' => 'required']) !!}
                        </div>
                        {!! $errors->first('color', '<p class="help-block">:message</p>') !!}
                    </div>
                @stack('color_input_end')

                <akaunting-select
                    class="col-md-6 required"
                    :icon="'id-card'"
                    :title="'{{ trans_choice('crm::general.contacts',1) }}'"
                    :placeholder="'{{ trans('general.form.select.field', ['field' => trans_choice('crm::general.contacts',1)]) }}'"
                    :name="'crm_contact_id'"
                    :dynamic-options="options.crm_contact_id"
                    :value="'{{ old('crm_contact_id') }}'"
                    @interface="form.crm_contact_id = $event"
                    @change="onContactCompany()"
                    :form-error="form.errors.get('crm_contact_id')"
                    :no-data-text="'{{ trans('general.no_data') }}'"
                    :no-matching-data-text="'{{ trans('general.no_matching_data') }}'"
                ></akaunting-select>

                <akaunting-select
                    class="col-md-6 required"
                    :icon="'building'"
                    :title="'{{ trans_choice('crm::general.companies',1) }}'"
                    :placeholder="'{{ trans('general.form.select.field', ['field' => trans_choice('crm::general.companies',1)]) }}'"
                    :name="'crm_company_id'"
                    :dynamic-options="options.crm_company_id"
                    :value="'{{ old('crm_company_id') }}'"
                    @interface="form.crm_company_id = $event"
                    @change="onCompanyContact()"
                    :form-error="form.errors.get('crm_company_id')"
                    :no-data-text="'{{ trans('general.no_data') }}'"
                    :no-matching-data-text="'{{ trans('general.no_matching_data') }}'"
                ></akaunting-select>

                {{ Form::selectAddNewGroup('currency_code', trans_choice('general.currencies', 1), 'exchange-alt', $currencies, setting('default.currency'), ['required' => 'required', 'path' => route('modals.currencies.create'), 'field' => ['key' => 'code', 'value' => 'name'], 'change' => 'onChangeCurrency']) }}

                {{ Form::textGroup('amount', trans('general.amount'), 'money-bill-wave-alt') }}
                
                {{ Form::selectGroup('owner_id', trans('crm::general.owner'), 'user-circle', $owners) }}

                {{ Form::selectGroup('pipeline_id', trans('crm::general.pipeline'), 'list-ul', $pipelines) }}

                {{ Form::dateGroup('closed_at', trans('crm::general.closed_at'), 'calendar', ['id' => 'closed_at', 'class' => 'form-control datepicker', 'required' => 'required', 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], Date::now()->toDateString()) }}
            </div>
        </div>

        <div class="card-footer">
            <div class="row float-right">
                {{ Form::saveButtons('crm/deals') }}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection

@push('scripts_start')
    <script>
        var dealStatus = 'false';
        var ownerName = '';
    </script>
    <script src="{{ asset('modules/Crm/Resources/assets/js/deals.min.js?v=' .module_version('crm')) }}"></script>
@endpush
