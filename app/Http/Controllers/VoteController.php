<?php

namespace App\Http\Controllers;

use App\Mail\VoteConfirmation;
use App\Models\Aspirant;
use App\Models\Position;
use App\Models\State;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class VoteController extends Controller
{
    public function index()
    {
        return Inertia::render('Vote');
    }

    public function vote(Request $request)
    {

        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->with(['error' => 'Incorrect password']);
        }

        $check1 = Auth::user()->votes()->where('position_id', $request->position_id)->exists();
        $check2 = Auth::user()->votes()->where('position_id', '!=', 1)->exists();

        if ($check1) {
            return back()->with(['error' => 'You have already voted for this position']);
        }

        if ($request->position_id != 1 and $check2) {
            return back()->with(['error' => 'You can\'t vote for governorship twice']);
        }

        Auth::user()->votes()->create([
            'position_id' => $request->position_id,
            'aspirant_id' => $request->aspirant_id
        ]);

        $asp = Aspirant::find($request->aspirant_id);
        $asp->total_vote += 1;
        $asp->save();

        $msg = 'You have successfully voted for '.$asp->name;
        Mail::to($request->user())->send(new VoteConfirmation($msg));

        return redirect()->route('dashboard')->with(['success' => 'Your vote has been recorded successfully']);
    }

    public function contestants($type)
    {
        $states = State::all();
        if ($type == 'Presidential') {
            $aspirants =  Aspirant::where('status', 'approved')->where('position_id', 1)->with('party')->get();
        } else {
            $aspirants = Aspirant::where('status', 'approved')->where('position_id', '!=', 1)->with('party', 'state')->get();
        }

        return Inertia::render('Contestants', [
            'aspirants' => $aspirants,
            'states' => $states,
            'type' => $type
        ]);
    }

    public function filterState(Request $request)
    {
        $states = State::all();
        $aspirants = Aspirant::where('status', 'approved')->where('state_id', $request->state)->with('party')->get();
        $type = State::find($request->state)->state;

        return Inertia::render('Contestants', [
            'states' => $states,
            'aspirants' => $aspirants,
            'type' => $type
        ]);
    }

    public function confirm($name, $id)
    {
        $aspirant = Aspirant::find($id);
        $aspirant->load('party', 'state');
        $position = $aspirant->position;

        return Inertia::render('ConfirmVote', [
            'aspirant' => $aspirant,
            'position' => $position
        ]);
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

        return Inertia::render('Results', [
            'aspirants' => $aspirants,
            'category' => $category,
            'states' => $states
        ]);
    }
}
