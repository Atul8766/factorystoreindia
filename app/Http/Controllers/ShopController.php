<?php 
namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    // Show all shops
    public function index()
    {
        $shops = Shop::all(); // Get all shops
        return view('admin.shops.index', compact('shops')); // Pass data to the view
    }

    // Show create form
    public function create()
    {
        return view('admin.shops.create');
    }

    // Store a new shop
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'address' => 'required',
            'status' => 'required|boolean',
        ]);

        $shop = new Shop();
        $shop->name = $request->name;
        if ($request->hasFile('logo')) {
            $shop->logo = $request->logo->store('logos'); // Save logo in storage/logos
        }
        $shop->address = $request->address;
        $shop->status = $request->status;
        $shop->save();

        return redirect()->route('admin.shops.index')->with('success', 'Shop created successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        return view('admin.shops.edit', compact('shop'));
    }

    // Update an existing shop
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'address' => 'required',
            'status' => 'required|boolean',
        ]);

        $shop = Shop::findOrFail($id);
        $shop->name = $request->name;
        if ($request->hasFile('logo')) {
            $shop->logo = $request->logo->store('logos');
        }
        $shop->address = $request->address;
        $shop->status = $request->status;
        $shop->save();

        return redirect()->route('admin.shops.index')->with('success', 'Shop updated successfully.');
    }

    // Delete a shop
    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);
        $shop->delete();

        return redirect()->route('admin.shops.index')->with('success', 'Shop deleted successfully.');
    }
}
