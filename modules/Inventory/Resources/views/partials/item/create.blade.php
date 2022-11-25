<div id="track_inventories" class="row col-md-12">
    @stack('track_inventory_input_start')
        <div id="item-track-inventory" class="form-group col-md-12 margin-top">
            <div class="custom-control custom-checkbox">
                {{ Form::checkbox('track_inventory', '1', setting('inventory.track_inventory'), [
                    'v-model' => 'form.track_inventory',
                    'id' => 'track_inventory',
                    'class' => 'custom-control-input',
                ]) }}

                <label class="custom-control-label" for="track_inventory">
                    <strong>{{ trans('inventory::items.track_inventory')}}</strong>
                </label>
            </div>
        </div>

    <div v-if="form.track_inventory.length" class="row col-md-12">

    @stack('track_inventory_input_end')
        <div class="table-responsive">
            <table class="table table-bordered" id="items">
                <thead class="thead-light">
                    <tr class="row">
                        <th class="col-md-2">{{ trans('general.actions') }}</th>
                        <th class="col-md-10">{{ trans('general.name') }}</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="row" v-for="(row, index) in form.items" :index="index">
                        <td class="col-md-2">
                            <button type="button"
                                @click="onDeleteItem(index)"
                                data-toggle="tooltip"
                                title="{{ trans('general.delete') }}"
                                class="btn btn-icon btn-outline-danger btn-lg"><i class="fa fa-trash"></i>
                            </button>

                        </td>
                        <td class="col-md-10">

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

@push('scripts')
    <script src="{{ asset('modules/Inventory/Resources/assets/js/items.min.js?v=' . module_version('inventory')) }}"></script>
@endpush

