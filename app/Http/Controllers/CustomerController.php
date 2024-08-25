<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('shop')->get()->toArray();
        // dd($customers);
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
        // Create a new customer record
        Customer::create($request->only(['name', 'phone', 'shop']));
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit(Customer $customer)
    {
        $shops = Shop::where('status', '1')->get();
        return view('user.customers.edit', compact('customer','shops'));
    }

    public function update(Request $request, Customer $customer)
    {
        // dd($request->all());
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
