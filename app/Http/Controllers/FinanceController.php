<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FinanceController extends Controller
{
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
}
