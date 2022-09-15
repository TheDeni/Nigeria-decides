<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirant;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        $voters = User::where('role', 'user')->latest()->get();
        $approved_aspirants = Aspirant::where('status', 'approved')->latest()->get();
        $pending_aspirants = Aspirant::where('status', 'pending')->latest()->get();
        $presidential = Aspirant::where('position_id', 1)->get();
        $gubernitorial = Aspirant::where('position_id', '!=', 1)->get();


        return Inertia::render('Admin/Index', [
            'voters' => $voters,
            'approved_aspirants' => $approved_aspirants,
            'pending_aspirants' => $pending_aspirants,
            'presidential' => $presidential,
            'gubernitorial' => $gubernitorial
        ]);
    }

}
