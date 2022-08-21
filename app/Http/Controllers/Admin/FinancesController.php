<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinancesController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all()->sortBy('created_at');
        return view('admin.finances.index', compact('transactions'));
    }
}
