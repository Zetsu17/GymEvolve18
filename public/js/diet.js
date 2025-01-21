// diet.js

// Function to calculate daily calorie intake based on activity level
function calculateCalories() {
    const age = document.getElementById('age').value;
    const weight = document.getElementById('weight').value;
    const height = document.getElementById('height').value;
    const gender = document.querySelector('input[name="gender"]:checked').value;
    const activityLevel = document.getElementById('activity-level').value;

    if (age === '' || weight === '' || height === '' || gender === '' || activityLevel === '') {
        alert('Please fill in all fields');
        return;
    }

    let bmr;

    // Calculate BMR based on gender
    if (gender === 'male') {
        bmr = 66.5 + (13.75 * weight) + (5.003 * height) - (6.75 * age);
    } else {
        bmr = 655 + (9.563 * weight) + (1.850 * height) - (4.676 * age);
    }

    // Adjust BMR based on activity level
    let calorieNeeds;
    switch (activityLevel) {
        case 'sedentary':
            calorieNeeds = bmr * 1.2;
            break;
        case 'light':
            calorieNeeds = bmr * 1.375;
            break;
        case 'moderate':
            calorieNeeds = bmr * 1.55;
            break;
        case 'active':
            calorieNeeds = bmr * 1.725;
            break;
        case 'very-active':
            calorieNeeds = bmr * 1.9;
            break;
        default:
            calorieNeeds = bmr * 1.2;
            break;
    }

    // Display the result
    const resultElement = document.getElementById('calorie-result');
    resultElement.textContent = `Your daily calorie needs are approximately ${Math.round(calorieNeeds)} calories.`;
}

// Call calculateCalories on form submit
document.getElementById('diet-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting
    calculateCalories();
});
