// Function to calculate room cost based on selected options
function calculateRoomCost() {
    // Get values from the form inputs
    var roomType = document.getElementById("roomType").value;
    var numberOfNights = parseInt(document.getElementById("numberOfNights").value);

    // Define the cost per night for each room type (example values)
    var costPerNight = {
        "standard": 100,
        "deluxe": 150,
        "suite": 250
    };

    // Validate inputs
    if (isNaN(numberOfNights) || numberOfNights <= 0) {
        alert("Please enter a valid number of nights.");
        return;
    }

    // Calculate total room cost
    var roomCost = costPerNight[roomType] * numberOfNights;

    // Display the calculated room cost to the user
    document.getElementById("totalCost").textContent = "$" + roomCost.toFixed(2);
}

// Attach event listener to the calculate button
var calculateButton = document.getElementById("calculateButton");
calculateButton.addEventListener("click", calculateRoomCost);
