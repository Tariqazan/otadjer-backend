@extends('layouts.admin')

@section('title', $company->contact->name)

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header with-border">
                <h3 class="mb-0">{{ trans('auth.profile') }}</h3>
            </div>

            <div class="card-header border-bottom-0 show-transaction-card-header">
                <img class="text-sm font-weight-600" src="{{ $company->picture ? Storage::url($company->picture->id) : asset('public/img/otadjer-logo-black.svg') }}" class="img-thumbnail" height="150" width="150" alt="{{ $company->contact->name }}">
            </div>

            <div class="card-header border-bottom-0 show-transaction-card-header">
                <b class="text-sm font-weight-600">{{ trans('general.email') }}</b>
                <a class="float-right text-xs">{{ $company->contact->email }}</a>
            </div>

            <div class="card-header border-bottom-0 show-transaction-card-header">
                <b class="text-sm font-weight-600">{{ trans('general.phone') }}</b>
                <a class="float-right text-xs">{{ $company->contact->phone }}</a>
            </div>

            <div class="card-header border-bottom-0 show-transaction-card-header">
                <b class="text-sm font-weight-600">{{ trans('crm::general.mobile') }}</b>
                <a class="float-right text-xs">{{ $company->mobile }}</a>
            </div>

            <div class="card-header border-bottom-0 show-transaction-card-header">
                <b class="text-sm font-weight-600">{{ trans('general.website') }}</b>
                <a class="float-right text-xs">{{ $company->contact->website }}</a>
            </div>

            <div class="card-header border-bottom-0 show-transaction-card-header">
                <b class="text-sm font-weight-600">{{ trans('crm::general.fax_number') }}</b>
                <a class="float-right text-xs">{{ $company->fax_number }}</a>
            </div>

            <input type="hidden" id="contact_id" name="contact_id" value="{{ $company->id }}">
        </div>

        @permission('update-crm-companies')
        <a href="{{ Route('crm.companies.edit', $company->id) }}" class="btn btn-primary btn-block">
            <b>{{ trans('general.edit') }}</b>
        </a>
        @endpermission

        <br>

        <div class="app">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="mb-0">{{ trans_choice('general.contacts', 2) }}</h3>
                </div>
                @foreach($company->companyContact()->get() as  $companyContact)
                    @foreach($companyContact->contact()->get() as $contact)
                    <div class="card-header border-bottom-0 show-transaction-card-header">
                        <b class="text-sm font-weight-600 float-left">{{ $contact->name }}</b>
                        <div class="dropdown float-right">
                            <a class="btn btn-neutral btn-sm text-light items-align-center p-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-h text-muted"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                                {!! Form::deleteLink($companyContact, company_id() . '/crm/modals/company/' . $company->id . '/contact', 'crm::general.contacts') !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>

            @permission('create-crm-companies')
            <button type="button" @click="onContact({{ $company->id }}, '{{ trans_choice('crm::general.contact', 1)}}')" id="add-contact" class="btn btn-primary btn-block"> {{ trans('crm::general.add_contact') }}</button>
            @endpermission
        </div>
    </div>

    <div class="col-md-9">
        <div class="row">
            <div class="col-sm-12">
                <div class="nav-wrapper pt-0">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item" @click="onNote">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#note" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                                <i class= mr-2"></i>{{ trans_choice('general.notes', 1) }}
                            </a>
                        </li>

                        <li class="nav-item" @click="onEmail">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#email" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                <i class="mr-2"></i>{{ trans('general.email') }}
                            </a>
                        </li>

                        <li class="nav-item" @click="onLog">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#log" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">
                                <i class="mr-2"></i>{{ trans('crm::general.log_activity') }}
                            </a>
                        </li>

                        <li class="nav-item" @click="onSchedule">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab" href="#schedule" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">
                                <i class="mr-2"></i>{{ trans_choice('crm::general.schedule', 1) }}
                            </a>
                        </li>

                        <li class="nav-item" @click="onTask">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-5-tab" data-toggle="tab" href="#task" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">
                                <i class="mr-2"></i>{{ trans('crm::general.task') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="card-shadow">
                            <div class="tab-content">
                                <form id="company" method="POST" action="#"> </form>

                                <div class="tab-pane tab active" id="note">
                                    {!! Form::open([
                                        'id' => 'form-note',
                                        'route' => ['crm.modals.notes.store', 'companies', $company->id],
                                        '@submit.prevent' => 'onNoteSubmit',
                                        'role' => 'form',
                                        'class' => 'form-loading-button',
                                        'novalidate' => true
                                    ]) !!}

                                    {{ Form::textareaGroup('message', trans_choice('general.notes', 1)) }}

                                    @permission('create-crm-companies')
                                    <div class="form-group col-md-6">
                                        <button type="submit" id="add-notes" class="btn btn-primary btn-primary">
                                            {{ trans('general.add', ['type' => trans_choice('general.notes', 1)]) }}
                                        </button>
                                    </div>
                                    @endpermission

                                    {!! Form::close() !!}
                                </div>

                                <div class="tab-pane fade" id="email">
                                    {!! Form::open([
                                        'id' => 'form-email',
                                        'route' => ['crm.modals.emails.store', 'companies', $company->id],
                                        '@submit.prevent' => 'onEmailSubmit',
                                        'role' => 'form',
                                        'class' => 'form-loading-button',
                                        'novalidate' => true
                                    ]) !!}

                                    <div class="row">
                                        {{ Form::emailGroup('from', trans('general.from'), 'envelope', ['disabled' => 'true'], $user->email, 'col-md-6 disabled') }}

                                        {{ Form::emailGroup('to', trans('general.to'), 'envelope-open', ['required' => 'required'], $company->contact->email) }}

                                        {{ Form::textGroup('subject', trans('crm::general.subject'), 'font') }}

                                        {{ Form::textareaGroup('body', trans('crm::general.body')) }}
                                    </div>

                                    @permission('create-crm-companies')
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <button type="submit" id="add-email" class="btn btn-primary btn-primary">
                                                {{ trans('general.add', ['type' => trans_choice('general.email', 1)]) }}
                                            </button>
                                        </div>
                                    </div>
                                    @endpermission

                                    {!! Form::close() !!}
                                </div>

                                <div class="tab-pane fade" id="log">
                                    {!! Form::open([
                                        'id' => 'form-log',
                                        'route' => ['crm.modals.logs.store', 'companies', $company->id],
                                        '@submit.prevent' => 'onLogSubmit',
                                        'role' => 'form',
                                        'class' => 'form-loading-button',
                                        'novalidate' => true
                                    ]) !!}

                                    <div class="row">
                                        {{ Form::dateGroup('date', trans('general.date'), 'calendar', ['id' => 'date', 'class' => 'form-control datepicker', 'required' => 'required', 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], Date::now()->toDateString()) }}

                                        {{ Form::timeGroup('time', trans('crm::general.time'), 'clock', ['id' => 'time', 'required' => 'required', 'class' => 'form-control timepicker', 'autocomplete' => 'off'], null, 'col-md-6 bootstrap-timepicker') }}

                                        {{ Form::selectGroup('log_type', trans_choice('crm::general.logs', 1), 'terminal', $log_types, '', ['required' => 'required', 'change' => 'onLogSelectType']) }}

                                        {{ Form::textareaGroup('description', trans_choice('general.description', 1)) }}
                                    </div>

                                    @permission('create-crm-companies')
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <button type="submit" id="add-logs" class="btn btn-primary btn-primary">
                                                {{ trans('general.add', ['type' => trans_choice('general.logs', 1)]) }}
                                            </button>
                                        </div>
                                    </div>
                                    @endpermission

                                    {!! Form::close() !!}
                                </div>

                                <div class="tab-pane fade" id="schedule">
                                    {!! Form::open([
                                        'id' => 'form-schedule',
                                        'route' => ['crm.modals.schedules.store', 'companies', $company->id],
                                        '@submit.prevent' => 'onScheduleSubmit',
                                        'role' => 'form',
                                        'class' => 'form-loading-button',
                                        'novalidate' => true
                                    ]) !!}

                                    <div class="row">
                                        {{ Form::textGroup('name', trans('general.name'), 'id-card') }}

                                        {{ Form::selectGroup('schedule_type', trans_choice('crm::general.schedules', 1), 'terminal', $schedule_types) }}

                                        {{ Form::dateGroup('started_at', trans('crm::general.start_date'), 'calendar', ['required' => 'required', 'class' => 'form-control datepicker', 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], Date::now()->toDateString()) }}

                                        {{ Form::dateGroup('ended_at', trans('crm::general.end_date'), 'calendar', ['required' => 'required', 'class' => 'form-control datepicker', 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], Date::now()->toDateString()) }}

                                        {{ Form::timeGroup('started_time_at', trans('crm::general.start_time'), 'clock', ['id' => 'time', 'required' => 'required', 'class' => 'form-control timepicker', 'autocomplete' => 'off'], null, 'col-md-6 bootstrap-timepicker') }}

                                        {{ Form::timeGroup('ended_time_at', trans('crm::general.end_time'), 'clock', ['id' => 'time', 'required' => 'required', 'class' => 'form-control timepicker', 'autocomplete' => 'off'], null, 'col-md-6 bootstrap-timepicker') }}

                                        {{ Form::selectGroup('user_id', trans_choice('general.users', 1), 'user-circle', $users, request('user_id'), ['required' => 'required', 'class' => 'form-control users']) }}

                                        {{ Form::textareaGroup('description', trans_choice('general.description', 1)) }}
                                    </div>

                                    @permission('create-crm-companies')
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <button type="submit" id="add-schedule" class="btn btn-primary btn-primary">
                                                {{ trans('general.add', ['type' => trans_choice('general.schedule', 1)]) }}
                                            </button>
                                        </div>
                                    </div>
                                    @endpermission

                                    {!! Form::close() !!}
                                </div>

                                <div class="tab-pane fade" id="task">
                                    {!! Form::open([
                                        'id' => 'form-task',
                                        'route' => ['crm.modals.tasks.store', 'companies', $company->id],
                                        '@submit.prevent' => 'onScheduleSubmit',
                                        'role' => 'form',
                                        'class' => 'form-loading-button',
                                        'novalidate' => true
                                    ]) !!}

                                    <div class="row">
                                        {{ Form::textGroup('name', trans('general.name'), 'id-card') }}

                                        {{ Form::selectGroup('user_id', trans_choice('general.users',1),'user-circle' , $users, request('user_id'), ['required' => 'required', 'class' => 'form-control users']) }}

                                        {{ Form::dateGroup('started_at', trans('crm::general.start_date'), 'calendar', ['required' => 'required', 'class' => 'form-control datepicker', 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], Date::now()->toDateString()) }}

                                        {{ Form::timeGroup('started_time_at', trans('crm::general.start_time'), 'clock', ['id' => 'time', 'required' => 'required', 'class' => 'form-control timepicker', 'autocomplete' => 'off'], null, 'col-md-6 bootstrap-timepicker') }}

                                        {{ Form::textareaGroup('description', trans_choice('general.description', 1)) }}
                                    </div>

                                    @permission('create-crm-companies')
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <button type="submit" id="add-task" class="btn btn-primary btn-primary">
                                                {{ trans('general.add', ['type' => trans_choice('general.task', 1)]) }}
                                            </button>
                                        </div>
                                    </div>
                                    @endpermission

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header with-border">
                <h3 class="mb-0">{{ trans_choice('crm::general.activities', 2) }}</h3>
            </div>

            <div class="row">
                <div class="col-md-12 no-padding-right">
                    <crm-activities
                        :data="{{ json_encode($activities) }}"
                        :status-text="'{{ trans_choice('general.statuses', 1) }}'"
                        :show-button-text="'{{ trans('general.show') }}'"
                        :email-text="'{{ trans('crm::general.email') }}'"
                        :edit-button-text="'{{ trans('general.edit') }}'"
                        :delete-button-text="'{{ trans('general.delete') }}'"
                        :send-button-text="'{{ trans('general.send') }}'"
                        :no-records-text="'{{ trans('general.no_records') }}'"
                        @permission('update-crm-companies')
                        :send-button-status="true"
                        :edit-button-status="true"
                        @endpermission
                        @permission('delete-crm-companies')
                        :delete-button-status="true"
                        @endpermission
                        :delete-text="'{{ trans('crm::general.modal.delete.title') }}'"
                        :delete-text-message="'{{ trans('crm::general.modal.delete.message') }}'"
                        :save-button-text="'{{ trans('general.save') }}'"
                        :cancel-button-text="'{{ trans('general.cancel') }}'">
                    </crm-activities>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('content_content_end')
    <component v-bind:is="dynamic_component"></component>
@endpush

@push('stylesheet')
    <style>
        .form-group.disabled .input-group-text {
            background-color: #e9ecef;
        }
    </style>
@endpush

@push('scripts_start')
    <script src="{{ asset('modules/Crm/Resources/assets/js/companies.min.js?v=' .module_version('crm')) }}"></script>
@endpush
