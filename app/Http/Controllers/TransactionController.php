<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class TransactionController extends Controller
{
    public function index()
    {
        return view("transactions");
    }

    public function show()
    {
        $userTransaction = Transaction::where('sender_id', Auth::user()->id)
            ->orWhere('receiver_id', Auth::user()->id)
            ->orderByDesc('created_at')
            ->get();

        return view("dashboard", ['userTransaction' => $userTransaction]);
    }

    public function transfer(Request $request): RedirectResponse
    {
        $request->validate([
            'receiver_id' => 'required|numeric',
            'amount' => 'required|lte:' . Auth::user()->balance,
            'title' => 'required',
        ]);
        $transaction = new Transaction([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $request->input('receiver_id'),
            'amount' => $request->input('amount'),
            'title' => $request->input('title'),
        ]);

        if ($transaction->receiver_id != Auth::user()->id) {

            $sender = User::find(Auth::user()->id);
            $sender->balance -= ($request->input('amount'));

            $receiver = User::find($request->input('receiver_id'));
            if ($receiver) {
                $receiver->balance += ($request->input('amount'));
            } else {
                return redirect('transactions')->with(['error' => 'Nie znaleziono użytkownika']);
            }

            if ($transaction->save() && $sender->save() && $receiver->save()) {
                return redirect('dashboard');
            } else {
                return redirect('dashboard');
            }
        } else {
            return redirect('transactions')->with("error", "Nie możesz przelewać samemu sobie!");;
        }
    }
}
