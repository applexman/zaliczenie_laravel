<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $user= User::find(Auth::user()->id);
        if ($user->role("admin")) {
            return view("admin.index");
        } else {
            return view("dashboard");
        }
    }
    public function create()
    {
        $user= User::find(Auth::user()->id);
        if ($user->role("admin")) {
            return view("admin.create");
        } else {
            return view("dashboard");
        }
    }
    public function edit()
    {
        $user= User::find(Auth::user()->id);
        if ($user->role("admin")) {
            return view("admin.edit");
        } else {
            return view("dashboard");
        }
    }
}
