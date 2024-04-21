<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Book a Room</h1>

        <!-- Room Selection -->
        <div class="room-selection">
            <div class="room-option" id="single-room">
                <img src="single_room.jpg" alt="Single Room">
                <h2>Single Room</h2>
                <p>Features: Free WiFi, Single Bed, Work Desk</p>
                <button onclick="selectRoom('single')">Select</button>
            </div>
            <div class="room-option" id="double-room">
                <img src="double_room.jpg" alt="Double Room">
                <h2>Double Room</h2>
                <p>Features: Free WiFi, King Size Bed, Sofa, Mountain View</p>
                <button onclick="selectRoom('double')">Select</button>
            </div>
            <div class="room-option" id="suite-room">
                <img src="suite_room.jpg" alt="Suite">
                <h2>Suite</h2>
                <p>Features: Free WiFi, King Size Bed, Living Room, Ocean View, Jacuzzi</p>
                <button onclick="selectRoom('suite')">Select</button>
            </div>
        </div>

        <!-- Booking Form -->
        <form id="bookingForm" action="process_booking.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="checkin">Check-in Date:</label>
            <input type="date" id="checkin" name="checkin" required><br><br>

            <label for="checkout">Check-out Date:</label>
            <input type="date" id="checkout" name="checkout" required><br><br>

            <input type="hidden" id="roomtype" name="roomtype" value=""><!-- Hidden field for selected room type -->

            <label for="nights">Number of Nights:</label>
            <input type="number" id="nights" name="nights" min="1" required><br><br>

            <input type="submit" value="Book Now">
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
