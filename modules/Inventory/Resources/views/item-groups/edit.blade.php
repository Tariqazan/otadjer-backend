@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('inventory::general.item_groups', 1)]))

@section('content')
    <div class="card">
        {!! Form::model($item_group, [
            'id' => 'item-group',
            'method' => 'PATCH',
            'route' => ['inventory.item-groups.update', $item_group->id],
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

                    {{ Form::multiSelectAddNewGroup('tax_ids', trans_choice('general.taxes', 1), 'percentage', $taxes, $item_group->items[0]->tax_ids, ['path' => route('modals.taxes.create'), 'field' => ['key' => 'id', 'value' => 'title']], 'col-md-6 el-select-tags-pl-38') }}

                    {{ Form::textareaGroup('description', trans('general.description')) }}

                    {{ Form::selectRemoteAddNewGroup('category_id', trans_choice('general.categories', 1), 'folder', $categories, $item_group->category_id, ['path' => route('modals.categories.create') . '?type=item', 'remote_action' => route('categories.index'). '?search=type:item']) }}

                    {{ Form::selectGroup('unit', trans('inventory::general.unit'), 'fas fa-box-open', $units, $item_group->items[0]->item->inventory()->value('unit')) }}

                    {{ Form::fileGroup('picture', trans_choice('general.pictures', 1), 'plus', ['dropzone-class' => 'form-file', 'options' => ['acceptedFiles' => 'image/*']]) }}

                    {{ Form::radioGroup('enabled', trans('general.enabled'), $item_group->enabled) }}

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
                                    <tr class="row mb-10" v-for="(variant_row, variant_index) in form.variants">
                                        @stack('actions_td_start')
                                            <td class="col-md-1">
                                                @stack('actions_button_start')
                                                    <button type="button"
                                                        @click="onDeleteVariant(variant_index)"
                                                        data-toggle="tooltip"
                                                        title="{{ trans('general.delete') }}"
                                                        class="btn btn-icon btn-outline-danger btn-lg">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                @stack('actions_button_end')
                                            </td>
                                        @stack('actions_td_end')

                                        @stack('name_td_start')
                                            <td class="col-md-3">
                                                @stack('name_input_start')
                                                    <akaunting-select
                                                        class="form-control-sm d-inline-block col-md-12"
                                                        :name="'items.' + variant_index + '.variant_id'"
                                                        :icon="'fas fa-align-justify'"
                                                        :data-field="'variants'"
                                                        :options="{{ json_encode($variants) }}"
                                                        :value="variant_row.variant_id"
                                                        @interface="variant_row.variant_id = $event"
                                                        @change="getVariantsValue($event, variant_index)"
                                                        :form-error="form.errors.get('items.' + variant_index + '.variant_id')"
                                                        :no-data-text="'{{ trans('general.no_data') }}'"
                                                        :no-matching-data-text="'{{ trans('general.no_matching_data') }}'"
                                                    ></akaunting-select>
                                                @stack('name_input_end')
                                            </td>
                                        @stack('name_td_end')

                                        @stack('value_td_start')
                                        <td class="col-md-8">
                                            @stack('value_input_start')
                                                <el-select
                                                :disabled="!selected_variants[variant_index].variant_values.length"
                                                v-model="form.variants[variant_index].variant_values"
                                                @change="onAddVariantValue($event, variant_index)"
                                                multiple
                                                @remove-tag="onDeleteVariantValue"
                                                placeholder="Select Value"
                                                >
                                                    <el-option
                                                        v-for="variant in selected_variants[variant_index].variant_values"
                                                        :disabled="form.variants[variant_index].variant_values.includes(variant.value)"
                                                        :key="variant.value"
                                                        :label="variant.label"
                                                        :value="variant.value">
                                                    </el-option>
                                                </el-select>
                                                @stack('value_input_end')
                                            <input name="fake" data-field="variants" type="hidden" v-model="variant_row.fake">
                                        </td>
                                        @stack('value_td_end')
                                    </tr>
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
                                        <div class="invalid-feedback d-block"
                                            v-if="form.errors.has('price_tab')"
                                            v-html="form.errors.get('price_tab')">
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#inventory" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                        <i class="mr-2"></i>{{ trans('inventory::general.name') }}
                                        <div class="invalid-feedback d-block"
                                            v-if="form.errors.has('inventory_tab')"
                                            v-html="form.errors.get('inventory_tab')">
                                        </div>
                                    </a>
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

            @permission('update-inventory-item-groups')
            <div class="card-footer">
                <div class="row save-buttons">
                    {{ Form::saveButtons('inventory.item-groups.index') }}
                </div>
            </div>
            @endpermission
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts_start')
    <script type="text/javascript">
        var select_variants = {!! json_encode($item_group->variants()->get()) !!};

        var items_group = {!! json_encode($items) !!};
    </script>

    <script src="{{ asset('modules/Inventory/Resources/assets/js/item_groups.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
