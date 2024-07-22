<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function page2(Request $request)
    {
        $username0 = $request->username;
        return view('page2', compact('username0'));
    }
}
