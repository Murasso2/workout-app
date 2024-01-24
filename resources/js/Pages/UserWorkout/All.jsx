// Dashboard.jsx
import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { usePage } from '@inertiajs/react';

export default function Dashboard({ auth, userworkouts, workoutnames }) {
  return (
    <AuthenticatedLayout
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
    >
      <Head title="Dashboard" />

      <div className="py-12 flex justify-center items-center">
        <div className="max-w-full mx-auto sm:px-6 lg:px-8">
          {userworkouts.length == 0 ? (
            <p className="text-center text-gray-500">No workouts yet. Start exercising!</p>
          ) : (
            userworkouts.map((userworkout, index) => (
              <div key={index} className="mb-4 w-80 bg-white p-4 rounded-md shadow-md">
                <h1>{workoutnames[index]}</h1>
                <p>Reps: {userworkout.reps}</p>
                <p>Weights: {userworkout.weights}</p>
                <p>Sets: {userworkout.sets}</p>
              </div>
            ))
          )}
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
