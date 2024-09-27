<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Create a new item and save it to the database
        Item::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Redirect back with a success message
        return redirect('/')->with('success', 'Item created successfully!');
    }
    public function view()
    {
        // Retrieve all items from the database
        $items = Item::all();

        // Pass the items to the 'view.blade.php' view
        return view('view', ['items' => $items]);
    }
    public function edit($id)
    {
        // Find the item by ID
        $item = Item::find($id);

        // Pass the item to the edit view
        return view('edit', compact('item'));
    }
    // Update the item in the database
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Find the item and update it
        $item = Item::find($id);
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->save();

        // Redirect back with success message
        return redirect('/view')->with('success', 'Item updated successfully!');
    }
    // Delete the item from the database
    public function destroy($id)
    {
        // Find the item by ID and delete it
        $item = Item::find($id);
        $item->delete();

        // Redirect back with success message
        return redirect('/view')->with('success', 'Item deleted successfully!');
    }
}
