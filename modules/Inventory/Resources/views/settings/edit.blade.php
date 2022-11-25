@extends('layouts.admin')

@section('title', trans_choice('general.settings', 2))

@section('content')
    {!! Form::open([
        'id' => 'setting',
        'method' => 'POST',
        'route' => 'inventory.settings.update',
        '@submit.prevent' => 'onSubmit',
        '@keydown' => 'form.errors.clear($event.target.name)',
        'files' => true,
        'role' => 'form',
        'class' => 'form-loading-button',
        'novalidate' => true
    ]) !!}
        <div class="row">
            <div class="accordion col-md-6">
                <div class="card">
                    <div class="card-header" data-toggle="collapse" data-target="#collapse-1" aria-expanded="1" aria-controls="collapse-1">
                        <h3 class="mb-0">{{ trans_choice('inventory::general.warehouses', 1) }}</h3>
                    </div>

                    <div id="collapse-1" class="collapse card-body">
                        <div class="row">
                            {{ Form::selectGroup('default_warehouse', trans('inventory::warehouses.default'), 'building', $warehouses, old('default_warehouse', setting('inventory.default_warehouse')), ['required' => 'required'], 'col-md-12') }}

                            {{ Form::radioGroup('negatif_stock', trans('inventory::general.negatif_stock'), old('negatif_stock', setting('inventory.negatif_stock'), false)) }}

                            {{ Form::radioGroup('track_inventory', trans('inventory::general.track_inventory'), old('track_inventory', setting('inventory.track_inventory'), false)) }}

                            {{ Form::radioGroup('reorder_level_notification', trans('inventory::items.reorder_level_notification'), old('reorder_level_notification', setting('inventory.reorder_level_notification'), false)) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion col-md-6">
                <div class="card">
                    <div class="card-header" data-toggle="collapse" data-target="#collapse-2" aria-expanded="1" aria-controls="collapse-1">
                        <h3 class="mb-0">{{ trans('inventory::general.barcode') }}</h3>
                    </div>

                    <div id="collapse-2" class="collapse card-body">
                        <div class="row">
                            {{ Form::selectGroup('barcode_type', trans('inventory::settings.barcode_type'), 'building', $barcode_type, old('barcode_type', setting('inventory.barcode_type')), ['required' => 'required', 'change' => 'exampleBarcode'], 'col-md-12') }}
                        </div>

                        <div class="row">
                            {!! Form::label('tesct', trans('inventory::settings.example'), ['class' => 'form-control-label col-md-2'])!!}
                            <div class="col-md-10" v-if="example_barcode == 'TYPE_CODE_128'">
                                <div class="col-md-10"><img src="modules/Inventory/Resources/assets/img/barcode/code_128.png" class="image-style"></div>
                                <div class="col-md-10 ml-3">brcd123456789</div>
                            </div>
                            <div class="col-md-10" v-else-if="example_barcode == 'TYPE_CODE_39'">
                                <div class="col-md-10"><img src="modules/Inventory/Resources/assets/img/barcode/code_39.png" class="image-style"></div>
                                <div class="col-md-10 ml-6">brcd123456789</div>
                            </div>
                            <div class="col-md-10" v-else-if="example_barcode == 'TYPE_EAN_13'">
                                <div class="col-md-10 ml-1"><img src="modules/Inventory/Resources/assets/img/barcode/ean_13.png" class="image-style"></div>
                                <div class="col-md-10">123456789012</div>
                            </div>

                            <div class="form-group col-md-12 mt-3">
                                {!! Form::label('print_template', trans('general.print') . ' ' . trans_choice('general.templates', 1), ['class' => 'form-control-label']) !!}

                                <div class="input-group">
                                    <button type="button" class="btn btn-block btn-outline-primary" @click="onTemplate">
                                        {{ trans('inventory::settings.choose_print_template') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion col-md-6">
                <div class="card">
                    <div class="card-header with-border" data-toggle="collapse" data-target="#collapse-3" aria-expanded="2" aria-controls="collapse-2">
                        <h3 class="mb-0">{{ trans_choice('inventory::general.transfer_orders', 1) }}</h3>
                    </div>

                    <div id="collapse-3" class="collapse card-body">
                        <div class="column">
                        {{ Form::textGroup('transfer_order_prefix', trans('inventory::settings.number.prefix'), 'font', ['required' => 'required'], old('transfer_order_prefix', setting('inventory.transfer_order_prefix')), 'col-md-12') }}

                        {{ Form::textGroup('transfer_order_digit', trans('inventory::settings.number.digit'), 'text-width', ['required' => 'required'], old('transfer_order_digit', setting('inventory.transfer_order_digit')), 'col-md-12') }}

                        {{ Form::textGroup('transfer_order_next', trans('inventory::settings.number.next'), 'chevron-right', ['required' => 'required'], old('transfer_order_next', setting('inventory.transfer_order_next')), 'col-md-12') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion col-md-6">
                <div class="card">
                    <div class="card-header with-border" data-toggle="collapse" data-target="#collapse-4" aria-expanded="3" aria-controls="collapse-3">
                        <h3 class="mb-0">{{ trans_choice('inventory::general.adjustments', 1) }}</h3>
                    </div>

                    <div id="collapse-4" class="collapse card-body">
                        <div class="column">
                        {{ Form::textGroup('adjustment_prefix', trans('inventory::settings.number.prefix'), 'font', ['required' => 'required'], old('adjustment_prefix', setting('inventory.adjustment_prefix')), 'col-md-12') }}

                        {{ Form::textGroup('adjustment_digit', trans('inventory::settings.number.digit'), 'text-width', ['required' => 'required'], old('adjustment_digit', setting('inventory.adjustment_digit')), 'col-md-12') }}

                        {{ Form::textGroup('adjustment_next', trans('inventory::settings.number.next'), 'chevron-right', ['required' => 'required'], old('adjustment_next', setting('inventory.adjustment_next')), 'col-md-12') }}
                        </div>
                    </div>
                </div>
            </div>

            @include('inventory::settings.reason')

            @include('inventory::settings.unit')
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-footer">
                        <div class="row float-right">
                            {{ Form::saveButtons('inventory.settings.edit') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection

@push('content_content_end')
    <akaunting-modal
        :show="template.modal"
        @cancel="template.modal = false"
        :title="'{{ trans('inventory::settings.choose_print_template') }}'"
        :message="template.html"
        :button_cancel="'{{ trans('general.button.save') }}'"
        :button_delete="'{{ trans('general.button.cancel') }}'">
        <template #modal-body>
            @include('inventory::modals.barcode_template')
        </template>

        <template #card-footer>
            <div class="float-right">
                <button type="button" class="btn btn-outline-secondary" @click="closeTemplate">
                    {{ trans('general.cancel') }}
                </button>

                <button :disabled="form.loading"  type="button" class="btn btn-success button-submit" @click="addTemplate">
                    <span v-if="form.loading" class="btn-inner--icon"><i class="aka-loader"></i></span>
                    <span :class="[{'ml-0': form.loading}]" class="btn-inner--text">{{ trans('general.confirm') }}</span>
                </button>
            </div>
        </template>
    </akaunting-modal>
@endpush

@push('scripts_start')
    <script type="text/javascript">
        var unit_items = {!! json_encode($items) !!};
        var reason_items = {!! json_encode($reasons) !!};
    </script>

    <script src="{{ asset('modules/Inventory/Resources/assets/js/settings.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
