// Dashboard.jsx
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import WorkoutCard from './Partial/Workout-card';  // Adjust the import path
import { usePage } from '@inertiajs/inertia-react';

export default function Dashboard({ auth, workout_types }) {
    return (
        <AuthenticatedLayout
         
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">


                    <div className="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        {/* Replace the existing content with WorkoutCard components */}
                        {workout_types.map((workout_type) => (
                            <WorkoutCard key={workout_type.id} workout_type={workout_type} />
                        ))}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
