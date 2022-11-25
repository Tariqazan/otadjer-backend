<?php

namespace Modules\Estimates\Http\Requests;

use App\Http\Requests\Document\Document;
use App\Utilities\Date;
use Illuminate\Support\Arr;

class Estimate extends Document
{
    public function rules()
    {
        $rules = parent::rules();

        Arr::pull($rules, 'due_at');

        $rules['issued_at'] = 'required|date_format:Y-m-d H:i:s|before_or_equal:expire_at';
        $rules['expire_at'] = 'nullable|date_format:Y-m-d H:i:s|after_or_equal:issued_at';

        return $rules;
    }

    public function withValidator($validator)
    {
        if ($validator->errors()->count()) {
            // Set date
            $issued_at = Date::parse($this->request->get('issued_at'))->format('Y-m-d');
            $expire_at = Date::parse($this->request->get('expire_at'))->format('Y-m-d');

            $this->request->set('issued_at', $issued_at);
            $this->request->set('expire_at', $expire_at);
        }
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'issued_at' => trans('estimates::validation.attributes.estimated_at'),
        ];
    }
}
