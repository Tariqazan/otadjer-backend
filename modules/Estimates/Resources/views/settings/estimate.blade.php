@extends('layouts.admin')

@section('title', trans_choice('estimates::general.estimates', 1))

@section('content')
    {!! Form::open([
        'id' => 'setting',
        'method' => 'PATCH',
        'route' => 'settings.update',
        '@submit.prevent' => 'onSubmit',
        '@keydown' => 'form.errors.clear($event.target.name)',
        'files' => true,
        'role' => 'form',
        'class' => 'form-loading-button',
        'novalidate' => true,
    ]) !!}

        <div class="card">
            <div class="card-body">
                <div class="row">
                    {{ Form::textGroup('name', trans('general.name'), 'font', ['required' => 'required'], setting('estimates.estimate.name')) }}

                    {{ Form::textGroup('number_prefix', trans('settings.invoice.prefix'), 'font', [], setting('estimates.estimate.number_prefix')) }}

                    {{ Form::textGroup('number_digit', trans('settings.invoice.digit'), 'text-width', [], setting('estimates.estimate.number_digit')) }}

                    {{ Form::textGroup('number_next', trans('settings.invoice.next'), 'chevron-right', [], setting('estimates.estimate.number_next')) }}

                    {{ Form::selectGroup('approval_terms', trans('estimates::settings.estimate.approval_terms'), 'calendar', $payment_terms, setting('estimates.estimate.approval_terms'), []) }}

                    {{ Form::textGroup('title', trans('settings.invoice.title'), 'font', [], setting('estimates.estimate.title')) }}

                    {{ Form::textGroup('subheading', trans('settings.invoice.subheading'), 'font', [], setting('estimates.estimate.subheading')) }}

                    {{ Form::textareaGroup('notes', trans_choice('general.notes', 2), 'sticky-note-o', setting('estimates.estimate.notes'), ['rows' => 3], 'col-md-6') }}

                    {{ Form::textareaGroup('footer', trans('general.footer'), 'sticky-note-o', setting('estimates.estimate.footer'), ['rows' => 3], 'col-md-6') }}

                    {{ Form::invoice_text('item_name', trans('settings.invoice.item_name'), 'font', $item_names, setting('estimates.estimate.item_name'), [], 'item_name_input', setting('estimates.estimate.item_name_input')) }}

                    {{ Form::radioGroup('hide_item_name', trans('settings.invoice.hide.item_name'), setting('estimates.estimate.hide_item_name')) }}

                    {{ Form::invoice_text('price_name', trans('settings.invoice.price_name'), 'font', $price_names, setting('estimates.estimate.price_name'), [], 'price_name_input', setting('estimates.estimate.price_name_input')) }}

                    {{ Form::radioGroup('hide_price', trans('settings.invoice.hide.price'), setting('estimates.estimate.hide_price')) }}

                    {{ Form::invoice_text('quantity_name', trans('settings.invoice.quantity_name'), 'font', $quantity_names, setting('estimates.estimate.quantity_name'), [], 'quantity_name_input', setting('estimates.estimate.quantity_name_input')) }}

                    {{ Form::radioGroup('hide_quantity', trans('settings.invoice.hide.quantity'), setting('estimates.estimate.hide_quantity')) }}

                    {{ Form::radioGroup('hide_item_description', trans('settings.invoice.hide.item_description'), setting('estimates.estimate.hide_item_description')) }}

                    {{ Form::radioGroup('hide_amount', trans('settings.invoice.hide.amount'), setting('estimates.estimate.hide_amount')) }}

                    <div class="form-group col-md-6">
                        {!! Form::label('invoice_template', trans_choice('general.templates', 1), ['class' => 'form-control-label']) !!}

                        <div class="input-group">
                            <button type="button" class="btn btn-block btn-outline-primary" @click="onTemplate">
                                {{ trans('estimates::settings.estimate.choose_template') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @can('update-settings-settings')
                <div class="card-footer">
                    <div class="row save-buttons">
                        {{ Form::saveButtons('settings.index') }}
                    </div>
                </div>
            @endcan
        </div>

        {!! Form::hidden('_prefix', 'estimates.estimate') !!}

    {!! Form::close() !!}
@endsection

@push('content_content_end')
    <akaunting-modal
        :show="template.modal"
        @cancel="template.modal = false"
        :title="'{{ trans('estimates::settings.estimate.choose_template') }}'"
        :message="template.html"
        :button_cancel="'{{ trans('general.button.save') }}'"
        :button_delete="'{{ trans('general.button.cancel') }}'">
        <template #modal-body>
            @include('estimates::modals.settings.estimate_template')
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
    <script src="{{ asset('public/js/settings/settings.js?v=' . version('short')) }}"></script>
@endpush
