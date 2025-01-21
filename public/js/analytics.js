// analytics.js

// Dummy data for analytics (can be replaced with real data from backend)
const analyticsData = {
    workoutProgress: {
        totalWorkouts: 25,
        weeklyGoal: 5,
        caloriesBurned: 2000
    },
    dietInsights: {
        avgCalories: 1800,
        proteinIntake: 120,
        waterIntake: 3
    },
    activitySummary: {
        activeHours: 15,
        stepsTaken: 50000,
        restDays: 2
    }
};

// Function to display workout progress
function displayWorkoutProgress() {
    document.getElementById('total-workouts').textContent = `Total Workouts Completed: ${analyticsData.workoutProgress.totalWorkouts}`;
    document.getElementById('weekly-goal').textContent = `Weekly Goal Achieved: ${analyticsData.workoutProgress.weeklyGoal}/7 days`;
    document.getElementById('calories-burned').textContent = `Calories Burned This Week: ${analyticsData.workoutProgress.caloriesBurned} kcal`;
}

// Function to display diet insights
function displayDietInsights() {
    document.getElementById('avg-calories').textContent = `Average Daily Calories Consumed: ${analyticsData.dietInsights.avgCalories} kcal`;
    document.getElementById('protein-intake').textContent = `Protein Intake: ${analyticsData.dietInsights.proteinIntake}g`;
    document.getElementById('water-intake').textContent = `Water Intake: ${analyticsData.dietInsights.waterIntake}L per day`;
}

// Function to display activity summary
function displayActivitySummary() {
    document.getElementById('active-hours').textContent = `Active Hours This Week: ${analyticsData.activitySummary.activeHours} hours`;
    document.getElementById('steps-taken').textContent = `Steps Taken: ${analyticsData.activitySummary.stepsTaken} steps`;
    document.getElementById('rest-days').textContent = `Rest Days: ${analyticsData.activitySummary.restDays} days`;
}

// Call functions to populate data on page load
document.addEventListener('DOMContentLoaded', function() {
    displayWorkoutProgress();
    displayDietInsights();
    displayActivitySummary();
});
