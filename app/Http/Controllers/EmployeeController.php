<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        if ($user->role("admin") || $user->role("employee")) {
            $transactions = Transaction::orderBy('created_at','desc')->get();
            return view("employee", ['transactions' => $transactions]);
        } else {
            return redirect("dashboard");
        }
    }
}
