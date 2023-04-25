<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $total_articles = Article::with(['user', 'category'])->where('user_id', Auth::user()->id)->get();
        $approved = $total_articles->where('is_approved', true);
        $not_approved = $total_articles->where('is_approved', false);

        $total_users = User::where('is_admin', 0)->get()->count();
        $total_admin = User::where('is_admin', 1)->get()->count();
        $all_articles = Article::with(['user', 'category'])->get();
        $all_approved = $all_articles->where('is_approved', true);
        $all_not_approved = $all_articles->where('is_approved', false);


        return view('dashboard.index', [
            'total_articles' => $total_articles->count(),
            'approved' => $approved->count(),
            'not_approved' => $not_approved->count(),
            'total_users' => $total_users,
            'total_admin' => $total_admin,
            'all_articles' => $all_articles->count(),
            'all_approved' => $all_approved->count(),
            'all_not_approved' => $all_not_approved->count()
        ]);
    }
}
