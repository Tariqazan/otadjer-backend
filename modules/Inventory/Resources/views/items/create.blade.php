@extends('layouts.admin')

@section('title', trans('general.title.new', ['type' => trans_choice('general.items', 1)]))

@section('content')
<style>
    /* 
	get rid of the fieldset styling and keep 
	this all on a single line 
*/
    .radio-switch {
        border: none;
        padding: 0;
        white-space: nowrap;
    }

    /*
	radio button groups often benefit from a legend to
	provide context as to what the different
	options pertain to. Ideally this would be visible to all
	users, but you know...
*/
    .radio-switch legend {
        font-size: 2px;
        opacity: 0;
        position: absolute;
    }

    /*
	relative labels to help position the pseudo elements
	the z-index will be handy later, when the labels that
	overlap the visual switch UI need to be adjusted
	to allow for a user to toggle the switch without
	having to move their mouse/finger to the different
	sides of the UI
*/
    .radio-switch label {
        display: inline-block;
        line-height: 2;
        position: relative;
        z-index: 2;
    }

    /*
	inputs set to opcacity 0 are still accessible.
	Apparently there can be issues targetting inputs with
	Dragon speech recognition software if you use the typical
	'visually-hidden' class...so might as well just avoid that issue...
*/
    .radio-switch input {
        opacity: 0;
        position: absolute;
    }

    /*
	a 2 option toggle can only have 2 options...so instead of
	adding more classes, i'm just going to use some
	structural pseudo-classes to target them...
	cause why let all that good work go to waste?!

  the large padding is used to position the labels
  on top of the visual UI, so the switch UI itself
  can be mouse clicked or finger tapped to toggle
  the current option
*/
    .radio-switch label:first-of-type {
        padding-right: 5em;
    }

    .radio-switch label:last-child {
        margin-left: -4.25em;
        padding-left: 5em;
    }

    /*
	oh focus within, I can't wait for you to have even more support.
	But you'll never be in IE11, so we're going to need a
	polyfill for you for a bit...
 */
    .radio-switch:focus-within label:first-of-type:after {
        box-shadow: 0 0 0 2px #fff, 0 0 0 4px #2196f3;
    }

    /* polyfill class*/
    .radio-switch.focus-within label:first-of-type:after {
        box-shadow: 0 0 0 2px #fff, 0 0 0 4px #2196f3;
    }

    /* making the switch UI.  */
    .radio-switch label:first-of-type:before,
    .radio-switch label:first-of-type:after {
        border: 1px solid #aaa;
        content: "";
        height: 2em;
        overflow: hidden;
        pointer-events: none;
        position: absolute;
        vertical-align: middle;
    }

    .radio-switch label:first-of-type:before {
        background: #fff;
        border: 1px solid #aaa;
        border-radius: 100%;
        position: absolute;
        right: -.075em;
        transform: translateX(0em);
        transition: transform .2s ease-in-out;
        width: 2em;
        z-index: 2;
    }

    .radio-switch label:first-of-type:after {
        background: #222;
        border-radius: 1em;
        margin: 0 1em;
        transition: background .2s ease-in-out;
        width: 4em;
    }

    .radio-switch input:first-of-type:checked~label:first-of-type:after {
        background: #2196f3;
    }

    .radio-switch input:first-of-type:checked~label:first-of-type:before {
        transform: translateX(-2em);
    }

    .radio-switch input:last-of-type:checked~label:last-of-type {
        z-index: 1;
    }

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
<h3>Serialized</h3>
<fieldset class="radio-switch">
    <legend>
        Settings
    </legend>
    <input type="radio" name="lol" id="public">
    <label for="public">
        On
    </label>

    <input type="radio" name="lol" id="private">
    <label for="private">
        Off
    </label>
</fieldset>
    <div class="card">
        {!! Form::open([
            'route' => 'inventory.items.store',
            'id' => 'item',
            '@submit.prevent' => 'onSubmit',
            '@keydown' => 'form.errors.clear($event.target.name)',
            'files' => true,
            'role' => 'form',
            'class' => 'form-loading-button',
            'novalidate' => true
        ]) !!}

            <div class="card-body">
                <div class="row">
                    {{ Form::textGroup('name', trans('general.name'), 'tag') }}

                    {{ Form::selectRemoteAddNewGroup('category_id', trans_choice('general.categories', 1), 'folder', $categories, null, ['path' => route('modals.categories.create') . '?type=item', 'remote_action' => route('categories.index'). '?search=type:item']) }}

                    {{ Form::multiSelectAddNewGroup('tax_ids', trans_choice('general.taxes', 1), 'percentage', $taxes, (setting('default.tax')) ? [setting('default.tax')] : null, ['path' => route('modals.taxes.create'), 'field' => ['key' => 'id', 'value' => 'title']], 'col-md-6 el-select-tags-pl-38') }}

                    {{ Form::textareaGroup('description', trans('general.description')) }}

                    {{ Form::textGroup('sale_price', trans('items.sales_price'), 'money-bill-wave', ['required' => 'required', 'show' => 'form.add_variants == false']) }}
 <?php 

                                 $role_id = \DB::table('user_roles')->where("user_id",auth()->id())->first();
                                 
                                 $status = true;
                                 //if($role_id->role_id == 2){
                                    $data = \DB::table('role_permissions')
                                        ->where("role_id",$role_id->role_id)
                                        ->where("permission_id",279)
                                        ->first();
                                   
                                    if($data == null  ){
                                        $status = false;
                                    }
                                 //}
                                 if($status){
                                 ?>
                    {{ Form::textGroup('purchase_price', trans('items.purchase_price'), 'money-bill-wave-alt', ['required' => 'required', 'show' => 'form.add_variants == false']) }}
                <?php } else{?>
                    <input type='hidden' name='purchase_price' value="0" >
                <?php } ?>
                    {{ Form::selectGroup('unit', trans('inventory::general.unit'), 'fas fa-box-open', $units, old('default_unit', setting('inventory.default_unit')), ['required' => 'required', 'show' => 'form.track_inventory == true']) }}

                    {{ Form::textGroup('sku', trans('inventory::general.sku'), 'fa fa-key', ['required' => 'required', 'show' => 'form.track_inventory == true && form.add_variants == false'], !empty($inventory_item->sku) ? $inventory_item->sku : '', 'col-md-6') }}

                    {{ Form::textGroup('barcode', trans('inventory::general.barcode'), 'barcode', ['show' => 'form.track_inventory == true && form.add_variants == false']) }}

                    {{ Form::fileGroup('picture', trans_choice('general.pictures', 1), 'plus', ['dropzone-class' => 'form-file', 'options' => ['acceptedFiles' => 'image/*']]) }}

                    {{ Form::radioGroup('enabled', trans('general.enabled'), true) }}

                    <div class="row col-md-12">
                        <div class="form-group col-md-12 margin-top">
                            <div class="custom-control custom-checkbox">
                                {{ Form::checkbox('returnable', '1', null, [
                                    'class' => 'custom-control-input',
                                    'id' => 'returnable',
                                    '@input' => 'onCanReturnable($event)'
                                 ]) }}

                                <label class="custom-control-label" for="returnable">
                                    <strong>{{ trans('inventory::general.returnable') }}</strong>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="track_inventories" class="row col-md-12">
                        @stack('track_inventory_input_start')
                            <div id="item-track-inventory" class="form-group col-md-12 margin-top">
                                <div class="custom-control custom-checkbox">
                                    {{ Form::checkbox('track_inventory', true, setting('inventory.track_inventory'), [
                                        'v-model' => 'form.track_inventory',
                                        'id' => 'track_inventory',
                                        'class' => 'custom-control-input',
                                        '@input' => 'onCanTrack($event)'
                                    ]) }}

                                    <label class="custom-control-label" for="track_inventory">
                                        <strong>{{ trans('inventory::items.track_inventory')}}</strong>
                                    </label>
                                </div>
                            </div>
                        @stack('track_inventory_input_end')
                    </div>

                    <div id="add-variants" class="form-group col-md-12 margin-top" v-if="form.track_inventory == true">
                        <div class="custom-control custom-checkbox">
                            {{ Form::checkbox('add_variants', '1', null, [
                                'v-model' => 'form.add_variants',
                                'id' => 'add_variants',
                                'class' => 'custom-control-input',
                                '@input' => 'onCanVariants($event)'
                            ]) }}

                            <label class="custom-control-label" for="add_variants">
                                <strong>{{ trans('inventory::items.add_variants') }}</strong>
                            </label>
                        </div>
                    </div>

                    <div v-if="form.track_inventory == true" class="col-md-12">
                        <div v-if="form.add_variants == false">
                            @include('inventory::items.item')
                        </div>

                        <div v-if="form.add_variants == true">
                            @include('inventory::items.group')
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row save-buttons">
                    {{ Form::saveButtons('inventory.items.index') }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
    <div class="container my-5">
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')">Ware House(43)</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Head Office(12)</button>
    </div>

    <div id="London" class="tabcontent">
        <h3>Ware House</h3>
        <p>Office.</p>
    </div>

    <div id="Paris" class="tabcontent">
        <h3>Head</h3>
        <p>Office.</p>
    </div>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    <div class="row my-3">
        <div class="col-2 mx-0">
            <label for="floatingInput">Filter Serial No</label>
        </div>
        <div class="col-4">
            <input type="email" class="form-control" id="floatingInput" placeholder="Serial...">
        </div>
        <div class="col-3"></div>
        <div class="col-3"></div>
    </div>
    <table class="table mt-2">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Serial no</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>ADASD6555</td>
                <td>Today</td>
                <td><button class="btn btn-sm btn-secondary">Edit</button></td>
            </tr>
        </tbody>
    </table>
    <form method="post" action="{{route('inventory.add.serial_no')}}">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-6">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input type="text" name="serial_no" class="form-control mb-2" id="inlineFormInput" placeholder="Add serial no">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-outline-secondary mb-2">Add Serial</button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts_start')
    <script type="text/javascript">
        var barcode_type = '{{ setting('inventory.barcode_type') }}'
    </script>
    <script src="{{ asset('modules/Inventory/Resources/assets/js/items.min.js?v=' . module_version('inventory')) }}"></script>
@endpush
