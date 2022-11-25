@extends('layouts.admin')

@section('title', trans_choice('crm::general.schedule',2))

@section('content')
<div class="card">
        <div class="card-body">
            <full-calendar
            :plugins = "calendarPlugins"
            :editable = "false"
            :theme = "true"
            :event-limit = "true"
            :selectable = "true"
            :selectHelper = "true"
            ref = "fullCalendar"
            class = "calendar"
            default-view = "dayGridMonth"
            :header = "{
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
              }"
            :events = "{{ json_encode($items) }}"
            @dateClick = "handleDateClick"
            >
            </full-calendar>
        </div>
    </div>
@endsection

@push('stylesheet')
    <link rel = "stylesheet" href = "{{ asset('modules/Crm/Resources/assets/css/crm.css?v=' .module_version('crm')) }}" type="text/css">
@endpush

@push('scripts_start')
    <script src = "{{ asset('modules/Crm/Resources/assets/js/schedule.min.js?v=' .module_version('crm')) }}"></script>
@endpush
