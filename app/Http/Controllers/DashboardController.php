<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $total_news = Article::with(['user', 'category'])->where('user_id', Auth::user()->id)->get();
        $approved = $total_news->where('is_approved', true);
        $not_approved = $total_news->where('is_approved', false);

        return view('dashboard.index', [
            'total_news' => $total_news->count(),
            'approved' => $approved->count(),
            'not_approved' => $not_approved->count(),
        ]);
    }
}
