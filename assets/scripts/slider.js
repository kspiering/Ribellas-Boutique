document.addEventListener("DOMContentLoaded", function () {
  activateSlider();
});

function activateSlider() {
  const sliderContainer = document.querySelector(".images-all");
  const playPauseButton = document.getElementById("play");
  const pauseButton = document.getElementById("pause");

  document
    .querySelector(".arrow-container .left")
    .addEventListener("click", moveLeft);

  document
    .querySelector(".arrow-container .right")
    .addEventListener("click", moveRight);

  let isPlaying = false;
  let slideInterval;

  playPauseButton.addEventListener("click", togglePlayPause);

  function moveRight() {
    sliderContainer.appendChild(document.querySelector(".slide"));
  }

  function moveLeft() {
    const slides = document.querySelectorAll(".slide");
    sliderContainer.insertBefore(slides[slides.length - 1], slides[0]);
  }

  function togglePlayPause() {
    isPlaying = !isPlaying;
    if (isPlaying) {
      playPauseButton.textContent = "Pause";
      slideInterval = setInterval(moveRight, 3000);
    } else {
      playPauseButton.textContent = "Play";
      clearInterval(slideInterval);
    }
  }
}
