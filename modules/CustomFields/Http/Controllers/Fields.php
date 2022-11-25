<?php

namespace Modules\CustomFields\Http\Controllers;

use App\Abstracts\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Modules\CustomFields\Http\Requests\Field as FRequest;
use Modules\CustomFields\Models\Field;
use Modules\CustomFields\Models\FieldLocation;
use Modules\CustomFields\Models\FieldTypeOption;
use Modules\CustomFields\Models\FieldValue;
use Modules\CustomFields\Models\Location;
use Modules\CustomFields\Models\Type;
use Modules\CustomFields\Traits\CustomFields;
use Modules\CustomFields\Traits\LocationSortOrder;

class Fields extends Controller
{
    use CustomFields, LocationSortOrder;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $custom_fields = Field::with(['type', 'location'])->collect();

        return view('custom-fields::fields.index', compact('custom_fields'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $types = Type::pluck('name', 'id');

        $locations = $this->getLocations();

        $orders = [
            'input_start' => trans('custom-fields::general.form.before'),
            'input_end' => trans('custom-fields::general.form.after'),
        ];

        $shows = [
            'always' => trans('custom-fields::general.form.shows.always'),
            'never' => trans('custom-fields::general.form.shows.never'),
            'if_filled' => trans('custom-fields::general.form.shows.if_filled'),
        ];

        $validation_rules = $this->getValidationRules();

        return view('custom-fields::fields.create', compact('types', 'locations', 'orders', 'shows', 'validation_rules'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  FRequest $request
     * @return Response
     */
    public function store(FRequest $request)
    {
        $request['locations'] = $request->location_id;

        $request->merge(['code' => '']);

        if (!empty($request['rule'])) {
            $request['rule'] = implode('|', $request['rule']);
        }

        $field = Field::create($request->input());

        $field->update(['code' => 'custom_field_' . $field->id]);

        FieldLocation::create([
            'company_id' => company_id(),
            'field_id' => $field->id,
            'location_id' => $request->location_id,
            'sort_order' => $request->sort . (!empty($request->order) ? '_' : '') . $request->order,
        ]);

        if (isset($request->items)) {
            foreach ($request->items as $item) {
                $values[] = $item['values'];
            }
        }

        if (!isset($values)) {
            $values[] = empty($request->value) ? '' : $request->value;
        }

        foreach ($values as $value) {
            FieldTypeOption::create([
                'company_id' => company_id(),
                'field_id' => $field->id,
                'type_id' => $request->type_id,
                'value' => $value,
            ]);
        }

        $response = [
            'success' => true,
            'error' => false,
            'redirect' => route('custom-fields.fields.index'),
            'data' => [],
        ];

        $message = trans('messages.success.added', ['type' => trans('custom-fields::general.name')]);

        flash($message)->success();

        return response()->json($response);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('custom-fields::fields.show');
    }

    /**
     * Duplicate the specified resource.
     *
     * @param  Field  $field
     *
     * @return Response
     */
    public function duplicate(Field $field)
    {
        $clone = $field->duplicate();

        FieldLocation::create([
            'company_id' => company_id(),
            'field_id' => $clone->id,
            'location_id' => $clone->locations,
            'sort_order' => $field->fieldLocation->sort_order,
        ]);

        $message = trans('messages.success.duplicated', ['type' => trans('custom-fields::general.name')]);

        flash($message)->success();

        return redirect()->route('custom-fields.fields.edit', $clone->id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param  Field $field
     * @return Response
     */
    public function edit(Field $field)
    {
        $types = Type::pluck('name', 'id');
        $locations = $this->getLocations();

        $orders = [
            'input_start' => trans('custom-fields::general.form.before'),
            'input_end' => trans('custom-fields::general.form.after'),
        ];

        $shows = [
            'always' => trans('custom-fields::general.form.shows.always'),
            'never' => trans('custom-fields::general.form.shows.never'),
            'if_filled' => trans('custom-fields::general.form.shows.if_filled'),
        ];

        $sort_values = $this->getLocationSortOrder($field->location->code);

        $field->location_id = $field->locations;

        $sort_order = explode('_input_', $field->fieldLocation->sort_order);

        $sort = $sort_order[0];

        if ($field->fieldLocation->sort_order == 'item_custom_fields') {
            $order = null;
        } else {
            $order = 'input_' . $sort_order[1];
        }

        $field->sort = $sort;
        $field->order = $order;

        $view = 'type_option_value';

        if ($field->type->type == 'select' || $field->type->type == 'checkbox') {
            $view = 'type_option_values';
        }

        $custom_field_values = "";

        if ($field->fieldTypeOption) {
            $custom_field_values = $field->fieldTypeOption->pluck('value', 'id')->toArray();
        }

        $validation_rules = $this->getValidationRules();

        $selected_validation_rules = null;

        if (!empty($field->rule)) {
            $selected_validation_rules = explode('|', $field->rule);
        }

        return view('custom-fields::fields.edit', compact('field', 'types', 'locations', 'orders', 'sort_values', 'shows', 'view', 'custom_field_values', 'validation_rules', 'selected_validation_rules'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Field $field
     * @param  FRequest $request
     * @return Response
     */
    public function update(Field $field, FRequest $request)
    {
        $request['locations'] = $request->location_id;

        if ($field->locations != $request->location_id) {
            $field->fieldLocation->delete();

            $field_location = FieldLocation::create([
                'company_id' => company_id(),
                'field_id' => $field->id,
                'location_id' => $request->location_id,
                'sort_order' => $request->sort . (!empty($request->order) ? '_' : '') . $request->order,
            ]);
        } else {
            $field_location = FieldLocation::where('field_id', '=', $field->id)->first();

            if ($field_location) {
                $field_location->sort_order = $request->sort . (!empty($request->order) ? '_' : '') . $request->order;
                $field_location->save();
            } else {
                $field_location = FieldLocation::create([
                    'company_id' => company_id(),
                    'field_id' => $field->id,
                    'location_id' => $request->location_id,
                    'sort_order' => $request->sort . (!empty($request->order) ? '_' : '') . $request->order,
                ]);
            }
        }

        if (!empty($request['rule'])) {
            $request['rule'] = implode('|', $request['rule']);
        }

        $field->update($request->input());

        if (isset($request->items)) {
            foreach ($request->items as $item) {
                $values[] = $item['values'];
            }
        }

        if (!isset($values)) {
            $values[] = empty($request->value) ? '' : $request->value;
        }

        $options = $field->fieldTypeOption;

        foreach ($options as $option) {
            if (!in_array($option->value, $values)) {
                foreach ($field->field_values as $field_value) {
                    if ($field_value->value == $option->id) {
                        $field_value->delete();
                    }
                }

                $option->delete();
            }
        }

        foreach ($values as $value) {
            if (!in_array($value, $options->pluck('value')->toArray())) {
                FieldTypeOption::create([
                    'company_id' => company_id(),
                    'field_id' => $field->id,
                    'type_id' => $request->type_id,
                    'value' => $value,
                ]);
            }
        }

        $response = [
            'success' => true,
            'error' => false,
            'data' => [],
            'message' => '',
        ];

        $response['redirect'] = route('custom-fields.fields.index');

        $message = trans('messages.success.updated', ['type' => trans('custom-fields::general.name')]);

        flash($message)->success();

        return response()->json($response);
    }

    /**
     * Enable the specified resource.
     *
     * @param  Field  $field
     *
     * @return Response
     */
    public function enable(Field $field)
    {
        $field->enabled = 1;
        $field->save();

        $response = [
            'success' => true,
            'error' => false,
            'data' => [],
            'message' => '',
        ];

        if ($response['success']) {
            $response['message'] = trans('messages.success.enabled', ['type' => trans('custom-fields::general.name')]);
        }

        return response()->json($response);
    }

    /**
     * Disable the specified resource.
     *
     * @param  Field  $field
     *
     * @return Response
     */
    public function disable(Field $field)
    {
        $field->enabled = 0;
        $field->save();

        $response = [
            'success' => true,
            'error' => false,
            'data' => [],
            'message' => '',
        ];

        if ($response['success']) {
            $response['message'] = trans('messages.success.disabled', ['type' => trans('custom-fields::general.name')]);
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Field $field)
    {
        $this->deleteRelationships($field, ['fieldTypeOption']);
        //$this->deleteRelationships($field, ['fieldTypeOption', 'fieldLocation']);

        $field_location = FieldLocation::where('field_id', $field->id)->first();
        $field_location->delete();

        $field_values = FieldValue::where('field_id', $field->id)->get();

        foreach ($field_values as $field_value) {
            $field_value->delete();
        }

        $field->delete();

        $response = [
            'success' => true,
            'error' => false,
            'data' => [],
            'message' => '',
            'redirect' => route('custom-fields.fields.index'),
        ];

        $message = trans('messages.success.deleted', ['type' => trans('custom-fields::general.name')]);

        flash($message)->success();

        return response()->json($response);
    }

    public function getType(Request $request)
    {
        $type = Type::find($request['type_id']);

        $view = 'type_option_value';

        if ($type->type == 'select' || $type->type == 'checkbox') {
            $view = 'type_option_values';
        }

        return response()->json([
            'type' => $type,
            'view' => $view,
        ]);
    }

    public function getSortOrder(Request $request)
    {
        $location = Location::find($request['location_id']);

        $sort_values = $this->getLocationSortOrder($location->code);

        return response()->json([
            'data' => [
                'type' => $location,
                'sort' => $sort_values,
            ],
        ]);
    }
}
