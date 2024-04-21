<?php
// Handle booking request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $userName = $_POST['user_name'];
    $numTickets = intval($_POST['num_tickets']);
    
    // Calculate total cost (example: $10 per ticket)
    $ticketPrice = 10.00; // Set your ticket price here
    $totalCost = $numTickets * $ticketPrice;

    // Insert booking into the database
    // Assuming you have a database connection $conn
    $stmt = $conn->prepare("INSERT INTO bookings (booked_date, user_name, num_tickets, total_cost) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $date, $userName, $numTickets, $totalCost);
    $stmt->execute();

    // Provide appropriate feedback to the user
    echo "Booking successful! Total cost: $" . number_format($totalCost, 2);
}
?>
 