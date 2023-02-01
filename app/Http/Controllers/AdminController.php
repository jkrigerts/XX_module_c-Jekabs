<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admins() {
        $data = AdminUser::all();
        return view("admin.dashboard.admins", ['admins' => $data]);
    }
}
