let cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(productName, price, productId, quantity) {
    const productImage = `assets/images/${productId}.jpg`; // Assuming the image filename is the productId (e.g., product1.jpg)
    
    const existingProductIndex = cart.findIndex(item => item.productId === productId);

    if (existingProductIndex !== -1) {
        cart[existingProductIndex].quantity += parseInt(quantity);
    } else {
        cart.push({
            productName: productName,
            price: price,
            quantity: parseInt(quantity),
            productId: productId,
            image: productImage // Storing the image path
        });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    alert(`${productName} added to cart!`);
}
