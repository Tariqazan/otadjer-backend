<?php

namespace Modules\Crm\Traits;

trait Main
{
    public function getLogTypes()
    {
        return [
            'call' => trans('crm::general.log_type.call'),
            'meeting' => trans('crm::general.log_type.meeting'),
            'email' => trans('crm::general.log_type.email'),
            'sms' => trans('crm::general.log_type.sms'),
        ];
    }

    public function getScheduleTypes()
    {
        return [
            'call' => trans('crm::general.schedules_type.call'),
            'meeting' => trans('crm::general.schedules_type.meeting'),
        ];
    }
}
