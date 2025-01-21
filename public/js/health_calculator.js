document.getElementById("healthCalculatorForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission

    // Get user inputs
    const weight = parseFloat(document.getElementById("weight").value);
    const height = parseFloat(document.getElementById("height").value);
    const age = parseInt(document.getElementById("age").value);
    const gender = document.getElementById("gender").value;

    // Check if inputs are valid
    if (isNaN(weight) || isNaN(height) || isNaN(age)) {
        alert("Please fill out all fields correctly.");
        return;
    }

    // Calculate BMI
    const heightInMeters = height / 100; // Convert height from cm to meters
    const bmi = (weight / (heightInMeters * heightInMeters)).toFixed(2);

    // Determine BMI category
    let bmiCategory = '';
    if (bmi < 18.5) {
        bmiCategory = 'Underweight';
    } else if (bmi >= 18.5 && bmi < 24.9) {
        bmiCategory = 'Normal weight';
    } else if (bmi >= 25 && bmi < 29.9) {
        bmiCategory = 'Overweight';
    } else {
        bmiCategory = 'Obesity';
    }

    // Calculate BMR using Mifflin-St Jeor equation
    let bmr;
    if (gender === "male") {
        bmr = 10 * weight + 6.25 * height - 5 * age + 5; // For males
    } else {
        bmr = 10 * weight + 6.25 * height - 5 * age - 161; // For females
    }

    // Calculate Daily Caloric Needs (TDEE)
    const activityFactor = 1.55; // Assuming moderate activity level
    const tdee = (bmr * activityFactor).toFixed(2);

    // Log the values for debugging purposes
    console.log('Weight:', weight);
    console.log('Height:', height);
    console.log('BMI:', bmi);
    console.log('TDEE:', tdee);

    // Calculate Healthy Weight Range (18.5 to 24.9 BMI)
    const healthyWeightMin = calculateHealthyWeight(height);
    const healthyWeightMax = calculateHealthyWeight(height, true);

    // Display the results
    document.getElementById("results").innerHTML = `
        <h3>Your Health Results</h3>
        <p><strong>BMI:</strong> ${bmi} (${bmiCategory})</p>
        <p><strong>Daily Caloric Needs (TDEE):</strong> ${tdee} kcal</p>
        <p><strong>Healthy Weight Range:</strong> ${healthyWeightMin} kg - ${healthyWeightMax} kg</p>
    `;
});

// Function to calculate healthy weight range based on BMI of 18.5 to 24.9
function calculateHealthyWeight(height, isMax = false) {
    const bmiMin = 18.5;
    const bmiMax = 24.9;
    const heightInMeters = height / 100;
    const weightMin = (bmiMin * (heightInMeters * heightInMeters)).toFixed(1);
    const weightMax = (bmiMax * (heightInMeters * heightInMeters)).toFixed(1);
    return isMax ? weightMax : weightMin;
}
