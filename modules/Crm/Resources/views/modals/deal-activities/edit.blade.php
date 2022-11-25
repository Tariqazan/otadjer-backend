{!! Form::model($deal_activity, [
    'method' => 'PATCH',
    'route' => ['crm.modals.deal.activities.update', $deal->id, $deal_activity->id],
    'id' => 'form-edit-deal-activity',
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'role' => 'form',
    'class' => 'form-loading-button',
    'novalidate' => true
]) !!}
    <div class="row">
        {{ Form::selectGroup('activity_type', trans_choice('crm::general.activities', 1), 'circle', $activity_types, $deal_activity->activityType->id) }}

        {{ Form::textGroup('name', trans('general.name'), 'id-card') }}

        {{ Form::dateGroup('date', trans('general.date'), 'calendar', ['required' => 'required', 'class' => 'form-control datepicker', 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], Date::parse($deal_activity->date)->toDateString()) }}

        {{ Form::timeGroup('time', trans('crm::general.time'), 'clock', ['id' => 'time', 'required' => 'required', 'class' => 'form-control timepicker', 'autocomplete' => 'off'], $deal_activity->time) }}

        {{ Form::selectGroup('duration', trans('crm::general.duration'), 'fas fa-stopwatch', $durations, $deal_activity->duration) }}

        {{ Form::selectGroup('assigned', trans('crm::general.assigned'), 'bookmark', $assigneds, $deal_activity->assigned) }}

        {{ Form::textareaGroup('note', trans_choice('general.notes', 1), $deal_activity->note) }}

        <div class="form-group col-md-12">
            <div id="deal-create-done" class="form-group col-md-12 margin-top">
                <div class="custom-control custom-checkbox">
                    {{ Form::checkbox('done', '1', '', [
                        'id' => 'done',
                        'class' => 'custom-control-input',
                        '@input' => 'onCanDone($event)'
                    ]) }}

                    <label class="custom-control-label" for="done">
                        <strong>{{ trans('crm::general.mark_as_done') }}</strong>
                    </label>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
