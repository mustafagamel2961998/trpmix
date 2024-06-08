const audio = document.getElementById("audio_song");
const playPauseButton = document.getElementById("play-pause-button");
const volumeControl = document.getElementById("volume-control");
const progressBarContainer = document.querySelector(".progress");
const progressBar = document.getElementById("progress-bar");
const currentTimeDisplay = document.getElementById("current-time");
const totalTimeDisplay1 = document.getElementById("total-time1");
const totalTimeDisplay2 = document.getElementById("total-time2");
const volumeIcon = document.getElementById('volume-icon');



let isPlaying = false;

playPauseButton.addEventListener("click", () => {
    if (isPlaying) {
        audio.pause();
        playPauseButton.innerHTML = `<i class="fa-solid fa-play fa-2xl"></i>`;
    } else {
        audio.play();
        playPauseButton.innerHTML = `<i class="fa-solid fa-pause fa-2xl"></i>`;
    }
    isPlaying = !isPlaying;
});



progressBarContainer.addEventListener("click", (e) => {
    // const pos = (e.pageX - (progressBarContainer.offsetLeft + progressBarContainer.offsetParent.offsetLeft)) / progressBarContainer.offsetWidth;
    const pos = 1 - (e.pageX - (progressBarContainer.offsetLeft + progressBarContainer.offsetParent.offsetLeft)) / progressBarContainer.offsetWidth;
    audio.currentTime = pos * audio.duration;
});

function setInitialVolumeColor() {
  const value = volumeControl.value;
  volumeControl.style.background = `linear-gradient(to left, #ff00cc ${value * 100}%, #ffffff ${value * 100}%)`;
}

setInitialVolumeColor();

volumeControl.addEventListener("input", () => {
  const value = volumeControl.value;
  volumeControl.style.background = `linear-gradient(to left, #ff00cc ${value * 100}%, #ffffff ${value * 100}%)`;
  audio.volume = value;
});

audio.addEventListener("timeupdate", () => {
    const currentTime = audio.currentTime;
    const duration = audio.duration;

    const currentMinutes = Math.floor(currentTime / 60);
    const currentSeconds = Math.floor(currentTime % 60);
    const totalMinutes = Math.floor(duration / 60);
    const totalSeconds = Math.floor(duration % 60);

    currentTimeDisplay.textContent = `${currentMinutes}:${currentSeconds < 10 ? '0' : ''}${currentSeconds}`;
    totalTimeDisplay1.textContent = `${totalMinutes}:${totalSeconds}`;

    const progress = (currentTime / duration) * 100;
    progressBar.style.width = `${progress}%`;
});

audio.addEventListener("loadedmetadata", () => {
    const duration = audio.duration;

    const totalMinutes = Math.floor(duration / 60);
    const totalSeconds = Math.floor(duration % 60);

    totalTimeDisplay1.textContent = `${totalMinutes}:${totalSeconds}`;
    totalTimeDisplay2.textContent = `${totalMinutes}:${totalSeconds}`;

});



const wishlist = document.getElementById('wishlist-icon');
wishlist.addEventListener("click", function () {
    if (wishlist.classList.contains("love")) {
        wishlist.classList.remove("love");
    } else {
        wishlist.classList.add("love");
    }
});
