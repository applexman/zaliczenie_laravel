<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function show()
    {
        return view("transactions");
    }

    public function transfer(Request $request)
    {
        $transaction = $request->validate([
            'receiver_id' => 'required',
            'amount' => 'required|lte'.Auth::user()->balance,
            'title' => 'required',
        ]);
        $transaction['sender_id'] = Auth::user()->id;

        return View("dashboard");
    }
}
