<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    //
    public function welcome() {
        return view('welcome');
    }

    public function about() {
        return view('about');
    }

    public function services() {
        return view('services');
    }

    public function contact() {
        return view('contact');
    }

    public function companies() {
        return view('companies');
    }

    public function jobs() {
        return view('jobs.jobs');
    }

    public function show() {
        return view('jobs.single');
    }
}