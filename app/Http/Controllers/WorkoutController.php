<?php

namespace App\Http\Controllers;

use App\Models\UserWorkout;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class WorkoutController extends Controller
{
    public function index()
    {
        $workoutTypes = Workout::all();

        return Inertia::render('Workout/All', [
            'workout_types' => $workoutTypes,
        ]);
    }
    public function new($id) {

        return Inertia::render('Workout/New', [
            'word' => 'hello',
        ]);
    }
    public function store($id, Request $request)
    {
        $validatedData = $request->validate([
            'reps' => 'required|integer',
            'weights' => 'required|numeric',
            'sets' => 'required|integer',
        ]);
        $workout=Workout::find($id);
        // return $workout->users();


        // Associate the workout with the authenticated user and save additional information in the pivot table
        $workout->users()->attach(Auth::user()->id, [
            'reps' => $validatedData['reps'],
            'weights' => $validatedData['weights'],
            'sets' => $validatedData['sets'],
        ]);
        // Redirect back to the form with a success message
        return redirect()->route('workout.index')->with('successMessage', 'Workout data stored successfully');
    }

}
