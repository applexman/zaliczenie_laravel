<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Loan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function index()
    {
        $userLoan = Loan::where('user_id', Auth::user()->id)
            ->orderByDesc('created_at')
            ->get();

        return view("loan.index", ["userLoan" => $userLoan]);
    }

    public function getLoan()
    {
        return view("loan.get");
    }

    public function addLoan(Request $request): RedirectResponse
    {
        $request->validate([
            'amount' => 'required',
        ]);

        $loan = new Loan([
            'user_id' => Auth::user()->id,
            'amount' => $request->input('amount'),
        ]);

        $user = User::find(Auth::user()->id);
        $user->balance += $request->input('amount');
        if ($loan->save() && $user->save()) {
            return redirect("loan.index");
        } else {
            return redirect("loan.get");
        }
    }

    public function payLoan($id): RedirectResponse
    {
        $loan = Loan::find($id);
        $user = User::find(Auth::user()->id);
        if ($user->balance < $loan->amount) {
            return redirect("loan.index")->with("error", "Masz za mało środków na koncie do spłaty!");
        } else {
            $user->balance -= $loan->amount;
            if ($loan->delete() && $user->save()) {
                return redirect("loan.index");
            } else {
                return redirect("dashboard");
            }
        }
    }
}
