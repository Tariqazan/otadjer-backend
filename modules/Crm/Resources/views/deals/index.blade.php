@extends('layouts.admin')

@section('title', trans_choice('crm::general.deals', 2))

@section('new_button')
<button @click="onDeal('{{ trans('general.title.new', ['type' => trans_choice('crm::general.deals', 1)])}}')" class="btn btn-success btn-sm">{{ trans('general.add_new') }}</button>

<span>
    <a href="{{ route('import.create', ['group' => 'crm', 'type' => 'deals']) }}" class="btn btn-white btn-sm header-button-top">
        {{ trans('import.import') }}
    </a>
</span>

<span>
    <a href="{{ route('crm.deals.export', request()->input()) }}" class="btn btn-white btn-sm header-button-top">
        {{ trans('general.export') }}
    </a>
</span>
@endsection

@section('content')
    <div class="card deals">
        <div class="card-header with-border">
            {!! Form::open([
                'method' => 'GET',
                'route' => 'crm.deals.index',
                'id' => 'deal',
                '@submit.prevent' => 'onSubmit',
                '@keydown' => 'form.errors.clear($event.target.name)',
                'files' => true,
                'role' => 'form',
                'class' => 'form-loading-button',
                'novalidate' => true
            ]) !!}
            <div class="row">
               <div> {!! Form::select('pipeline', $pipelines_select, request('pipeline'), ['class' => 'form-control input-filter input-sm', 'onchange' => 'this.form.submit()']) !!} </div>
                <div>&nbsp;</div>
               <div>{!! Form::select('status', $status_select,  request('status'), ['class' => 'form-control input-filter input-sm', 'onchange' => 'this.form.submit()']) !!} </div>
            </div>
            {!! Form::close() !!}
        </div>

        <div class="card-body">
            <div class="container-fluid">
                <crm-deals
                    @edit="onEditDeal($event, 'TestDneme')"
                    :data="{{ json_encode($stages) }}"
                    :contact-text="'{{ trans_choice('crm::general.contacts', 1) }}'"
                    :company-text="'{{ trans_choice('crm::general.companies', 1) }}'"
                    :deals-text="'{{ trans_choice('crm::general.deals', 2) }}'"
                    :deal-show-text="'{{ trans('general.show') }}'"
                    :deal-edit-text="'{{ trans('general.edit') }}'"
                    :deal-delete-text="'{{ trans('general.delete') }}'"
                    :delete-text = "'{{ trans('general.title.delete', ['type' => trans_choice('crm::general.deals', 1)]) }}'" >
                </crm-deals>
            </div>
        </div>
    </div>
@endsection

@push('content_content_end')
    <component v-bind:is="deal_html"></component>
@endpush

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('modules/Crm/Resources/assets/css/crm.css?v=' .module_version('crm')) }}" type="text/css">
@endpush

@push('scripts_start')
    <script>
        var dealStatus = 'false';
        var ownerName = '';
    </script>
    <script src="{{ asset('modules/Crm/Resources/assets/js/deals.min.js?v=' .module_version('crm')) }}"></script>
@endpush
