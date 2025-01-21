// Assuming you have included Stripe.js on your HTML page
const stripe = Stripe('pk_test_51ODTNySGrJN8IOmlwgp74MuQS5KucBpcD91dDW4imnCmjH4t55qgW78R3vd87oeFKsE4sVulKiOYVm352YbPRhkn00pas21xtb'); // Replace with your Stripe public key
const elements = stripe.elements();

// Create an instance of the card Element
const cardElement = elements.create('card');
cardElement.mount('#card-element');  // Mounts the card element to the HTML div with id 'card-element'

// Function to fetch the client secret for the payment
async function createPaymentIntent(amount) {
    const response = await fetch('php/payment.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ amount: amount })
    });

    const data = await response.json();

    if (data.error) {
        alert('Error: ' + data.error);
        return null;
    }

    // Return the client secret for the frontend to use with Stripe
    return data.clientSecret;
}

// Handle form submission
document.getElementById('payment-form').addEventListener('submit', async function(event) {
    event.preventDefault();

    const amountInCents = 1000;  // Amount in cents (e.g., $10.00)

    // Get the client secret for the payment
    const clientSecret = await createPaymentIntent(amountInCents);

    if (clientSecret) {
        // Confirm the payment with Stripe
        stripe.confirmCardPayment(clientSecret, {
            payment_method: {
                card: cardElement,
            }
        }).then(function(result) {
            if (result.error) {
                console.log(result.error.message);  // Handle error
            } else {
                if (result.paymentIntent.status === 'succeeded') {
                    alert('Payment Successful!');
                    // Optionally, redirect the user or show a success message
                }
            }
        });
    }
});
