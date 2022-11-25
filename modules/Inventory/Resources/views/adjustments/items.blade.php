<tr class="row" v-for="(row, index) in form.items" :index="index">
    <td class="col-md-1">
        <button type="button"
            @click="onDeleteItem(index)"
            data-toggle="tooltip"
            title="{{ trans('general.delete') }}"
            class="btn btn-icon btn-outline-danger btn-lg"><i class="fa fa-trash"></i>
        </button>
    </td>
    <td class="col-md-3">
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
        disabled
        class="form-control"
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
        data-item="adjusted_quantity"
        required="required"
        name="items.' + index + '.adjusted_quantity'"
        v-model="row.adjusted_quantity"
        @input="onChangeNewQuantity(index)"
        type="text"
        autocomplete="off">
        <div class="invalid-feedback d-block" v-if="adjusment_button"
            v-if="form.errors.has('items.' + index + '.adjusted_quantity')"
            v-html="form.errors.get('items.' + index + '.adjusted_quantity')">
        </div>
    </td>
    <td class="col-md-2">
        <input value=""
        disabled
        class="form-control"
        data-item="new_quantity"
        required="required"
        name="items[][new_quantity]"
        v-model="row.new_quantity"
        type="text"
        autocomplete="off">
    </td>
</tr>
