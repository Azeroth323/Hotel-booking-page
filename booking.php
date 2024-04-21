<?php
// Validate and sanitize input data
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : '';
$checkin = isset($_POST['checkin']) ? $_POST['checkin'] : '';
$checkout = isset($_POST['checkout']) ? $_POST['checkout'] : '';
$roomtype = isset($_POST['roomtype']) ? $_POST['roomtype'] : '';
$nights = isset($_POST['nights']) ? intval($_POST['nights']) : 0;

// Validate form fields (add more validation as needed)
$errors = [];
if (empty($name)) {
    $errors[] = "Name is required.";
}
if (empty($email) || !$email) {
    $errors[] = "Valid email address is required.";
}
if (empty($checkin) || empty($checkout)) {
    $errors[] = "Check-in and check-out dates are required.";
}
if (empty($roomtype)) {
    $errors[] = "Room type is required.";
}
if ($nights <= 0) {
    $errors[] = "Number of nights must be a positive integer.";
}

// If there are validation errors, return error messages
if (!empty($errors)) {
    http_response_code(400); // Bad request status
    echo json_encode(['errors' => $errors]);
    exit;
}

// Database connection parameters (update with your database details)
//$servername = "localhost";
//$username = "your_username";
//$password = "your_password";
//$dbname = "your_database_name";

// Create connection to MySQL database
//$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection


// Prepare and execute SQL query to insert booking into database
$sql = "INSERT INTO bookings (name, email, checkin, checkout, room_type, nights) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $name, $email, $checkin, $checkout, $roomtype, $nights);

if ($stmt->execute()) {
    // Booking successfully inserted into database
    http_response_code(200); // Success status
    echo json_encode(['message' => 'Booking successful!']);
} else {
    // Error occurred while inserting booking
    http_response_code(500); // Internal server error status
    echo json_encode(['errors' => ['Error: ' . $stmt->error]]);
}

// Close database connection
$stmt->close();
$conn->close();
?>
