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

       return view('admin.reports.stock-report', compact('products'));
   }
}
