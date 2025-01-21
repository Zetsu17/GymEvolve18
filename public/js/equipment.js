function updateWorkoutPlan() {
    const level = document.getElementById('fitnessLevel').value;
    
    // Log the selected level to the console
    console.log("Selected fitness level: ", level);

    // Or use an alert for pop-up debugging
    // alert("Selected fitness level: " + level);
    
    const workoutPlan = document.getElementById('workoutPlan');
    
    if (level === 'beginner') {
        workoutPlan.innerHTML = `
            <h3>Beginner Workouts</h3>
            <div class="workout-card">
                <h4>1. Dumbbell Chest Press</h4>
                <p>3 sets of 12 reps</p>
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="workout-card">
                <h4>2. Dumbbell Rows</h4>
                <p>3 sets of 12 reps</p>
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
            </div>
        `;
    } else if (level === 'intermediate') {
        workoutPlan.innerHTML = `
            <h3>Intermediate Workouts</h3>
            <div class="workout-card">
                <h4>1. Barbell Squats</h4>
                <p>4 sets of 10 reps</p>
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="workout-card">
                <h4>2. Deadlifts</h4>
                <p>4 sets of 10 reps</p>
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
            </div>
        `;
    } else if (level === 'advanced') {
        workoutPlan.innerHTML = `
            <h3>Advanced Workouts</h3>
            <div class="workout-card">
                <h4>1. Clean and Press</h4>
                <p>5 sets of 6 reps</p>
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="workout-card">
                <h4>2. Pull-ups</h4>
                <p>5 sets of 10 reps</p>
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
            </div>
        `;
    }
}
