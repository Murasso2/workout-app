// WorkoutModal.jsx
import React, { useState } from 'react';
import Modal from 'react-modal';
import { Inertia } from '@inertiajs/inertia';
import { Head, useForm, Link, usePage } from '@inertiajs/react';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Transition } from '@headlessui/react';
import SelectInput from "@/Components/SelectInput.jsx";



const WorkoutModal = ({ isOpen, onClose, workout_type }) => {



    const { data, setData, errors, post, processing, recentlySuccessful } = useForm({
        reps: '',
        weights: '',
        sets: '',
    });
    const [emptyInputError, setEmptyInputError] = useState(false);
    const [positiveInputError, setPositiveInputError] = useState(false);


    function handleSubmit(e) {
        e.preventDefault();
         // Validation
        if (Object.values(data).some(value => !value.trim())) {
            setEmptyInputError(true);
            return;
        }

        const parsedReps = parseInt(data.reps, 10);
        const parsedWeights = parseFloat(data.weights);
        const parsedSets = parseInt(data.sets, 10);

        if (isNaN(parsedReps) || parsedReps < 0 || isNaN(parsedWeights) || parsedWeights < 0 || isNaN(parsedSets) || parsedSets < 0 ) {
            setPositiveInputError(true);
            return;
        }

        setEmptyInputError(false);
        post(route("workout.store",workout_type.id));

        setData({
            reps: '',
            weights: '',
            sets: '',
        });

    }

    return (
        <Modal isOpen={isOpen} onRequestClose={onClose} contentLabel="Workout Form">
            <div className="flex items-center justify-center h-screen">
                <div className="bg-white p-8 rounded-md w-full max-w-md">
                    <h2 className="text-2xl font-bold mb-6">{workout_type.workout_name}</h2>
                    <form onSubmit={handleSubmit}>
                        <div>
                            <InputLabel htmlFor="Reps:" value="Reps:" />

                            <TextInput
                                id="reps"
                                type="number"
                                name="reps"
                                value={data.reps}
                                onChange={(e) => setData("reps", e.target.value)}
                                className="border rounded w-full py-2 px-3"
                            />
                        </div>
                        <div>
                            <InputLabel htmlFor="Weights:" value="Weights:" />

                            <TextInput
                                id="weights"
                                type="number"
                                name="weights"
                                value={data.weights}
                                onChange={(e) => setData("weights", e.target.value)}
                                className="border rounded w-full py-2 px-3"
                            />

                        </div>
                        <div>
                            <InputLabel htmlFor="Sets:" value="Sets:" />

                            <TextInput
                                id="sets"
                                type="number"
                                name="sets"
                                value={data.sets}
                                onChange={(e) => setData("sets", e.target.value)}
                                className="border rounded w-full py-2 px-3"
                            />
                        </div>

                        {emptyInputError && (
                            <p className="text-red-500 text-sm mb-4">Please fill in all fields.</p>
                        )}
                        {positiveInputError && (
                            <p className="text-red-500 text-sm mb-4">Please enter positive integers for reps and sets and postive number for weights</p>
                        )}

                        <div className="flex items-center gap-4">
                            <button
                                type="submit"
                                className={`bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 ${processing ? 'opacity-50 cursor-not-allowed' : ''}`}
                                disabled={processing}
                            >
                                {processing ? (
                                    <svg className="animate-spin h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 4v.01M12 8V8m0 8h.01M20.3 15a8.017 8.017 0 11-16.033 0 8.017 8.017 0 0116.033 0z"></path>
                                    </svg>
                                ) : (
                                    'Submit'
                                )}
                            </button>

                            <Transition
                                show={recentlySuccessful}
                                enter="transition ease-in-out"
                                enterFrom="opacity-0"
                                leave="transition ease-in-out"
                                leaveTo="opacity-0"
                            >
                                <p className="text-sm text-gray-600">Saved.</p>
                            </Transition>
                        </div>


                    </form>
                </div>
            </div>
        </Modal>
    );
};

export default WorkoutModal;
