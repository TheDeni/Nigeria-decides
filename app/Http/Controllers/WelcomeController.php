<?php

namespace App\Http\Controllers;

use App\Models\Aspirant;
use App\Models\Party;
use App\Models\Position;
use App\Models\State;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index()
    {
        $states = State::all();
        $parties = Party::all();
        return Inertia::render('Aspire', [
            'states' => $states,
            'parties' => $parties,
        ]);
    }


    public function aspirant(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'aspirant_image' => 'required|mimes:png,jpg',
            'party_id' => 'required|integer',
            'state_id' => 'nullable|integer',
            'bio' => 'required|string|',
        ]);
        $filename = '';
        if ($request->hasFile('aspirant_image')) {
            $ext = $request->file('aspirant_image')->getClientOriginalExtension();
            $filename = time() . uniqid() . '.' . $ext;
            $request->file('aspirant_image')->storeAs('public/aspirant', $filename);

            $position_id = 0;
            $state_id = 0;
            if ($request->position_id == 'president') {
                $position = Position::firstOrCreate(['name' => 'president', 'state_id' => 0]);
                $position_id = $position->id;
            } else {
                $position = Position::firstOrCreate(['state_id' => $request->state_id, 'name' => 'Gubernitorial']);
                $position_id = $position->id;
                $state_id = $request->state_id;
            }

            $aspirant = Aspirant::create([
                'name' => $request->name,
                'email' => $request->email,
                'position_id' => $position_id,
                'aspirant_image' => $filename,
                'party_id' => $request->party_id,
                'state_id' => $state_id,
                'bio' => $request->bio,
            ]);
        }

        return Inertia::render('Success', [
            'aspirant' => $aspirant
        ]);

    }


    public function allGuber()
    {
        $states = State::all();
        $aspirants = Aspirant::where('status', 'approved')->where('position_id', '!=', 1)->with('party', 'state')->get();
        return Inertia::render('Guber', [
            'aspirants' => $aspirants,
            'states' => $states,
        ]);
    }

    public function filterState(Request $request)
    {
        $states = State::all();
        $aspirants = Aspirant::where('status', 'approved')->where('state_id', $request->state)->with('party', 'state')->get();

        return Inertia::render('Guber', [
            'states' => $states,
            'aspirants' => $aspirants,
        ]);
    }

    public function allPresidents()
    {
        $aspirants =  Aspirant::where('status', 'approved')->where('position_id', 1)->with('party', 'state')->get();
        return Inertia::render('Presidential_Aspirants', [
            'aspirants' => $aspirants,
        ]);
    }

    public function bio($id)
    {
        return Inertia::render('Bio');
    }


    public function addPositions()
    {
        for ($i = 2; $i < 36; $i++) {
            Position::create([
                'name' => 'Gubernitorial',
                'state_id' => $i
            ]);
        }
    }


}
