<?php
// docker compose exec app php artisan db seed
// docker compose exec app php artisan db:seed --class=UserSeeder
namespace Database\Seeders;

use App\Models\Workout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workouts =  [
            [
                'name' => 'Bench Press',
                'targets' => 'Chest, shoulders, triceps',
                'how_to' => 'Lie on a bench, lower the bar to your chest, and press it back up.',
                'category' => 'Chest'
            ],
            [
                'name' => 'Incline Bench Press',
                'targets' => 'Upper chest, shoulders, triceps',
                'how_to' => 'Perform a bench press on an incline bench, focusing on the upper chest.',
                'category' => 'Chest'
            ],
            [
                'name' => 'Chest Flyes',
                'targets' => 'Chest',
                'how_to' => 'Lie on a bench, hold dumbbells, and open your arms wide, then bring them back to the center.',
                'category' => 'Chest'
            ],
            [
                'name' => 'Decline Bench Press',
                'targets' => 'Lower chest, triceps',
                'how_to' => 'Perform a bench press on a decline bench, focusing on the lower chest.',
                'category' => 'Chest'
            ],
            [
                'name' => 'Dips',
                'targets' => 'Chest, triceps',
                'how_to' => 'Use parallel bars, lower your body by bending your elbows, and push back up.',
                'category' => 'Chest'
            ],

            [
                'name' => 'Overhead Press',
                'targets' => 'Shoulders, triceps',
                'how_to' => 'Press a barbell or dumbbells overhead from shoulder height.',
                'category' => 'Shoulder'
            ],
            [
                'name' => 'Lateral Raises',
                'targets' => 'Shoulders',
                'how_to' => 'Hold dumbbells at your sides and lift your arms out to the sides until they are parallel to the ground.',
                'category' => 'Shoulder'
            ],
            [
                'name' => 'Seated Shoulder Press',
                'targets' => 'Shoulders, triceps',
                'how_to' => 'Sit on a bench with back support, press dumbbells overhead.',
                'category' => 'Shoulder'
            ],

            [
                'name' => 'Bent Over Rows',
                'targets' => 'Upper back, lats, biceps',
                'how_to' => 'Bend at the hips, keep your back straight, and pull a barbell or dumbbells to your lower chest.',
                'category' => 'Back'
            ],
            [
                'name' => 'Pull-Ups',
                'targets' => 'Lats, upper back, biceps',
                'how_to' => 'Hang from a bar with palms facing away, pull your body up until your chin is above the bar.',
                'category' => 'Back'
            ],
            [
                'name' => 'Face Pulls',
                'targets' => 'Rear delts, upper back',
                'how_to' => 'Use a cable machine with a rope attachment, pull the rope towards your face.',
                'category' => 'Back'
            ],

            [
                'name' => 'Barbell Curls',
                'targets' => 'Biceps',
                'how_to' => 'Hold a barbell with an underhand grip and curl it toward your shoulders.',
                'category' => 'Arm'
            ],
            [
                'name' => 'Hammer Curls',
                'targets' => 'Biceps, forearms',
                'how_to' => 'Hold dumbbells with palms facing in, and curl them towards your shoulders.',
                'category' => 'Arm'
            ],
            [
                'name' => 'Tricep Dips',
                'targets' => 'Triceps',
                'how_to' => 'Use parallel bars, lower your body by bending your elbows, and push back up.',
                'category' => 'Arm'
            ],
            [
                'name' => 'Tricep Pushdowns',
                'targets' => 'Triceps',
                'how_to' => 'Use a cable machine with a straight or angled bar attachment, push the bar down with your arms extended.',
                'category' => 'Arm'
            ],
            ['name' => 'Running', 'targets' => 'Cardiovascular system', 'how_to' => 'Cardio exercise involving running or jogging.', 'category' => 'Cardio'],
            ['name' => 'Cycling', 'targets' => 'Cardiovascular system', 'how_to' => 'Cardio exercise on a stationary bike or outdoors.', 'category' => 'Cardio'],
            ['name' => 'Jump Rope', 'targets' => 'Cardiovascular system', 'how_to' => 'Cardio exercise using a jump rope.', 'category' => 'Cardio'],
            ['name' => 'Rowing', 'targets' => 'Cardiovascular system', 'how_to' => 'Cardio exercise on a rowing machine.', 'category' => 'Cardio'],
            // Add more cardio workouts as needed
        ];


        foreach ($workouts as $workout) {
            Workout::create([
                'workout_name' => $workout['name'],
                'targets' => $workout['targets'],
                'how_to' => $workout['how_to'],
                'category'=>$workout['category']
                // Add other fields as needed
            ]);
        }
    }
}
