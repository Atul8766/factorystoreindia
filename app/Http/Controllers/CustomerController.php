<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {

        $customers = Customer::with('shop')
            ->where('user_id', auth()->id())
            ->get()
            ->toArray();
        return view('user.customers.index', compact('customers'));
    }

    public function create()
    {
        $shops = Shop::where('status', '1')->get();
        return view('user.customers.create', compact('shops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'shop' => 'required|string|max:255',
        ]);

        $existingCustomer = DB::table('customers')
            ->where('phone', $request->phone)
            ->where('created_at', '>=', now()->subHours(48))
            ->first();

        if ($existingCustomer) {
            return back()->withErrors(['phone' => 'This phone number has been used in the last 48 hours.']);
        }

        // Create a new customer record with the current authenticated user's ID
        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'shop' => $request->shop,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit(Customer $customer)
    {
        $shops = Shop::where('status', '1')->get();
        return view('user.customers.edit', compact('customer', 'shops'));
    }

    public function update(Request $request, Customer $customer)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'shop' => 'required|string|max:255',
        ]);

        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
