<el-popover
    popper-class="p-0 h-0"
    placement="right"
    width="300"
    v-if="this.item_default_warehouse[row.item_id] != undefined"
    trigger="click">
    <div class="card">
        <div class="card-body">
            {{-- <div class="row align-items-center mb-2">
                <div class="col-md-12">
                    {{ trans('inventory::general.document.detail', ['type' => Str::lower(trans_choice($document_type_name, 2))]) }}
                </div>
            </div> --}}
            <div class="row align-items-center" v-if="row.item_id == 0">
                @include('inventory::partials.create')
            </div>
            <div class="row align-items-center" v-if="row.item_id != 0">
                @include('inventory::partials.warehouse')
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-link btn-sm p-0 ml-2 mr-2" slot="reference" v-if="row.item_id == 0">
        {{ trans('inventory::general.add_warehouse') }}
    </button>
    <button type="button" class="btn btn-link btn-sm p-0 ml-2 mr-2" slot="reference" v-if="row.item_id != 0">
        {{ trans('inventory::general.edit_warehouse') }}
    </button>
</el-popover>
