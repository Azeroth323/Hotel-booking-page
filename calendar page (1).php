<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Calendar</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->

    <style>
        /* Additional CSS styles if needed */
        .current-date {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        td.available {
            background-color: #b9f6ca; /* Light green for available dates */
            cursor: pointer;
        }
        td.booked {
            background-color: #ffcdd2; /* Light red for booked dates */
            cursor: not-allowed;
        }
        td.available:hover {
            background-color: #81c784; /* Darker green on hover */
        }
        td.booked:hover {
            background-color: #ef9a9a; /* Darker red on hover */
        }
        input[type="number"] {
            width: 60px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="current-date">
        <?php
            // Get current day, month, and year
            $currentDay = date('d');
            $currentMonth = date('F'); // Full month name (e.g., January)
            $currentYear = date('Y');

            // Output current date dynamically
            echo "Today is " . $currentDay . " " . $currentMonth . " " . $currentYear;
        ?>
    </div>

    <table>
        <tr>
            <!-- Table headers for days of the week (e.g., Sun, Mon, Tue, ...) -->
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
        </tr>
        <tr>
            <?php
                // Get the current day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
                $firstDayOfMonth = date('w', strtotime(date('Y-m-01')));
                $totalDaysInMonth = date('t'); // Total days in the current month

                $dayCounter = 1;

                // Output empty cells before the first day of the month
                for ($i = 0; $i < $firstDayOfMonth; $i++) {
                    echo "<td></td>";
                }

                // Output cells for each day of the month
                while ($dayCounter <= $totalDaysInMonth) {
                    // Start a new row for each week (7 cells = 1 week)
                    echo "<td class='";
                    if (checkIfDateIsBooked($currentYear . '-' . date('m') . '-' . str_pad($dayCounter, 2, '0', STR_PAD_LEFT))) {
                        echo "booked";
                    } else {
                        echo "available";
                    }
                    echo "' onclick='selectDate(\"$currentYear-" . date('m') . "-" . str_pad($dayCounter, 2, '0', STR_PAD_LEFT) . "\")'>$dayCounter</td>";

                    if (($firstDayOfMonth + $dayCounter) % 7 == 0) {
                        echo "</tr><tr>"; // Start a new row
                    }

                    $dayCounter++;
                }

                // Output empty cells after the last day of the month to complete the last row
                $remainingCells = 7 - (($firstDayOfMonth + $totalDaysInMonth) % 7);
                for ($i = 0; $i < $remainingCells; $i++) {
                    echo "<td></td>";
                }

                // Function to check if a date is already booked (you need to implement this)
                function checkIfDateIsBooked($date) {
                    // Implement logic to check if $date is booked in the database
                    // Example: SELECT * FROM bookings WHERE booked_date = '$date'
                    return false; // Return true if booked, false otherwise
                }
            ?>
        </tr>
    </table>

    <div>
        <form id="bookingForm" action="book.php" method="POST">
            <input type="hidden" id="selectedDate" name="date" value="">
            <label for="numTickets">Number of Tickets:</label>
            <input type="number" id="numTickets" name="num_tickets" min="1" value="1">
            <input type="text" id="userName" name="user_name" placeholder="Your Name" required>
            <input type="submit" value="Book">
        </form>
    </div>

    <script>
        // JavaScript function to handle date selection
        function selectDate(date) {
            document.getElementById('selectedDate').value = date;
        }
    </script>
</body>
</html>
 