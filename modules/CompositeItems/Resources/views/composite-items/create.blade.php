@extends('layouts.admin')

@section('title', trans('general.title.new', ['type' => trans_choice('composite-items::general.composite_items', 1)]))

@section('content')
    {!! Form::open([
        'route' => 'composite-items.composite-items.store',
        'id' => 'composite-item',
        '@submit.prevent' => 'onSubmit',
        '@keydown' => 'form.errors.clear($event.target.name)',
        'files' => true,
        'role' => 'form',
        'class' => 'form-loading-button',
        'novalidate' => true
    ]) !!}

        <div class="card">
            <div class="card-body">
                <div class="row">
                    {{ Form::textGroup('name', trans('general.name'), 'tag') }}

                    {{ Form::multiSelectAddNewGroup('tax_ids', trans_choice('general.taxes', 1), 'percentage', $taxes, (setting('default.tax')) ? [setting('default.tax')] : null, ['path' => route('modals.taxes.create'), 'field' => ['key' => 'id', 'value' => 'title']], 'col-md-6 el-select-tags-pl-38') }}

                    {{ Form::textareaGroup('description', trans('general.description')) }}

                    {{ Form::textGroup('sale_price', trans('items.sales_price'), 'money-bill-wave') }}

                    {{ Form::textGroup('purchase_price', trans('items.purchase_price'), 'money-bill-wave-alt') }}

                    {{ Form::selectRemoteAddNewGroup('category_id', trans_choice('general.categories', 1), 'folder', $categories, null, ['path' => route('modals.categories.create') . '?type=item', 'remote_action' => route('categories.index'). '?search=type:item']) }}

                    {{ Form::fileGroup('picture', trans_choice('general.pictures', 1), 'plus', ['dropzone-class' => 'form-file']) }}

                    {{ Form::radioGroup('enabled', trans('general.enabled'), true) }}

                    @if ($inventory == true)
                        <div id="track_inventories" class="row col-md-12">
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
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="card" v-if="form.track_inventory == true">
            <div class="card-body">
                <div class="row">
                    {{ Form::selectGroup('unit', trans('inventory::general.unit'), 'fas fa-box-open', $units ?? [], old('default_unit', setting('inventory.default_unit')), ['required' => 'required']) }}

                    {{ Form::textGroup('sku', trans('inventory::general.sku'), 'fa fa-key', ['required' => 'required'], '', 'col-md-6') }}

                    {{ Form::textGroup('barcode', trans('inventory::general.barcode'), 'barcode', []) }}

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
                </div>
            </div>
        </div>

        <div class="card">
            <div v-if="form.track_inventory == true">
                @include('composite-items::partials.inventory-item')
            </div>

            <div v-else>
                @include('composite-items::partials.item')
            </div>
            {{-- @if($inventory == true)
                @include('composite-items::partials.inventory-item')
            @else
                @include('composite-items::partials.item')
            @endif --}}
        </div>

        <div class="card">
            <div class="card-footer">
                <div class="row save-buttons">
                    {{ Form::saveButtons('composite-items.composite-items.index') }}
                </div>
            </div>
        </div>

    {!! Form::close() !!}
@endsection

@push('scripts_start')
    <script src="{{ asset('modules/CompositeItems/Resources/assets/js/composite-items.min.js?v=' . module_version('composite-items')) }}"></script>
@endpush
