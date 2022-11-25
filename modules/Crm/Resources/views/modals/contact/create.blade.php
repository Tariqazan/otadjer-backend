{!! Form::open([
    'route' => 'crm.modals.company.contact.store',
    'id' => 'form-create-contact',
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'files' => true,
    'role' => 'form',
    'class' => 'form-loading-button needs-validation',
    'novalidate' => 'true'
]) !!}
    <div class="row">
        {{ Form::textGroup('name', trans('general.name'), 'font') }}

        {{ Form::textGroup('email', trans('general.email'), 'envelope', ['autocomplete' => 'off']) }}

        {{ Form::selectGroup('stage', trans('crm::general.stage.title'), 'square', $stages) }}

        {{ Form::selectGroup('owner_id', trans('crm::general.owner'), 'user', $users) }}

        {{ Form::selectGroup('source', trans('crm::general.source'), 'tasks', $sources) }}

        {{ Form::radioGroup('enabled', trans('general.enabled'), true) }}

        {{ Form::hidden('currency_code', setting('default.currency', 'USD')) }}

        {{ Form::hidden('type', 'crm_contact') }}
    </div>
{!! Form::close() !!}

