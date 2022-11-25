@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('composite-items::general.composite_items', 1)]))

@section('content')
        {!! Form::model($composite_item, [
            'id' => 'composite-item',
            'method' => 'PATCH',
            'route' => ['composite-items.composite-items.update', $composite_item->id],
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
                        {{ Form::textGroup('name', trans('general.name'), 'tag', [], $composite_item->item->name) }}

                        {{ Form::multiSelectAddNewGroup('tax_ids', trans_choice('general.taxes', 1), 'percentage', $taxes, $composite_item->item->tax_ids, ['path' => route('modals.taxes.create'), 'field' => ['key' => 'id', 'value' => 'title']], 'col-md-6 el-select-tags-pl-38') }}

                        {{ Form::textareaGroup('description', trans('general.description'), '', $composite_item->item->description) }}

                        {{ Form::textGroup('sale_price', trans('items.sales_price'), 'money-bill-wave', [], $composite_item->item->sale_price) }}

                        {{ Form::textGroup('purchase_price', trans('items.purchase_price'), 'money-bill-wave-alt', [], $composite_item->item->purchase_price) }}

                        {{ Form::selectRemoteAddNewGroup('category_id', trans_choice('general.categories', 1), 'folder', $categories, $composite_item->item->category_id, ['path' => route('modals.categories.create') . '?type=item', 'remote_action' => route('categories.index'). '?search=type:item']) }}

                        {{ Form::fileGroup('picture', trans_choice('general.pictures', 1), '', ['dropzone-class' => 'form-file'], $composite_item->item->picture) }}

                        {{ Form::radioGroup('enabled', trans('general.enabled'), $composite_item->item->enabled) }}

                        @if ($inventory == true)
                            <div id="track_inventories" class="row col-md-12">
                                <div id="item-track-inventory" class="form-group col-md-12 margin-top">
                                    <div class="custom-control custom-checkbox">
                                        {{ Form::checkbox('track_inventory', true, $composite_item->track_inventory, [
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
                        {{ Form::selectGroup('unit', trans('inventory::general.unit'), 'fas fa-box-open', $units ?? [], $composite_item->unit, ['required' => 'required']) }}
    
                        {{ Form::textGroup('sku', trans('inventory::general.sku'), 'fa fa-key', ['required' => 'required']) }}
    
                        {{ Form::textGroup('barcode', trans('inventory::general.barcode'), 'barcode', []) }}
    
                        <div class="row col-md-12">
                            <div class="form-group col-md-12 margin-top">
                                <div class="custom-control custom-checkbox">
                                    {{ Form::checkbox('returnable', true, $composite_item->returnable, [
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
            </div>
   
            @can('update-common-items')
                <div class="card">
                    <div class="card-footer">
                        <div class="row save-buttons">
                            {{ Form::saveButtons('composite-items.composite-items.index') }}
                        </div>
                    </div>
                </div>
            @endcan

        {!! Form::close() !!}
@endsection

@push('scripts_start')
    <script type="text/javascript">
        var composite_items = {!! json_encode($composite_items) !!};
    </script>

    <script src="{{ asset('modules/CompositeItems/Resources/assets/js/composite-items.min.js?v=' . module_version('composite-items')) }}"></script>
@endpush
