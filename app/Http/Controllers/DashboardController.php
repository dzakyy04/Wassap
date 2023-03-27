<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $total_articles = Article::with(['user', 'category'])->where('user_id', Auth::user()->id)->get();
        $approved = $total_articles->where('is_approved', true);
        $not_approved = $total_articles->where('is_approved', false);

        return view('dashboard.index', [
            'total_articles' => $total_articles->count(),
            'approved' => $approved->count(),
            'not_approved' => $not_approved->count(),
        ]);
    }
}
