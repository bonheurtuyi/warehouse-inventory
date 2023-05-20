<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index')
            ->with(["customers"=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();
        Customer::create($validated);

        session()->flash('status', 'Customer added successfully!');
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($customerId)
    {
        $customer = Customer::findOrFail($customerId);

        return view('admin.customers.edit')
            ->with(["customer"=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, $customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $validated = $request->validated();
        $customer->update($validated);

        session()->flash('status', 'Customer updated successfully!');
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customerId)
    {
        $customer = Customer::findOrFail($customerId);
        $customer->delete();

        session()->flash('status', 'Customer deleted successfully!');
        return redirect()->route('customers.index');
    }
}
