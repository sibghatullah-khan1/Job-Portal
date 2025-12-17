<?php

namespace App\Http\Controllers\afterlogin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    //dashboard
    public function dashboard() {
        return view('afterlogin.dashboard');
    }
    //profile
    public function profile() {
        return view('afterlogin.profile');
    }
    //setting
    public function setting() {
        return view('afterlogin.setting');
    }
    //Your applied jobs
    public function yaj() {
        return view('afterlogin.yaj');
    }
}
