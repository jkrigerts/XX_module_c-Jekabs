<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $data = User::all();
        return view("user.index", ['users' => $data]);
    }
    
    public function show(User $user) {
        return view("user.show", [
            "user" => $user
        ]);
    }

    public function update(Request $request) {
        $attributes = $request->validate([
            "status_id" => "required",
            "user_id" => "required",
        ]);
        User::where("id", $attributes["user_id"])
            ->update(["status_id" => $attributes["status_id"]]);
        
        return redirect("/XX_module_c/user");
    }

    public function signup(Request $request) {
        $attributes = $request->validate([
            "username" => "required|min:4|max:60|unique:users,username",
            "password" => "required|string|min:8|max:65536"
        ]);

        $user = User::create([
            "username" => $attributes["username"],
            "password" => bcrypt($attributes["password"])
        ]);

        $token = $user->createToken("sanctum-token")->plainTextToken;

        $response = [
            "status" => "success",
            "token" => $token
        ];

        return response($response, 201);
    }

    public function signin(Request $request) {
        $attributes = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        $user = User::where("username", $attributes["username"])->first();
        if (!$user || !Hash::check($attributes["password"], $user->password)) {
            return response([
                "status" => "invalid",
                "message" => "Wrong username or password"
            ], 401);
        }

        $token = $user->createToken("sanctum-token")->plainTextToken;

        $response = [
            "status" => "success",
            "token" => $token
        ];

        return response($response, 200);
    }

    public function signout(Request $request) {
        $request->user()->tokens()->delete();

        return response(["status" => "success"], 200);
    }
}
