<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsReportController extends Controller
{
   public function stock()
   {
       $products = Product::all();
       $total = 0;

       foreach (Product::find(1)->orders as $order)
       {
           $total +=$order->qty;
       }
//       dd($total+Product::find(1)->quantity);

       return view('admin.reports.stock-report', compact('products', 'total'));
   }
}
