<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        if ($user->role("admin")) {
            $users = User::all();
            return view("admin.index", ["users" => $users]);
        } else {
            return redirect("dashboard");
        }
    }
    public function create()
    {

        $user = User::find(Auth::user()->id);
        if ($user->role("admin")) {

            return view("admin.create");
        } else {
            return redirect("dashboard");
        }
    }
    public function edit($id)
    {
        $user = User::find(Auth::user()->id);
        if ($user->role("admin")) {
            $user=User::find($id);
            return view("admin.edit", ["user"=> $user]);
        } else {
            return redirect("dashboard");
        }
    }
    public function createUser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required | min:2',
            'email' => 'required | min:5 | email',
            'password' => 'required| min:8',
            'role' => 'required',
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $role = $request->input('role');


        if (DB::insert('insert into users(name, email, password, role) values(?,?,?,?)', [$name, $email, $password, $role])) {
            return redirect('admin.index');
        } else {
            return redirect('admin.create');
        }
    }

    public function deleteUser($id): RedirectResponse
    {
        $user = User::find($id);
        if ($user->delete()) {
            return redirect('admin.index');
        } else {
            return redirect('admin.index');
        }
    }

    public function editUser(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required | min:2',
            'email' => 'required | min:5 | email',
            'role' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        if ($user->save()) {
            return redirect('admin.index');
        } else {
            return redirect('admin.create');
        }
    }
}
