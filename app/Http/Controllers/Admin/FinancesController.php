<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FinancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all()->sortBy('created_at');
        return view('admin.finances.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        $transaction = Transaction::where('id', $id)->get();
        return view('admin.finances.edit', compact('transaction'));
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

        $transaction = Transaction::find($id);
        $user = User::find($transaction->user_id);

        //Пополняем баланс если статус принят
        if($request->edit_status == 'Принят' AND $transaction->status != 'Принят'){
            $new_balance = $user->balance + $transaction->amount;
            $user->balance = $new_balance;
            $user->save();
            echo "pay balance";
        }
        echo $transaction->status . '<br>';
        echo $request->edit_status . '<br>';



        //Если предыдущий статус был принят(зачислены средства пользователю) то онимаем баланс
        if($transaction->status == 'Принят' AND $request->edit_status == 'Отклонён'){
            $user = User::find($transaction->user_id);
            $new_balance = $user->balance - $transaction->amount;
            $user->balance = $new_balance;
            $user->save();
        }

        $transaction->status = $request->edit_status;
        $transaction->save();
        return Redirect::route('finances-admin.index')->with(['success' => 'Статус успешно изменен!']);
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
