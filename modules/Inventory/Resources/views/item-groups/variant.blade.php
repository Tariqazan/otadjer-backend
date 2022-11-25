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
                    :value="'{{ old('variant_id') }}'"
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
        @stack('value_input_end')

        <input name="fake" data-field="variants" type="hidden" v-model="variant_row.fake">
    </td>
    @stack('value_td_end')
</tr>
