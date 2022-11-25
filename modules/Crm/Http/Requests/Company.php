<?php

namespace Modules\Crm\Http\Requests;

use App\Abstracts\Http\FormRequest;

class Company extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $email = '';

        $type = $this->request->get('type', 'crm_company');
        $company_id = $this->request->get('company_id');

        // Check if store or update
        if ($this->getMethod() == 'PATCH') {
            $id = $this->company->contact->getAttribute('id');
        } else {
            $id = null;
        }

        if (!empty($this->request->get('email'))) {
            $email = 'email|unique:contacts,NULL,' . $id . ',id,company_id,' . $company_id . ',type,' . $type . ',deleted_at,NULL';
        }

        $picture = 'nullable';

        if ($this->files->get('picture', null)) {
            $picture = 'mimes:' . config('filesystems.mimes') . '|between:0,' . config('filesystems.max_size') * 1024;
        }

        return [
            // Contact
            'type' => 'required|string',
            'name' => 'required|string',
            'email' => $email,
            'enabled' => 'integer|boolean',

            // Crm Company
            'phone' => 'nullable|string',
            'stage' => 'required|string',
            'owner_id' => 'required|integer',
            'mobile' => 'nullable|string',
            'web_site' =>  'nullable|string',
            'fax_number' =>  'nullable|string',
            'address' =>  'nullable|string',
            'source' => 'required|string',
            'picture' => $picture,
            'note' =>  'nullable|string',
        ];
    }
}
