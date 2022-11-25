<?php

namespace Modules\Inventory\Http\Controllers;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Common\Import as ImportRequest;
use Modules\Inventory\Exports\Variants\Variants as Export;
use Modules\Inventory\Http\Requests\Variant as Request;
use Modules\Inventory\Imports\Variants\Variants as Import;
use Modules\Inventory\Jobs\Variants\CreateVariant;
use Modules\Inventory\Jobs\Variants\DeleteVariant;
use Modules\Inventory\Jobs\Variants\UpdateVariant;
use Modules\Inventory\Models\Variant;

class Variants extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $variants = Variant::collect();

        return $this->response('inventory::variants.index', compact('variants'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @return Response
     */
    public function show(Variant $variant)
    {
        return redirect()->route('inventory.variants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $types = [
            trans('inventory::variants.types.choose') => [
                'select' => trans('inventory::variants.types.select'),
                'radio' => trans('inventory::variants.types.radio'),
                'checkbox' => trans('inventory::variants.types.checkbox')
            ],
            trans('inventory::variants.types.input') => [
                'text' => trans('inventory::variants.types.text'),
                'textarea' => trans('inventory::variants.types.textarea')
            ],
        ];

        return view('inventory::variants.create', compact('types'));
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
        $response = $this->ajaxDispatch(new CreateVariant($request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.variants.index');

            $message = trans('messages.success.added', ['type' => trans_choice('inventory::general.variants', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.variants.create');

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Duplicate the specified resource.
     *
     * @param  Variant $variant
     *
     * @return Response
     */
    public function duplicate(Variant $variant)
    {
        $clone = $variant->duplicate();

        $message = trans('messages.success.duplicated', ['type' => trans_choice('inventory::general.variants', 1)]);

        flash($message)->success();

        return redirect()->route('inventory.variants.edit', $clone->id);
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
        $response = $this->importExcel(new Import, $request, trans_choice('inventory::general.variants', 2));

        if ($response['success']) {
            $response['redirect'] = route('inventory.variants.index');

            flash($response['message'])->success();
        } else {
            $response['redirect'] = route('import.create', ['inventory', 'variants']);

            flash($response['message'])->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Variant $variant
     *
     * @return Response
     */
    public function edit(Variant $variant)
    {
        $types = [
            trans('inventory::variants.types.choose') => [
                'select' => trans('inventory::variants.types.select'),
                'radio' => trans('inventory::variants.types.radio'),
                'checkbox' => trans('inventory::variants.types.checkbox')
            ],
            trans('inventory::variants.types.input') => [
                'text' => trans('inventory::variants.types.text'),
                'textarea' => trans('inventory::variants.types.textarea')
            ],
        ];

        return view('inventory::variants.edit', compact('variant', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Variant $variant
     * @param  Request $request
     *
     * @return Response
     */
    public function update(Variant $variant, Request $request)
    {
        $response = $this->ajaxDispatch(new UpdateVariant($variant, $request));

        if ($response['success']) {
            $response['redirect'] = route('inventory.variants.index');

            $message = trans('messages.success.updated', ['type' => $variant->name]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('inventory.variants.edit', $variant->id);

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Enable the specified resource.
     *
     * @param  Variant $variant
     *
     * @return Response
     */
    public function enable(Variant $variant)
    {
        $response = $this->ajaxDispatch(new UpdateVariant($variant, request()->merge(['enabled' => 1, 'inline' => 'true'])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.enabled', ['type' => $variant->name]);
        }

        return response()->json($response);
    }

    /**
     * Disable the specified resource.
     *
     * @param  Variant $variant
     *
     * @return Response
     */
    public function disable(Variant $variant)
    {
        $response = $this->ajaxDispatch(new UpdateVariant($variant, request()->merge(['enabled' => 0, 'inline' => 'true'])));

        if ($response['success']) {
            $response['message'] = trans('messages.success.enabled', ['type' => $variant->name]);
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Variant $variant
     *
     * @return Response
     */
    public function destroy(Variant $variant)
    {
        $response = $this->ajaxDispatch(new DeleteVariant($variant));

        $response['redirect'] = route('inventory.variants.index');

        if ($response['success']) {
            $message = trans('messages.success.deleted', ['type' => $variant->name]);

            flash($message)->success();
        } else {
            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    /**
     * Export the specified resource.
     *
     * @return Response
     */
    public function export()
    {
        return $this->exportExcel(new Export, trans_choice('inventory::general.variants', 2));
    }
}
