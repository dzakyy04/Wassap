<?php

namespace App\Http\Controllers;

class MyArticlesController extends Controller
{
    public function index()
    {
        return view('dashboard.my-articles.index');
    }
}
