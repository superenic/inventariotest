<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueController extends Controller
{
    public function index()
    {
        return view('vue.index');
    }

    public function create()
    {
        return view('vue.create');
    }

    public function edit()
    {
        return view('vue.edit');
    }
}
