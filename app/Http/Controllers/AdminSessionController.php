<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminSessionController extends Controller
{
    public function create() {

        return view("admin.session.create");
    }

    public function store() {
        $attributes = request()->validate([
            "username" => "required",
            "password" => "required",
        ]);

        if (Auth::guard("admin")->attempt($attributes)) {
            Auth::guard("admin")->user()->last_login = Carbon::now()->toDateTimeString();
            Auth::guard("admin")->user()->save();
            return redirect("/XX_module_c/admin/admins");
        }

        throw ValidationException::withMessages([
            "email" => "User not found"
        ]);
    }

    public function destroy() {
        Auth::guard("admin")->logout();
        return redirect("/XX_module_c/admin")->with("success", "Goody Bye");
    }
 
}
