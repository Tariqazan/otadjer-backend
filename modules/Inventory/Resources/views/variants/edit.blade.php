@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('inventory::general.variants', 1)]))

@section('content')
    <div class="card">
        {!! Form::model($variant, [
            'id' => 'variant',
            'method' => 'PATCH',
            'route' => ['inventory.variants.update', $variant->id],
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true
        ]) !!}

            <div class="card-body">
                <div class="row">
                    {{ Form::textGroup('name', trans('general.name'), 'id-card') }}

                    {{ Form::radioGroup('enabled', trans('general.enabled'), $variant->enabled) }}

                    <div id="variant-values" class="form-group col-md-12 hidden">
                        {!! Form::label('items', trans('inventory::variants.values'), ['class' => 'control-label']) !!}
                        <div class="table-responsive">
                            <table class="table table-bordered" id="items">
                                <thead class="thead-light">
                                    <tr class="row">
                                        <th class="col-md-1">{{ trans('general.actions') }}</th>
                                        <th class="col-md-11">{{ trans('general.name') }}</th>
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
                                        <td class="col-md-11">
                                            <input value=""
                                            class="form-control"
                                            data-item="name"
                                            required="required"
                                            name="items[][name]"
                                            v-model="row.name"
                                            type="text"
                                            autocomplete="off">
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
                </div>
            </div>

            @permission('update-inventory-warehouses')
                <div class="card-footer">
                    <div class="row save-buttons">
                        {{ Form::saveButtons('inventory.variants.index') }}
                    </div>
                </div>
            @endpermission
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts_start')
    <script type="text/javascript">
        var variant_items = {!! json_encode($variant->values()->select(['name'])->get()) !!};
    </script>

    <script src="{{ asset('modules/Inventory/Resources/assets/js/variants.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
