<div class="modal-body pb-0">
    {!! Form::open([
            'route' => 'inventory.modals.barcode-templates.update',
            'method' => 'PATCH',
            'id' => 'template',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'barcode_form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button mb-0',
            'novalidate' => true
    ]) !!}
        <div class="row mb-4">
            <div class="col-md-4 text-center">
                <div class="bg-print border-radius-default print-edge choose" @click="barcode_form.barcode_print_template='single'">
                    <img src="{{ asset('modules/Inventory/Resources/assets/img/barcode/print_templates/single.png') }}" class="mb-1 mt-3" height="200" alt="Single"/>
                    <label>
                        <input type="radio" name="barcode_print_template" value="single" v-model="barcode_form.barcode_print_template">
                        {{ trans('inventory::settings.single') }}
                    </label>
                </div>
            </div>

            <div class="col-md-4 text-center px-2">
                <div class="bg-print border-radius-default print-edge choose" @click="barcode_form.barcode_print_template='double'">
                    <img src="{{ asset('modules/Inventory/Resources/assets/img/barcode/print_templates/double.png') }}" class="mb-1 mt-3" height="200" alt="Double"/>
                    <label>
                        <input type="radio" name="barcode_print_template" value="double" v-model="barcode_form.barcode_print_template">
                        {{ trans('inventory::settings.double') }}
                    </label>
                </div>
            </div>

            <div class="col-md-4 text-center px-0">
                <div class="bg-print border-radius-default print-edge choose" @click="barcode_form.barcode_print_template='triple'">
                    <img src="{{ asset('modules/Inventory/Resources/assets/img/barcode/print_templates/triple.png') }}" class="mb-1 mt-3" height="200" alt="Triple"/>
                    <label>
                        <input type="radio" name="barcode_print_template" value="triple" v-model="barcode_form.barcode_print_template">
                        {{ trans('inventory::settings.triple') }}
                    </label>
                </div>
            </div>
        </div>

        {!! Form::hidden('_template', setting('inventory.barcode_print_template')) !!}
    {!! Form::close() !!}
</div>
