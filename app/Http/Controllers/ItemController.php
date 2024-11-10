<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Get the sorting column and sorting order from the request, defaulting to 'id' and 'asc'
    $sortBy = $request->get('sortBy', 'id');
    $sortOrder = $request->get('sortOrder', 'asc');

    $search = $request->get('search');

    // Fetch the items and sort them according to the specified column and order
    $items = Item::where('user_id', auth()->id())->when($search, function ($query, $search) {
        return $query->where('name', 'LIKE', "%{$search}%")
                     ->orWhere('description', 'LIKE', "%{$search}%");
    })
    ->orderBy($sortBy, $sortOrder)
    ->paginate(5);

    return view('items.index', [
        'items' => $items,
        'sortBy' => $sortBy,
        'sortOrder' => $sortOrder,
        'search' => $search
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'quantity' => 'required|integer|min:1', 
            'price' => 'required|numeric|min:1'   
        ]);

        item::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'user_id' => auth()->id(), 
            ]
        ); 

        return redirect('items')->with('message', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'quantity' => 'required|integer|min:1', 
            'price' => 'required|numeric|min:1'   
        ]);

        $item->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'user_id' => auth()->id(), 
            ]
        ); 

        return redirect('items')->with('status', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(item $item)
    {
        $item->delete();
        return redirect('items')->with('delete_status', 'Item deleted successfully');
    }
}
