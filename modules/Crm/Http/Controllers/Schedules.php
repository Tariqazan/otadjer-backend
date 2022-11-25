<?php

namespace Modules\Crm\Http\Controllers;

use App\Abstracts\Http\Controller;
use App\Models\Common\Company;
use Date;
use Modules\Crm\Traits\Main;
use Modules\Crm\Models\Schedule;

class Schedules extends Controller
{
    use Main;

    public function index()
    {
        $items = [];

        $company_id = company_id();

        $schedules = Schedule::all();

        $users = Company::find($company_id)->users()->pluck('name', 'id');

        foreach ($schedules as $schedule) {
            $table = 'contact';

            if ($schedule->scheduleable_type == 'Modules\Crm\Models\Company') {
                $table = 'company';
            }

            if ($table == 'contact') {
                $model = $schedule->contact;
            } else {
                $model = $schedule->company;
            }

            if (!empty($model)) {
                $schedule_contact_name = $model->contact->name;

                $title = $schedule_contact_name . ': ' . $schedule->name . ' (' . trans('crm::general.log_type.' . $schedule->schedule_type) . ')';
            } else {
                $title = $schedule->name . ' (' . trans('crm::general.log_type.' . $schedule->schedule_type) . ')';
            }

            $color = '#03c756';

            if (Date::parse($schedule->started_at)->format('Y-m-d') < Date::today()->format('Y-m-d') && Date::parse($schedule->ended_at)->format('Y-m-d') < Date::today()->format('Y-m-d')) {
                $color = '#dd4b39';
            }

            $items[] = [
                'title' => $title,
                'start' => $schedule->started_at . 'T' . $schedule->started_time_at,
                'end' => $schedule->ended_at . 'T' . $schedule->ended_time_at,
                'description' => 'ddeeeeee',
                'type' => 'schedule',
                'id' => $schedule->id,
                'url' => '',
                'table' => $table,
                'backgroundColor' => $color,
                'borderColor' => $color,
            ];
        }

        $types = $this->getScheduleTypes();

        return view('crm::schedules.index', compact('schedules', 'users', 'items', 'types'));
    }
}
