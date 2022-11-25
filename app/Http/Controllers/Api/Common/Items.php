<?php

namespace App\Http\Controllers\Api\Common;

use App\Abstracts\Http\ApiController;
use App\Http\Requests\Common\Item as Request;
use App\Jobs\Common\CreateItem;
use App\Jobs\Common\DeleteItem;
use App\Jobs\Common\UpdateItem;
use App\Models\Item;
use App\Transformers\Common\Item as Transformer;
use App\Models\Document\Document;
use App\Jobs\Banking\CreateBankingDocumentTransaction;


class Items extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {

        //$items = Item::with('category', 'taxes')->collect(); //paginate(100000)env('PAGINATION')
       
        $currentUserId = auth()->user()->id;
        $role = \DB::table("user_roles")->where("user_id",$currentUserId)->first();
      
        $warehouse_ids = \DB::table('inventory_user_warehouses')->where('user_id',$currentUserId)->pluck('warehouse_id');
       $warehouseId = $warehouse_ids->toArray();
     
       //\DB::enableQueryLog();
        $items = Item::with('category', 'media')
        ->whereHas('inventoryHistories',function($query) use($warehouseId,$currentUserId,$role){
            //$warehouse_ids->toArray()
            if($role->role_id != 1){
                $query = $query->whereIn("inventory_histories.warehouse_id",$warehouseId);
            }
            $query->whereNull('inventory_histories.deleted_at'); })
        ->orWhereDoesntHave('inventory_items')
        ->collect();
        //dd(\DB::getQueryLog());

       foreach ($items as $key => $value) {
	
$items[$key]->total_stock = $value->inventory()->whereIn('warehouse_id',$warehouseId)->sum('opening_stock');
            if($value->inventoryHistories->count()){
                if($role->role_id != 1){
                $value->inventoryHistories = $value->inventoryHistories->filter(function($item) use($warehouseId){
                            return in_array($item->warehouse_id,$warehouseId);
                })->values();
            }
            }
        }
		

        
		
        //dd($items->toArray());
        return $this->response->paginator($items, new Transformer());
    }


    /**
     * Display the specified resource.
     *
     * @param  int|string  $id
     * @return \Dingo\Api\Http\Response
     */
    public function show($id)
    {
        $item = Item::with('category', 'taxes')->find($id);

        return $this->item($item, new Transformer());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Request $request)
    {
        $item = $this->dispatch(new CreateItem($request));

        return $this->response->created(route('api.items.show', $item->id), $this->item($item, new Transformer()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $item
     * @param  $request
     * @return \Dingo\Api\Http\Response
     */
    public function update(Item $item, Request $request)
    {
        $item = $this->dispatch(new UpdateItem($item, $request));

        return $this->item($item->fresh(), new Transformer());
    }

    /**
     * Enable the specified resource in storage.
     *
     * @param  Item  $item
     * @return \Dingo\Api\Http\Response
     */
    public function enable(Item $item)
    {
        $item = $this->dispatch(new UpdateItem($item, request()->merge(['enabled' => 1])));

        return $this->item($item->fresh(), new Transformer());
    }

    /**
     * Disable the specified resource in storage.
     *
     * @param  Item  $item
     * @return \Dingo\Api\Http\Response
     */
    public function disable(Item $item)
    {
        $item = $this->dispatch(new UpdateItem($item, request()->merge(['enabled' => 0])));

        return $this->item($item->fresh(), new Transformer());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Item  $item
     * @return \Dingo\Api\Http\Response
     */
    public function destroy(Item $item)
    {
        try {
            $this->dispatch(new DeleteItem($item));

            return $this->response->noContent();
        } catch(\Exception $e) {
            $this->response->errorUnauthorized($e->getMessage());
        }
    }
    
public function storeTransaction(Document $document, Request $request)
{
    
    $response = $this->ajaxDispatch(new CreateBankingDocumentTransaction($document, $request));

    if ($response['success']) {
        $message = trans('messages.success.added', ['type' => trans_choice('general.payments', 1)]);

         return ["status"=>200,"message"=>$message];
    } else {
        return response()->json($response);
    }

    return response()->json($response);
}

}
