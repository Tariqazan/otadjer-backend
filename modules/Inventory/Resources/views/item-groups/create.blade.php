@extends('layouts.admin')

@section('title', trans('general.title.new', ['type' => trans_choice('inventory::general.item_groups', 1)]))

@section('content')
    <div class="card">
        {!! Form::open([
            'route' => 'inventory.item-groups.store',
            'id' => 'item-group',
            'method' => 'POST',
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

                    {{ Form::multiSelectAddNewGroup('tax_ids', trans_choice('general.taxes', 1), 'percentage', $taxes, (setting('default.tax')) ? [setting('default.tax')] : null, ['path' => route('modals.taxes.create'), 'field' => ['key' => 'id', 'value' => 'title']], 'col-md-6 el-select-tags-pl-38') }}

                    {{ Form::textareaGroup('description', trans('general.description')) }}

                    {{ Form::selectAddNewGroup('category_id', trans_choice('general.categories', 1), 'folder', $categories, null, ['path' => route('modals.categories.create') . '?type=item']) }}

                    {{ Form::selectGroup('unit', trans('inventory::general.unit'), 'fas fa-box-open', $units, old('default_unit', setting('inventory.default_unit'))) }}

                    {{ Form::fileGroup('picture', trans_choice('general.pictures', 1), 'plus', ['dropzone-class' => 'form-file', 'options' => ['acceptedFiles' => 'image/*']]) }}

                    {{ Form::radioGroup('enabled', trans('general.enabled'), true) }}

                    <div class="form-group col-md-12 required">
                        {!! Form::label('variants', trans_choice('inventory::general.variants', 2), ['class' => 'control-label', 'required' => 'required']) !!}
                        <label class="text-danger">*</label>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="variants">
                                <thead class="thead-light">
                                    <tr class="row table-head-line">
                                        @stack('actions_th_start')
                                            <th class="text-center col-md-1">{{ trans('general.actions') }}</th>
                                        @stack('actions_th_end')

                                        @stack('name_th_start')
                                        <th class="text-left col-md-3">
                                            {{ trans('general.name') }}
                                            <label class="text-danger">*</label>
                                        </th>
                                        @stack('name_th_end')

                                        @stack('quantity_th_start')
                                        <th class="text-center col-md-8">
                                            {{ trans('inventory::variants.values') }}
                                            <label class="text-danger">*</label>
                                        </th>
                                        @stack('quantity_th_end')
                                    </tr>
                                </thead>

                                <tbody>
                                    @include('inventory::item-groups.variant')
                                    <tr class="row">
                                        <td class="text-left col-md-1" colspan="2">
                                            <button type="button" @click="onAddVariant"
                                                id="button-add-item" data-toggle="tooltip"
                                                title="{{ trans('general.add') }}"
                                                :disabled="add_variant_disabled"
                                                class="btn btn-icon btn-outline-success btn-lg"
                                                data-original-title="{{ trans('general.add') }}">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                        <td class="text-center col-md-11"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#price" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                                        <i class= "mr-2"></i> {{ trans('inventory::items.general_information') }}
                                    </a>
                                    <div class="invalid-feedback d-block"
                                        v-if="form.errors.has('price_tab')"
                                        v-html="form.errors.get('price_tab')">
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#inventory" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                        <i class="mr-2"></i>{{ trans('inventory::general.name') }}
                                    </a>
                                    <div class="invalid-feedback d-block"
                                        v-if="form.errors.has('inventory_tab')"
                                        v-html="form.errors.get('inventory_tab')">
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane active" id="price">
                                @include('inventory::item-groups.price')
                            </div>

                            <div class="tab-pane" id="inventory">
                                @include('inventory::item-groups.inventory')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row save-buttons">
                    {{ Form::saveButtons('inventory.item-groups.index') }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/item_groups.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
