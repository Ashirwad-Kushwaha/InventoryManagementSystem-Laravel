<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('sales.index', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $item = Item::findOrFail($request->item_id);
        $totalPrice = $item->price * $request->quantity;

        // Create a new sale record
        Sale::create([
            'item_id' => $item->id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('sales.index')->with('status', 'Sale recorded successfully.');
    }
}
