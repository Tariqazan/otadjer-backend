{!! Form::model($deal_activity, [
    'method' => 'PATCH',
    'route' =>  ['crm.modals.deal-activities.update', $type, $type_id, $deal_activity->deal_id],
    'id' => 'form',
    '@submit.prevent' => 'onSubmit',
    '@keydown' => 'form.errors.clear($event.target.name)',
    'role' => 'form',
    'class' => 'form-loading-button',
    'novalidate' => true
]) !!}
    <div class="row">
        {{ Form::selectGroup('activity_type', trans_choice('crm::general.activities', 1), 'circle', $activity_types, $deal_activity->activity_type) }}

        {{ Form::textGroup('name', trans('general.name'), 'id-card') }}

        {{ Form::dateGroup('date', trans('general.date'), 'calendar', ['required' => 'required', 'class' => 'form-control datepicker', 'date-format' => 'Y-m-d', 'autocomplete' => 'off'], Date::parse($deal_activity->date)->toDateString()) }}

        {{ Form::timeGroup('time', trans('crm::general.time'), 'clock', ['id' => 'time', 'required' => 'required', 'class' => 'form-control timepicker', 'autocomplete' => 'off'], $deal_activity->time) }}

        {{ Form::selectGroup('duration', trans('crm::general.duration'), 'fas fa-stopwatch', $durations, $deal_activity->duration) }}

        {{ Form::selectGroup('assigned', trans('crm::general.assigned'), 'bookmark', $assigneds, $deal_activity->assigned) }}

        {{ Form::textareaGroup('note', trans_choice('general.notes', 1), $deal_activity->note) }}

        <div class="form-group col-md-12 margin-top">
            <div class="custom-control custom-checkbox">
                @if ($deal_activity->done == true)
                    {{ Form::checkbox('done', '1', 1, [
                        'v-model' => 'form.done',
                        'id' => 'edit_done',
                        'class' => 'custom-control-input',
                    ]) }}

                    <label class="custom-control-label" for="edit_done">
                        <strong>{{ trans('crm::general.mark_as_done') }}</strong>
                    </label>
                @else
                    {{ Form::checkbox('done', '1', null, [
                        'v-model' => 'form.done',
                        'id' => 'edit_done',
                        'class' => 'custom-control-input',
                    ]) }}

                    <label class="custom-control-label" for="edit_done">
                        <strong>{{ trans('crm::general.mark_as_done') }}</strong>
                    </label>
                @endif
            </div>
        </div>
    </div>
{!! Form::close() !!}
