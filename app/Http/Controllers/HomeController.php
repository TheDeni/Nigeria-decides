<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function go()
    {
        if (Auth::user()->role == 'admin') {
            return Inertia::render('Loading', ['url' => '/admin']);
        }
        return Inertia::render('Loading', ['url' => '/dashboard/user']);
    }

    public function index()
    {
        return Inertia::render('Dashboard');
    }

    public function vote()
    {
        return Inertia::render('Vote');
    }
}
