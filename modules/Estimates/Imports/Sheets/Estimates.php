<?php

namespace Modules\Estimates\Imports\Sheets;

use App\Abstracts\Import;
use App\Http\Requests\Document\Document as Request;
use App\Utilities\Date;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\Estimates\Models\Estimate as Model;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class Estimates extends Import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        if ($this->isEmpty($row, 'estimate_number')) {
            return [];
        }

        $row = parent::map($row);

        $date_fields = ['estimated_at', 'expire_at'];
        foreach ($date_fields as $date_field) {
            if (!isset($row[$date_field])) {
                continue;
            }

            try {
                $row[$date_field] = Date::parse(ExcelDate::excelToDateTimeObject($row[$date_field]))
                                        ->format('Y-m-d H:i:s');
            } catch (InvalidFormatException | \Exception $e) {
                Log::info($e->getMessage());
            }
        }

        $row['category_id']     = $this->getCategoryId($row, 'income');
        $row['contact_id']      = $this->getContactId($row, 'customer');
        $row['issued_at']       = $row['estimated_at'];
        $row['document_number'] = $row['estimate_number'];
        $row['type']            = Model::TYPE;

        return $row;
    }

    public function rules(): array
    {
        $rules = (new Request())->rules();

        $rules['estimate_number'] = Str::replaceFirst(
            'unique:documents,NULL',
            'unique:documents,document_number',
            $rules['document_number']
        );
        $rules['estimated_at']    = $rules['issued_at'];

        unset($rules['document_number'], $rules['issued_at'], $rules['due_at'], $rules['type']);

        return $rules;
    }
}
