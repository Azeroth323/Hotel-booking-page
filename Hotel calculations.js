// Define room rates per night (adjust rates as needed)
const roomRates = {
    'single': 100,
    'double': 150,
    'suite': 250
};

// Function to calculate total cost based on room type and number of nights
function calculateCost() {
    // Retrieve selected room type and number of nights from HTML elements
    const roomType = document.getElementById('roomtype').value;
    const nights = parseInt(document.getElementById('nights').value);

    // Validate input
    if (!roomType || !nights || isNaN(nights) || nights <= 0) {
        alert('Please select a room type and enter a valid number of nights.');
        return;
    }

    // Calculate total cost
    const ratePerNight = roomRates[roomType];
    const totalCost = ratePerNight * nights;

    // Display total cost to the user
    const costDisplay = document.getElementById('totalCost');
    costDisplay.textContent = `Total Cost: $${totalCost}`;
}

// Event listener for form submission (calculate button)
document.getElementById('calculateButton').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default form submission

    // Call calculateCost function to calculate and display the total cost
    calculateCost();
});
