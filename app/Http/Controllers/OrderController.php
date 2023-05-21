<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }

    public function approved()
    {
        $orders = Order::all()->where('status', 1);

        return view('admin.orders.approved', compact('orders'));
    }

    public function pending()
    {
        $orders = Order::all()->where('status', 0);

        return view('admin.orders.pending', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::where('quantity', '>', 0)->get();
        return view('admin.orders.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = new Order();
        $validated = $request->validated();

        $validated['customer_id'] = $request->input('customer_id');
        $validated['status'] = 0;
        $product = Product::findOrFail($request->product_id);
        $validated['order_total'] = $product->price * $validated['qty'];

        if ($request->validated('qty') > $product->quantity) {
            session()->flash('status', 'The order quantity is greater than the quantity of a product in stock!, Please try again');
            return redirect()->route('orders.index');
        }

        $order->fill($validated);
        $order->save();

        $product->quantity -= $request->validated('qty');
        $product->outQty += $request->validated('qty');
        $product->save();

        session()->flash('status', 'Order created successfully!');
        return redirect()->route('orders.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $validated = $request->all();
        $validated['status'] = 1;
        $order->update($validated);

        session()->flash('status', 'Order approved successfully!');
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->delete();

        session()->flash('status', 'Order deleted successfully!');
        return redirect()->route('orders.index');
    }
}
