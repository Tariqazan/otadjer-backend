
<div class="row">
    {{ Form::textGroup('name', trans('general.name'), 'font', ['disabled' => 'true'], $task->name, 'col-md-6') }}

    {{ Form::textGroup('user_id', trans_choice('general.users',1),'user-circle', ['disabled' => 'true'], $task->user->name, 'col-md-6') }}

    {{ Form::textGroup('started_at', trans('crm::general.start_date'), 'calendar', ['disabled' => 'true'], $task->started_at, 'col-md-6') }}

    {{ Form::textGroup('started_time_at', trans('crm::general.start_time'), 'clock', ['disabled' => 'true'], $task->started_time_at, 'col-md-6') }}

    {{ Form::textareaGroup('description', trans_choice('general.description', 1), '', $task->description, ['disabled' => 'true']) }}
</div>
