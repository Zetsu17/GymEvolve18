document.addEventListener('DOMContentLoaded', function () {
    // Fetch workout data for 'equipment' workouts
    fetch('php/workout.php?type=equipment')  // Pass 'equipment' as the query parameter
        .then(response => response.json())
        .then(data => {
            const workoutList = document.getElementById('workout-list');
            
            if (data.error) {
                workoutList.innerHTML = `<p>${data.error}</p>`;
                return;
            }

            // Loop through the workout data and append it to the page
            data.forEach(workout => {
                const workoutItem = document.createElement('div');
                workoutItem.classList.add('workout-item');
                workoutItem.innerHTML = `
                    <img src="../assets/images/${workout.image}" alt="${workout.name}">
                    <h3>${workout.name}</h3>
                    <p>${workout.description}</p>
                `;
                workoutList.appendChild(workoutItem);
            });
        })
        .catch(error => {
            console.error('Error fetching workouts:', error);
        });
});
