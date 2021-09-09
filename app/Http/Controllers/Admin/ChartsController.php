<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function chartUser(Request $request)
    {
        $users = User::all();

        return 
        response(json_encode($users), 200)->header('Content-type', 'text/plain');
    }
}
