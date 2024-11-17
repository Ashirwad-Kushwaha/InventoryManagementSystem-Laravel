<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Item;
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
'items' => 'required|array',
'items.*.item_id' => 'required|exists:items,id',
'items.*.quantity' => 'required|integer|min:1',
]);

// Create a new bill
$totalAmount = 0;
$bill = Bill::create(['total_amount' => $totalAmount]);

foreach ($request->items as $itemData) {
$item = Item::findOrFail($itemData['item_id']);
$totalPrice = $item->price * $itemData['quantity'];
$totalAmount += $totalPrice;

// Create bill items
BillItem::create([
'bill_id' => $bill->id,
'item_id' => $item->id,
'quantity' => $itemData['quantity'],
'total_price' => $totalPrice,
]);
}

// Update total amount in bill
$bill->update(['total_amount' => $totalAmount]);

return redirect()->route('sales.index')->with('status', 'Bill created successfully.');
}
}