function showTime() {
  const now = new Date();
  const hours = now.getHours();
  const minutes = now.getMinutes();
  const seconds = now.getSeconds();
  const timeString = `${hours}:${minutes}:${seconds}`;
  document.getElementById('time').innerHTML = timeString;
}

setInterval(showTime, 1000);
showTime();
