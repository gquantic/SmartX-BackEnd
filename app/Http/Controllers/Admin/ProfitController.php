<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Part;
use App\Models\Product;
use App\Models\ProfitProduct;
use Illuminate\Support\Facades\Redirect;

class ProfitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product)
    {
        return view('admin.profit.create', ['product_id' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //количество долей
        $product = Product::find($request->product_id);

        //Стоимость доли
        $price = $request->profit / $product['shares'];

        $parts = Part::all()->where('product_id', $request->product_id);

        foreach ($parts as $part){
            //сумма для зачисления дольщику
            $sum = $part['quantity'] * $price;
            $user = User::find($part['user_id']);
            $new_ref_balance = $user->referral_balance + $sum;
            $user->referral_balance = $new_ref_balance;
            $user->save();
        }

        ProfitProduct::create([
            'product_id' => $request->product_id,
            'income' => $request->income,
            'cost' => $request->cost,
            'profit' => $request->profit,
        ]);

        return Redirect::route('products-admin.index')->with(['success' => 'Доли распределены успешно!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
