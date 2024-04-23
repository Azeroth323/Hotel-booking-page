// Define room details (image, description, and rate) for each room type
const roomDetails = {
  standard: {
      image: 'images/standard.jpg',
      description: 'Our cozy Standard Room offers a relaxing retreat with modern amenities. Featuring a comfortable queen-size bed, a functional workspace, and a private bathroom with complimentary toiletries. Perfect for solo travelers or couples seeking comfort and affordability.',
      rate: 100
  },
  deluxe: {
      image: 'images/deluxe.jpg',
      description: 'Indulge in luxury and elegance in our Deluxe Room. Experience spacious comfort with a king-size bed, a stylish seating area, and large windows offering breathtaking city views. Enjoy premium amenities including a minibar, bathrobes, and a luxurious en-suite bathroom with a rainfall shower.',
      rate: 150
  },
  suite: {
      image: 'images/suite.jpg',
      description: 'Escape to pure luxury in our exquisite Suite. This spacious accommodation features a separate living room, a lavish bedroom with a plush king-size bed, and a private balcony overlooking the scenic surroundings. Pamper yourself with upscale amenities including a Jacuzzi tub, a Nespresso machine, and personalized concierge service.',
      rate: 250
  }
};

function showRoomDetails(roomType) {
  const selectedRoom = roomDetails[roomType];

  // Update room details (image, description, and rate) dynamically
  const roomDetailsContainer = document.getElementById('roomDetails');
  roomDetailsContainer.innerHTML = `
      <h3>${roomType.toUpperCase()} Room</h3>
      <img src="${selectedRoom.image}" alt="${roomType} Room">
      <p>${selectedRoom.description}</p>
      <p>Nightly Rate: $${selectedRoom.rate}</p>
  `;

  // Call calculateTotal to update total cost when room details are shown
  calculateTotal(roomType);
}

function calculateTotal(roomType) {
  const nights = parseInt(document.getElementById('nights').value);
  const selectedRoom = roomDetails[roomType];

  if (isNaN(nights) || nights <= 0) {
      alert('Please enter a valid number of nights (greater than 0).');
      document.getElementById('nights').focus();
      return;
  }

  // Calculate total cost
  const totalCost = nights * selectedRoom.rate;

  // Display the total cost on the webpage
  document.getElementById('totalCost').textContent = `Total Cost: $${totalCost.toFixed(2)}`;
}
