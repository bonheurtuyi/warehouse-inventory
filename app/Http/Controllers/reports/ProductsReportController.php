<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Order;
use App\Models\Product;
use http\Env\Request;

class ProductsReportController extends Controller
{
   public function stock()
   {
       $products = Product::all();

       return view('admin.reports.stock-report', compact('products'));
   }
    public function sales( )
    {

        $orders = [];

        return view('admin.reports.sales', compact('orders'));
    }
    public function results(SearchRequest $request)
    {
        $validated = $request->validated();
        $date1 = $validated['date1'];
        $date2 = $validated['date2'];

       $orders = Order::whereBetween('created_at', [
            $date1, $date2
        ])->where('status', 1)->get();

       session()->flash('status', 'Search results');

       return view('admin.reports.sales', compact('orders'));
    }
}
