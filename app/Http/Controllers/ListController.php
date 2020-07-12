<?php

namespace App\Http\Controllers;

use App\Item;
use App\Shoppinglist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

class ListController extends Controller
{

    public function index(){
        $lists = Shoppinglist::with(['user_helper', 'user_creator', 'items', 'comments'])->get();
        return $lists;
    }

    public function show($id){
        $list = Shoppinglist::where('id', $id)
            ->with(['user_helper', 'user_creator', 'items', 'comments'])
            ->first();
        return $list;
    }


    /**
     * create new list
     */
    public function save(Request $request) : JsonResponse {
        $request = $this->parseRequest($request);
        /*+
        * use a transaction for saving model including relations
        * if one query fails, complete SQL statements will be rolled back
        */
        DB::beginTransaction();
        try {
            $list = Shoppinglist::create($request->all());
            // save until
            if (isset($request['items']) && is_array($request['items'])) {
                foreach ($request['items'] as $item) {
                    $item = Item::create([
                        'description'=>$item['description'],
                        'amount'=>$item['amount'],
                        'maxPrice'=>$item['maxPrice'],
                    ]);
                    $list->items()->save($item);
                }
            }

            DB::commit();
            // return a vaild http response
            return response()->json($list, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving list failed: " . $e->getMessage(), 420);
        }
    }


    /**
     * modify / convert values if needed
     */
    private function parseRequest(Request $request) : Request {
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z"
        $date = new \DateTime($request->until);
        $request['until'] = $date;
        return $request;
    }


    public function update(Request $request, int $id) : JsonResponse
    {
        DB::beginTransaction();
        try {
            $list = Shoppinglist::with(['user_helper', 'user_creator', 'items', 'comments'])->where('id', $id)->first();

            if ($list != null) {
                $request = $this->parseRequest($request);
                $list->update($request->all());
                //delete all old images
                $list->items()->delete();
                // save images
                if (isset($request['items']) && is_array($request['items'])) {
                    foreach ($request['items'] as $item) {
                        $item = Item::firstOrNew([
                            'description'=>$item['description'],
                            'amount'=>$item['amount'],
                            'maxPrice'=>$item['maxPrice'],
                        ]);
                        $list->items()->save($item);
                    }
                }
                $list->save();

            }
            DB::commit();
            $list1 = Shoppinglist::with(['user_helper', 'user_creator', 'items', 'comments'])->where('id', $id)->first();
            // return a vaild http response
            return response()->json($list1, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating shoppinglist failed: ".$e->getMessage(), 420);
        }
    }



    /**
     * returns 200 if book deleted successfully, throws excpetion if not
     */
    public function delete(int $id) : JsonResponse
    {
        $list = Shoppinglist::with(['user_helper', 'user_creator', 'items', 'comments'])->where('id', $id)->first();
        if ($list != null) {
            $list->delete();
        }
        else
            throw new \Exception("shoppinglist couldn't be deleted - it does not exist");
        return response()->json('shoppinglist ('.$id.') successfully deleted', 200);
    }






}
