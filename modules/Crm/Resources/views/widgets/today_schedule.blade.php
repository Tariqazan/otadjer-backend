<div id="widget-{{ $class->model->id }}" class="{{ $class->model->settings->width }}">
    <div class="card">
        @include($class->views['header'], ['header_class' => 'border-bottom-0'])

        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <tbody>
                    @if($schedules->count())
                        @foreach($schedules as $schedule)
                            @if(Date::parse($schedule->start_date)->format('Y-m-d') == $today)
                                <tr class="row border-top-1">
                                    <td class="text-left">
                                        {{ trans('crm::widgets.log_type.' . $schedule->schedule_type, [
                                            'user' => $schedule->createdBy->name,
                                            'time' => $schedule->started_time_at
                                            ])
                                        }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <h5 class="text-center">{{ trans('general.no_records') }}</h5>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
