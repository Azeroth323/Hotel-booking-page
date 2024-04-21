function selectRoom(roomType) {
  // Set the value of the hidden input field 'roomtype' to the selected room type
  document.getElementById('roomtype').value = roomType;

  // Optionally, visually highlight the selected room option
  const roomOptions = document.querySelectorAll('.room-option');
  roomOptions.forEach(option => {
      if (option.id === roomType + '-room') {
          option.style.border = '2px solid #007bff'; // Add a blue border to the selected room option
      } else {
          option.style.border = 'none'; // Remove border from other room options
      }
  });
}

document.getElementById('bookingForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent default form submission

  // Collect form data
  const formData = new FormData(this);

  // Send form data to server via AJAX
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'process_booking.php', true);

  xhr.onload = function() {
      if (xhr.status >= 200 && xhr.status < 400) {
          // Request was successful
          const response = xhr.responseText;
          alert(response); // Display booking confirmation or error message
          document.getElementById('bookingForm').reset(); // Reset the form
      } else {
          // Error handling
          alert('Error: Unable to process booking. Please try again.');
      }
  };

  xhr.onerror = function() {
      // Error handling for network errors
      alert('Error: Unable to connect to the server. Please try again later.');
  };

  // Send the form data
  xhr.send(formData);
});
