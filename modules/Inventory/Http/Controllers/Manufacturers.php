<?php

namespace Modules\Inventory\Http\Controllers;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Common\Import as ImportRequest;
use App\Models\Common\Contact;
use Modules\Inventory\Exports\Manufacturers as Export;
use Modules\Inventory\Http\Requests\Manufacturer as Request;
use Modules\Inventory\Imports\Manufacturers as Import;
use Modules\Inventory\Jobs\Manufacturers\CreateManufacturer;
use Modules\Inventory\Jobs\Manufacturers\DeleteManufacturer;
use Modules\Inventory\Jobs\Manufacturers\UpdateManufacturer;
use Modules\Inventory\Models\Manufacturer;
use Modules\Inventory\Models\ManufacturerVendor;

class Manufacturers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::collect();

        return $this->response('inventory::manufacturers.index', compact('manufacturers'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @return Response
     */
    public function show()
    {
        return redirect()->route('inventory.manufacturers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $vendors = Contact::enabled()->orderBy('name')->pluck('name', 'id');

        return view('inventory::manufacturers.create', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $response = $this->ajaxDispatch(new CreateManufacturer($request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.manufacturers.index');

            $message = trans('messages.success.added', ['type' => trans_choice('inventory::general.manufacturers', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.manufacturers.create');

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Duplicate the specified resource.
     *
     * @param  Manufacturer  $manufacturer
     *
     * @return Response
     */
    public function duplicate(Manufacturer $manufacturers)
    {
        $clone = $manufacturers->duplicate();

        $message = trans('messages.success.duplicated', ['type' => trans_choice('inventory::general.manufacturers', 1)]);

        flash($message)->success();

        return redirect()->route('inventory.manufacturers.edit', $clone->id);
    }

    /**
     * Import the specified resource.
     *
     * @param  ImportRequest  $request
     *
     * @return Response
     */
    public function import(ImportRequest $request)
    {
        \Excel::import(new Import(), $request->file('import'));

        $message = trans('messages.success.imported', ['type' => trans_choice('inventory::general.manufacturers', 2)]);

        flash($message)->success();

        return redirect()->route('inventory.manufacturers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Manufacturer $manufacturer
     *
     * @return Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        $vendors = Contact::enabled()->orderBy('name')->pluck('name', 'id');

        return view('inventory::manufacturers.edit', compact('manufacturer', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Manufacturer $manufacturer
     * @param  Request      $request
     *
     * @return Response
     */
    public function update(Manufacturer $manufacturer, Request $request)
    {
        $response = $this->ajaxDispatch(new UpdateManufacturer($manufacturer, $request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.manufacturers.index');

            $message = trans('messages.success.updated', ['type' => $manufacturer->name]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.manufacturers.edit', $manufacturer->id);

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);

    }

    /**
     * Enable the specified resource.
     *
     * @param  Manufacturer $manufacturer
     *
     * @return Response
     */
    public function enable(Manufacturer $manufacturer)
    {
        $response = $this->ajaxDispatch(new UpdateManufacturer($manufacturer, request()->merge(['enabled' => 1])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.enabled', ['type' => $manufacturer->name]);
        }

        return response()->json($response);
    }

    /**
     * Disable the specified resource.
     *
     * @param  Manufacturer $manufacturer
     *
     * @return Response
     */
    public function disable(Manufacturer $manufacturer)
    {
        $response = $this->ajaxDispatch(new UpdateManufacturer($manufacturer, request()->merge(['enabled' => 0])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.disabled', ['type' => $manufacturer->name]);
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Manufacturer $manufacturer
     *
     * @return Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $response = $this->ajaxDispatch(new DeleteManufacturer($manufacturer));

        $response['redirect'] = route('inventory.manufacturers.index');

        if ($response['success']) {
            $message = trans('messages.success.deleted', ['type' => $manufacturer->name]);

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }
}
