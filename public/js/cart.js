// Fetch cart items from localStorage
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Function to render cart items
function renderCartItems() {
    const cartItemsContainer = document.getElementById('cart-items');
    const totalItemsElement = document.getElementById('total-items');
    const totalPriceContainer = document.getElementById('total-price');
    cartItemsContainer.innerHTML = ''; // Clear the cart before re-rendering

    // If the cart is empty, display a message
    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
        totalPriceContainer.innerHTML = 'Total Price: $0.00';
        return;
    }
    let totalItems = 0;
    let totalPrice = 0;

    cart.forEach(item => {
        

        const cartItemElement = document.createElement('div');
        cartItemElement.classList.add('cart-item');
        cartItemElement.innerHTML = `
            <img src="${item.image}" alt="${item.productName}">
            <div class="cart-item-details">
                <h3>${item.productName}</h3>
                <p>Price: $${item.price}</p>
            </div>
            <div class="cart-item-quantity">
                <input 
                    type="number" 
                    value="${item.quantity}" 
                    min="1" 
                    max="10" 
                    data-product-id="${item.productId}" 
                    class="quantity-input">
            </div>
            <button class="remove-item" data-product-id="${item.productId}">Remove</button>
        `;
        cartItemsContainer.appendChild(cartItemElement);
        totalItems += item.quantity;
        totalPrice += item.price * item.quantity;
    });
    totalItemsElement.textContent = totalItems;
    totalPriceContainer.innerHTML = `Total Price: $${totalPrice.toFixed(2)}`;

    // Attach event listeners for quantity changes and removal
    attachEventListeners();
}

// Function to attach event listeners for quantity changes and removal
function attachEventListeners() {
    // Update quantity event listener
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', event => {
            const productId = event.target.dataset.productId;
            updateQuantity(productId, event.target.value);
        });
    });

    // Remove item event listener
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', event => {
            const productId = event.target.dataset.productId;
            removeFromCart(productId);
        });
    });
}

// Function to update quantity
function updateQuantity(productId, newQuantity) {
    const item = cart.find(item => item.productId === productId);
    if (item) {
        item.quantity = parseInt(newQuantity, 10) || 1; // Ensure quantity is an integer >= 1
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCartItems();
    }
}

// Function to remove item from cart
function removeFromCart(productId) {
    // Remove item from cart array
    cart = cart.filter(item => item.productId !== productId);
    
    // Update localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
    
    // Re-render cart items
    renderCartItems();
}

function checkout() {
    alert('Proceeding to checkout...');
}
// Run the renderCartItems function when the page loads
window.onload = renderCartItems;
