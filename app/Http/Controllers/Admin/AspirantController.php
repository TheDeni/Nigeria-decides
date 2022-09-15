<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use App\Models\Aspirant;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class AspirantController extends Controller
{

    public function aspirants($status)
    {
        if ($status == 'all') {
            $aspirants = Aspirant::with('party', 'position.state')->latest()->get();
        } elseif ($status == 'presidential') {
            $aspirants = Aspirant::where('position_id', 1)->latest()->with('position', 'party')->get();
        }elseif ($status == 'gubernitorial') {
            $aspirants = Aspirant::where('position_id', '!=', 1)->latest()->with('party', 'position.state')->get();
        }
        else {
            $aspirants = Aspirant::where('status', $status)->with('party', 'position.state')->latest()->get();
        }


        return Inertia::render('Admin/Aspirants', [
            'aspirants' => $aspirants,
            'status' => $status
        ]);
    }

    public function action(Request $request)
    {
        $aspirant = Aspirant::find($request->id);
        $aspirant->status = $request->action . 'd';
        $aspirant->save();

        $message = 'We have carefully reviewd your aspirant request and the status has been updated to '. $request->action;
        $title = 'Status update';

        Mail::to($aspirant)->send(new NotificationMail($title, $message, $aspirant));

        return back()->with(['success' => 'Operation carried out successfully']);
    }

    public function edit(Aspirant $aspirant)
    {
        return Inertia::render('Admin/Aspirant', ['aspirant' => $aspirant]);
    }

    public function update(Aspirant $aspirant, Request $request)
    {
        $aspirant->name = $request->name;
        $aspirant->email = $request->email;
        $aspirant->bio = $request->bio;

        if ($request->hasFile('aspirant_image')) {
            $ext = $request->file('aspirant_image')->getClientOriginalExtension();
            $filename = time() . uniqid() . '.' . $ext;
            $request->file('aspirant_image')->storeAs('public/aspirant', $filename);

            $aspirant->aspirant_image = $filename;
        }

        $aspirant->save();

        return back()->with(['success' => 'Profile updated successfully']);
    }

    public function results($state_id)
    {
        $aspirants = Aspirant::where('status', 'approved')->where('state_id', $state_id)->orderBy('total_vote')->with('party')->get();
        $states = State::all();

        if ($state_id == 0) {
            $category = 'Presidential';
        } else {
            $category = State::find($state_id)->state;
            $category .= ' State';
        }

        return Inertia::render('Admin/Results', [
            'aspirants' => $aspirants,
            'category' => $category,
            'states' => $states
        ]);
    }
}
