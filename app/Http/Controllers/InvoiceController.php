<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Order;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function approved()
    {
        $invoices = Invoice::all()->where('status', 1);
        return view('admin.invoices.approved', compact('invoices'));
    }

    public function pending()
    {
        $invoices = Invoice::all()->where('status', 0);
        return view('admin.invoices.pending', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all()->where('status', 1);
        return view('admin.invoices.create', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        Invoice::create($request->validated());
        session()->flash('status', 'Invoice created successfully!');

        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, $invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $validated = $request->all();
        $validated['status'] = 1;
        $invoice->update($validated);

        session()->flash('status', 'Invoice approved successfully!');
        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
