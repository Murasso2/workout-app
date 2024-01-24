import React, { useState } from 'react';
import WorkoutModal from './Workout-modal';

const WorkoutCard = ({ workout_type }) => {
    const [isFormOpen, setIsFormOpen] = useState(false);

    const handleCardClick = () => {
        setIsFormOpen(true);
    };

    return (
        <div className="flex justify-center items-center mb-8">
            <div
                className="bg-white p-8 border border-gray-200 rounded-md cursor-pointer transition-transform transform hover:scale-105"
                onClick={handleCardClick}
                style={{ width: '300px', height: '250px' }}
            >
                <h3 className="text-xl font-semibold text-gray-800">{workout_type.workout_name}</h3>
                <p className="text-gray-600"><strong>Targets:</strong> {workout_type.targets}</p>
                <p className="text-gray-600"><strong>How to:</strong> {workout_type.how_to}</p>
            </div>

            <WorkoutModal isOpen={isFormOpen} onClose={() => setIsFormOpen(false)} workout_type={workout_type} />
        </div>
    );
};

export default WorkoutCard;
