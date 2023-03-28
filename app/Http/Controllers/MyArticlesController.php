<?php

namespace App\Http\Controllers;

class MyArticlesController extends Controller
{
    public function index()
    {
        return view('dashboard.my-articles.index');
    }

    public function approved() {
        return view('dashboard.my-articles.approved');
    }

    public function not_approved() {
        return view('dashboard.my-articles.not-approved');
    }
}