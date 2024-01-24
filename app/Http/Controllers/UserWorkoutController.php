<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserWorkoutController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());

        if (!$user) {
            // Handle the case where the user is not found, maybe redirect or return an error
            return response()->json(['error' => 'User not found'], 404);
        }

        $userWorkouts = $user->workouts;
        $userWorkoutPivots = $userWorkouts->map->pivot->all();
        $workoutNames = $userWorkouts->pluck('workout_name')->all();

        return Inertia::render('UserWorkout/All', [
            'userworkouts' => $userWorkoutPivots,
            'workoutnames' => $workoutNames,
        ]);
    }
}
