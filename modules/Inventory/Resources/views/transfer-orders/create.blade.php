@extends('layouts.admin')

@section('title', trans('general.title.new', ['type' => trans_choice('inventory::general.transfer_orders', 1)]))

@section('content')
    {!! Form::open([
        'route' => 'inventory.transfer-orders.store',
        'id' => 'transfer-order',
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
                    {{ Form::textGroup('transfer_order', trans_choice('inventory::general.transfer_orders', 1), 'id-card') }}

                    {{ Form::textGroup('transfer_order_number', trans_choice('inventory::transferorders.transfer_order_number', 1), 'id-card', ['required' => 'required'], old('transfer_order_number', $number)) }}

                    {{ Form::dateGroup('date', trans('general.date'), 'calendar', ['id' => 'closed_at', 'required' => 'required', 'class' => 'form-control datepicker', 'show-date-format' => company_date_format(), 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], Date::now()->toDateString()) }}

                    {{ Form::textGroup('reason', trans('inventory::transferorders.reason'), 'far fa-question-circle', []) }}

                    <akaunting-select
                        class="col-md-6 required"
                        :form-classes="[{'has-error': form.errors.get('source_warehouse_id') }]"
                        :icon="'warehouse'"
                        :title="'{{ trans('inventory::transferorders.source_warehouse') }}'"
                        :placeholder="'{{ trans('general.form.select.field', ['field' => trans('inventory::transferorders.source_warehouse')]) }}'"
                        :name="'source_warehouse_id'"
                        :options="{{ $warehouses }}"
                        :value="'{{ old('source_warehouse_id') }}'"
                        @interface="form.source_warehouse_id = $event"
                        @change="onChangeType()"
                        :form-error="form.errors.get('source_warehouse_id')"
                        :no-data-text="'{{ trans('general.no_data') }}'"
                        :no-matching-data-text="'{{ trans('general.no_matching_data') }}'"
                    ></akaunting-select>

                    <akaunting-select
                        class="col-md-6 required d-none"
                        :class="[{'show': items}]"
                        :form-classes="[{'has-error': form.errors.get('destination_warehouse_id') }]"
                        :icon="'warehouse'"
                        :title="'{{ trans('inventory::transferorders.destination_warehouse') }}'"
                        :placeholder="'{{ trans('general.form.select.field', ['field' => trans('inventory::transferorders.destination_warehouse')]) }}'"
                        :name="'destination_warehouse_id'"
                        :dynamic-options="options.destination_warehouse"
                        :value="'{{ old('destination_warehouse_id') }}'"
                        @interface="form.destination_warehouse_id = $event"
                        :form-error="form.errors.get('destination_warehouse_id')"
                        :no-data-text="'{{ trans('general.no_data') }}'"
                        :no-matching-data-text="'{{ trans('general.no_matching_data') }}'"
                    ></akaunting-select>
                </div>
            </div>
        </div>

        <div class="card" v-if="items">
            <div class="table-responsive">
                <table class="table table-bordered" id="items">
                    <thead class="thead-light">
                        <tr class="row">
                            <th class="col-md-1">{{ trans('general.actions') }}</th>
                            <th class="col-md-5">{{ trans_choice('general.items', 1) }}</th>
                            <th class="col-md-3">{{ trans('inventory::transferorders.item_quantity') }}</th>
                            <th class="col-md-3">{{ trans('inventory::transferorders.transfer_quantity') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="row" v-for="(row, index) in form.items" :index="index">
                            <td class="col-md-1">
                                <button type="button"
                                    @click="onDeleteItem(index)"
                                    data-toggle="tooltip"
                                    title="{{ trans('general.delete') }}"
                                    class="btn btn-icon btn-outline-danger btn-lg"><i class="fa fa-trash"></i>
                                </button>
                            </td>
                            <td class="col-md-5">
                                <akaunting-select
                                    class="col-md-12"
                                    :class="[{'show': items}]"
                                    :form-classes="[{'has-error': form.errors.get('item') }]"
                                    :placeholder="'{{ trans('general.form.select.field',
                                    ['field' => trans_choice('general.items', 1)]) }}'"
                                    name="items[][item_id]"
                                    :dynamic-options="options.item_id"
                                    :value="'{{ old('item_id') }}'"
                                    @interface="row.item_id = $event"
                                    @change="onChangeItemQuantity(index)"
                                    :form-error="form.errors.get('item_id')"
                                    :no-data-text="'{{ trans('general.no_data') }}'"
                                    :no-matching-data-text="'{{ trans('general.no_matching_data') }}'"
                                    >
                                </akaunting-select>
                            </td>
                            <td class="col-md-3">
                                <input value=""
                                class="form-control"
                                disabled
                                data-item="item_quantity"
                                required="required"
                                name="items[][item_quantity]"
                                v-model="row.item_quantity"
                                type="text"
                                autocomplete="off">
                            </td>
                            <td class="col-md-3">
                                <input value=""
                                class="form-control"
                                data-item="transfer_quantity"
                                required="required"
                                name="items.' + index + '.transfer_quantity'"
                                v-model="row.transfer_quantity"
                                type="text"
                                autocomplete="off"
                                @input="onChangeQuantity(index)">

                                <div class="invalid-feedback d-block" v-if="transfer_button"
                                    v-if="form.errors.has('items.' + index + '.transfer_quantity')"
                                    v-html="form.errors.get('items.' + index + '.transfer_quantity')">
                                </div>
                            </td>
                        </tr>

                        <tr id="addItem">
                            <td class="col-md-1">
                                <button type="button"
                                    @click="onAddItem"
                                    id="button-add-item"
                                    data-toggle="tooltip"
                                    title="{{ trans('general.add') }}"
                                    class="btn btn-icon btn-outline-success btn-lg"
                                    data-original-title="{{ trans('general.add') }}">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-footer">
                <div class="row save-buttons">
                    <a href="{{ route('inventory.transfer-orders.index') }}" class="btn btn-icon btn-outline-secondary header-button-top">
                        <span class="btn-inner--icon"><i class="fas fa-times"></i></span>
                        <span class="btn-inner--text">{{ trans('general.cancel') }}</span>
                    </a>
                    {!! Form::button(
                        '<div v-if="form.loading" class="aka-loader-frame">
                            <div class="aka-loader">
                            </div>
                        </div>
                            <span :class="[{\'opacity-10\': transfer_button}]" v-if="!form.loading" class="btn-inner--icon">
                                <i class="fas fa-save"></i>
                            </span>' .
                        '<span :class="[{\'opacity-10\': transfer_button}]" class="btn-inner--text"> ' . trans('general.save') . '</span>',
                        [':disabled' => 'transfer_button|| form.loading', 'type' => 'submit', 'class' => 'btn btn-icon btn-success button-submit header-button-top', 'data-loading-text' => trans('general.loading')])
                    !!}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection

@push('scripts_start')
    <script type="text/javascript">
        var variant_items = false;
    </script>

    <script src="{{ asset('modules/Inventory/Resources/assets/js/transfer_orders.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
