// In UserWorkout.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWorkout extends Model
{
    use HasFactory;

    protected $table = 'user_workout';

    protected $fillable = ['user_id', 'workout_id', 'date_completed', 'reps', 'weights'];

    // You can add relationships or custom methods as needed

    // Example of a relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Example of a relationship to the Workout model
    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }
}
