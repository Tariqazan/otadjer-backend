<div class="row">
    {{ Form::textGroup('activity_type', trans_choice('crm::general.activities', 1), 'circle', ['disabled' => 'true'], $activity_types) }}

    {{ Form::textGroup('name', trans('general.name'), 'id-card', ['disabled' => 'true'], $deal_activity->name) }}

    {{ Form::textGroup('date', trans('general.date'), 'calendar', ['disabled' => 'true'], Date::parse($deal_activity->date)->toDateString()) }}

    {{ Form::textGroup('time', trans('crm::general.time'), 'clock', ['disabled' => 'true'], $deal_activity->time) }}

    {{ Form::textGroup('duration', trans('crm::general.duration'), 'fas fa-stopwatch', ['disabled' => 'true'], $deal_activity->duration) }}

    {{ Form::textGroup('assigned', trans('crm::general.assigned'), 'bookmark', ['disabled' => 'true'], $deal_activity->assigned) }}

    {{ Form::textareaGroup('note', trans_choice('general.notes', 1), '', $deal_activity->note, ['disabled' => 'true']) }}

    <div class="form-group col-md-12 margin-top">
        <div class="custom-control custom-checkbox">
            @if ($deal_activity->done == true)
                {{ Form::checkbox('done', '1', 1, [
                    'v-model' => 'form.done',
                    'id' => 'show_done',
                    'class' => 'custom-control-input',
                    'disabled' => 'true'
                ]) }}

                <label class="custom-control-label" for="show_done">
                    <strong>{{ trans('crm::general.mark_as_done') }}</strong>
                </label>
            @else
                {{ Form::checkbox('done', '1', null, [
                    'v-model' => 'form.done',
                    'id' => 'show_done',
                    'class' => 'custom-control-input',
                    'disabled' => 'true'
                ]) }}

                <label class="custom-control-label" for="show_done">
                    <strong>{{ trans('crm::general.mark_as_done') }}</strong>
                </label>
            @endif
        </div>
    </div>
</div>
