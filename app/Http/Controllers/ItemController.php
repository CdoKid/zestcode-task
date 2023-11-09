<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Http\Response;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display the items.
     */
    public function index()
    {
        $items = Item::all();

        return response()->json([
            'items'=>$items
        ]);
            
    }

    /**
     * Handle an incoming item request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc'=> 'nullable|string|max:255',
            'price' => 'required|numeric|min:0.01'
        ]);

        $item = Item::create([
            'name' => $request->name,
            'description' => $request->desc,
            'price' => $request->price
        ]);

        $item->save();

        return redirect()->route('dashboard')->with('success', 'Item created successfully');
    }

    /**
     * Delete an item.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $item = Item::find($request->id);

        if (!$item) {
            // Handle the case where the item doesn't exist
            return redirect()->route('dashboard')->with('error', 'Item not found');
        }
    
        // Delete the item
        $item->delete();
    
        return redirect()->route('dashboard')->with('success', 'Item deleted successfully');
    }
}
