<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    function user_center() {
        $user = Auth::user();
        return view('user_center',compact('user'));
    }
}
