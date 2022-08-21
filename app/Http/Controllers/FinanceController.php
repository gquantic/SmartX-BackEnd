<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FinanceController extends Controller
{

    
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('profile.finances', compact('transactions'));
    }

    public function post(Request $request)
    {
        if (Auth::user()->balance < $request->post('amount')) {
            return Redirect::back()->withErrors(['msg' => 'На балансе недостаточно средств']);
        }

        if ($request->post('amount') < 100) {
            return Redirect::back()->withErrors(['msg' => 'Минимальная сумма для перевода составляет 100 рублей!']);
        }

        Auth::user()->update(['balance' => Auth::user()->balance - $request->post('amount')]);

        $toUser = User::find($request->post('to'));
        $toUser->update([
            'balance' => $toUser->balance + $request->post('amount')
        ]);

        return Redirect::back()->with(['success' => 'Сумма успешно переведена']);
    }

    public function addDeposit(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|integer|',
            'communication_method' => 'required',
            'communication_contact' => 'required',
        ]);

        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->type = 'input';
        $transaction->amount = $validated['amount'];
        $transaction->communication_method = $validated['communication_method'];
        $transaction->communication_contact = $validated['communication_contact'];
        $transaction->status = 'NEW';
        
        $transaction->save();
        return redirect()->route('finances');
        dd($validated);
    }
}
