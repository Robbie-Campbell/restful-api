<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $item = new Item;
        $item->name = $request->item['name'];
        $item->save();
        return $item;
    }

    public function update(Request $request, $existingItem)
    {
        $item = Item::find($existingItem);
        if ($item)
        {
            $item->completed = $request->item['completed'] ? true : false;
            $item->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $item->save();
            return $item;
        }
        return "Item Not Found";
    }

    public function destroy($existingItem)
    {
        $item = Item::find($existingItem);
        if ($item)
        {
            $item->delete();
            return $item;
        }
        return "Item Not Found";
    }
}
