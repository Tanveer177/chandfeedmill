<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory\InventoryItem;
use App\Http\Requests\Inventory\InventoryItemRequest;

class InventoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $items = InventoryItem::paginate(10);
        // dd($items);
        return view('inventory.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventoryItemRequest $request)
    {
        InventoryItem::create($request->validated());
        return redirect()->route('inventory-items.index')->with('success', 'Inventory item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InventoryItem $inventoryItem)
    {
        return view('inventory.edit', ['item' => $inventoryItem]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventoryItemRequest $request, InventoryItem $inventoryItem)
    {
        $inventoryItem->update($request->validated());
        return redirect()->route('inventory-items.index')->with('success', 'Inventory item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventoryItem $inventoryItem)
    {
        $inventoryItem->delete();
        return redirect()->route('inventory-items.index')->with('success', 'Inventory item deleted successfully.');
    }
}
