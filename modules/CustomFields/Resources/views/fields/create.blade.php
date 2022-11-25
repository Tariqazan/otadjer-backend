@extends('layouts.admin')

@section('title', trans('general.title.new', ['type' => trans_choice('custom-fields::general.fields', 1)]))

@section('content')
<!-- Default box -->
{!! Form::open([
    'method' => 'POST',
    'route' => 'custom-fields.fields.store',
    'id' => 'field',
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'files' => true,
    'role' => 'form',
    'class' => 'form-loading-button',
    'novalidate' => true
]) !!}
<div class="card">
    <div class="card-box">
        <div class="card-body">
            <div class="row">
            {{ Form::textGroup('name', trans('custom-fields::general.form.name'), 'id-card-o', ['required' => 'required', 'autofocus' => 'autofocus']) }}
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-box">
        <div class="card-body">
            <div class="row">
                {{ Form::selectGroup('type_id', trans_choice('general.types', 1), 'bars', $types , null,['change' => 'onChangeType', 'required' => 'required']) }}

                {{ Form::multiSelectGroup('rule', trans('custom-fields::general.form.rule'), 'check-square-o', $validation_rules, null, []) }}

                <template v-if="can_type === 'values'">
                    <div id="option-values" class="form-group col-md-12 hidden">
                        {!! Form::label('items', trans('custom-fields::general.form.items'), ['class' => 'control-label']) !!}
                        <div class="table-responsive">
                            <table class="table table-bordered" id="items">
                                <thead class="thead-light">
                                    <tr class="row">
                                        <th class="col-md-2 border-bottom-0 border-right-0">{{ trans('general.actions') }}</th>
                                        <th class="col-md-10">{{ trans('custom-fields::general.form.value') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="row" v-for="(row, index) in items" :index="index">
                                        <td class="col-md-2 border-bottom-0 border-right-0">
                                            <button type="button"
                                                @click="onDeleteItem(index)"
                                                data-toggle="tooltip"
                                                title="{{ trans('general.delete') }}"
                                                class="btn btn-icon btn-outline-danger btn-lg"><i class="fa fa-trash"></i>
                                            </button>

                                        </td>
                                        <td class="col-md-10 border-bottom-0">
                                            <input value=""
                                            class="form-control"
                                            data-item="values"
                                            required="required"
                                            name="values[]"
                                            v-model="row.values"
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

                        <div class="invalid-feedback d-block"
                            v-if="{{ 'form.errors.has("' . 'items' . '")' }}"
                            v-html="{{ 'form.errors.get("' . 'items' . '")' }}">
                        </div>
                    </div>
                </template>

                <template v-else-if="can_type === 'value'">
                        {{ Form::textGroup('value', trans('custom-fields::general.form.value'), 'code', []) }}
                </template>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<div class="card">
    <div class="card-box">
        <div class="card-body">
            <div class="row">
                {{ Form::selectGroup('location_id', trans_choice('custom-fields::general.locations', 1), 'map', $locations, null, ['change'=> 'onChangeLocation' ,'required' => 'required']) }}

                {{ Form::selectGroup('sort', trans('custom-fields::general.sort'), 'map', [], null, ['change'=> 'onChangeSort', 'required' => 'required', 'dynamicOptions' => 'sorts', 'disabled' => 'disabled.sort'], 'col-md-3') }}

                {{ Form::selectGroup('order', trans('custom-fields::general.order'), 'sort', [], null, ['required' => 'required', 'dynamicOptions' => 'orders', 'disabled' => 'disabled.order'], 'col-md-3') }}
           </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<div class="card">
    <div class="card-box">
        <div class="card-body">
            <div class="row">
            {{ Form::textGroup('icon', trans('custom-fields::general.form.icon'), 'picture-o', ['required' => 'required']) }}

            {{ Form::textGroup('class', trans('custom-fields::general.form.class'), 'paint-brush',['required' => 'required'], 'col-md-6') }}

            {{ Form::selectGroup('show', trans('custom-fields::general.show'), 'eye', $shows, 'always') }}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<div class="card">
    <div class="box box-success">
        <div class="card-body">
            <div class="row">
                {{ Form::radioGroup('enabled', trans('general.enabled'), true) }}
            <div class="col-md-12" id="location-html"></div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class="card">
    <div class="card-footer">
        <div class="row float-right">
            {{ Form::saveButtons('custom-fields.fields.index') }}
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection

@push('scripts_start')
    <script type="text/javascript">
        var orders = {!! json_encode($orders) !!};
        var field_location_id = {!! json_encode(0) !!};
        var field_sort = {!! json_encode(0) !!};
    </script>

    <script src="{{ asset('modules/CustomFields/Resources/assets/js/custom-fields-fields.min.js?v=' . version('short')) }}"></script>
@endpush
