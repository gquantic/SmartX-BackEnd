<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $parts = \App\Models\Part::where('user_id', \Illuminate\Support\Facades\Auth::id())->get();
        $investedQuantity = 0;
        $investedAmount = 0;

        foreach ($parts as $part) {
            $product = Product::where('id', $part->product_id)->first();
            $price = round(($product->need_funds / $product->shares) * $part->quantity);

            $investedQuantity += $part->quantity;
            $investedAmount += $price;
        }

        return view('profile.index', compact('investedQuantity', 'investedAmount'));
    }
}
