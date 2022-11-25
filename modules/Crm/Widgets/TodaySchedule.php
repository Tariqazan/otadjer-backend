<?php

namespace Modules\Crm\Widgets;

use App\Abstracts\Widget;
use App\Traits\DateTime;
use Modules\Crm\Models\Schedule;
use Date;

class TodaySchedule extends Widget
{
    use DateTime;

    public $today;

    public $default_name = 'crm::widgets.today_schedule';

    public function show()
    {
        $today = Date::today()->toDateString();

        $schedules = Schedule::where('started_at', $today)->get();

        return $this->view('crm::widgets.today_schedule', [
            'schedules' => $schedules,
            'today' => $today,
        ]);
    }
}
