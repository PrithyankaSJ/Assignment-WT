function updateClock() {
  const now = new Date();
  const timeString = now.toLocaleTimeString();
  document.getElementById("clock").textContent = timeString;
}

// Update every second
setInterval(updateClock, 1000);
updateClock(); // run once immediately
