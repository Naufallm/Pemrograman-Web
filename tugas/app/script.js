// Add to cart functionality and send to database
const addToCartButtons = document.querySelectorAll('.add-to-cart');

addToCartButtons.forEach(button => {
    button.addEventListener('click', function () {
        // Get product details from the UI
        const productName = this.dataset.product;
        const quantity = document.getElementById(`quantity-${productName.toLowerCase().replace(/\s+/g, '-')}`).value;
        const temperature = document.getElementById(`temperature-${productName.toLowerCase().replace(/\s+/g, '-')}`).value;
        const sugarLevel = document.getElementById(`sugar-${productName.toLowerCase().replace(/\s+/g, '-')}`).value;

        // Create the data payload to send to the server
        const data = {
            product_name: productName,
            quantity: parseInt(quantity),
            level_sugar: sugarLevel,
            temperature: temperature
        };

        // Send the data to the PHP server via fetch
        fetch('/mod4web/web/app/api/teas/create.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert(`${productName} has been added to the database successfully!`);
                } else {
                    alert(`Error: ${result.message}`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to add product to the database. Please try again.');
            });
    });
});



// Smooth scroll for navigation links
document.querySelectorAll('.nav-links a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const section = document.querySelector(this.getAttribute('href'));
        section.scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Mobile menu functionality can be added here
// Window scroll effects can be added here
// Additional interactive features can be added here