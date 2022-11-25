
{!! Form::open([
    'route' => ['crm.modals.companies.store', $company->id],
    'id' => 'asssing',
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'files' => true,
    'role' => 'form',
    'class' => 'form-loading-button',
    'novalidate' => true
]) !!}

    {{Form::selectGroup('contact_type', trans_choice('crm::general.contacts', 1), 'font', $data, '') }}

    <input type="hidden" name="type_id" value="{{ $type_id }}">

{!! Form::close() !!}
