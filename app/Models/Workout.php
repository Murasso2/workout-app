<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = ['workout_name', 'description'];

    // Define relationships
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_workout')
                    ->withPivot('reps', 'weights','sets')
                    ->withTimestamps();
    }

}
