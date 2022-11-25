<?php

namespace Modules\Inventory\Http\Controllers;

use App\Abstracts\Http\Controller;
use Modules\Inventory\Models\History;

class Histories extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
    */
    public function index()
    {
        $histories = History::orderBy('created_at')->collect('item.name');

        return $this->response('inventory::histories.index', compact('histories'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @return Response
    */
    public function show()
    {
        return redirect()->route('inventory.histories.index');
    }

    /**
     * Print the history.
     *
     * @param  History $history
     *
     * @return Response
    */
    public function print(History $history)
    {
        $view = view('', compact('history'));

        return mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');
    }
}
