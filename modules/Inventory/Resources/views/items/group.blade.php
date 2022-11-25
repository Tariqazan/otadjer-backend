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
                    <td class="col-md-1">
                        <button type="button"
                            @click="onDeleteVariant(variant_index)"
                            data-toggle="tooltip"
                            title="{{ trans('general.delete') }}"
                            class="btn btn-icon btn-outline-danger btn-lg">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>

                    <td class="col-md-3">
                        <akaunting-select
                            class="form-control-sm d-inline-block col-md-12"
                            :name="'group_items.' + variant_index + '.variant_id'"
                            :icon="'fas fa-align-justify'"
                            :data-field="'variants'"
                            :options="{{ json_encode($variants) }}"
                            :value="'{{ old('variant_id') }}'"
                            @interface="variant_row.variant_id = $event"
                            @change="getVariantsValue($event, variant_index)"
                            :form-error="form.errors.get('group_items.' + variant_index + '.variant_id')"
                            :no-data-text="'{{ trans('general.no_data') }}'"
                            :no-matching-data-text="'{{ trans('general.no_matching_data') }}'"
                        ></akaunting-select>
                    </td>

                    <td class="col-md-8">
                        <el-select
                            class="form-control-sm d-inline-block col-md-12 h-100"
                            :disabled="!selected_variants[variant_index].variant_values.length"
                            v-model="form.variants[variant_index].variant_values"
                            @change="onAddVariantValue($event, variant_index)"
                            multiple
                            filterable
                            select-all
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
                            {{-- <ul class="m-0 p-0">
                                <li class="el-select-dropdown__item el-select__footer text-center pt-1">
                                    <div @click="eventAll(variant_index)">
                                        <i class="fas fa-plus"></i>
                                        <span>
                                            Example All
                                        </span>
                                    </div>
                                </li>
                            </ul> --}}
                        </el-select>

                        <input name="fake" data-field="variants" type="hidden" v-model="variant_row.fake">
                    </td>
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
            @include('inventory::items.group_price')
        </div>

        <div class="tab-pane" id="inventory">
            @include('inventory::items.group_inventory')
        </div>
    </div>
