// document.addEventListener("DOMContentLoaded", function () {
//     const prevButton = document.querySelector(".prev-button");
//     const nextButton = document.querySelector(".next-button");
//     const cards = document.querySelector(".cards");
  
//     prevButton.addEventListener("click", function () {
//       cards.appendChild(cards.firstElementChild);
//     });
  
//     nextButton.addEventListener("click", function () {
//       cards.insertBefore(cards.lastElementChild, cards.firstElementChild);
//     });
//   });

  // function carousel() {
  //       let carouselSlider = document.querySelector(".weekly-songs-list");
  //       let list = document.querySelector(".weekly-songs-list-items");
  //       let item = document.querySelectorAll(".weekly-songs-list-item");
  //       let list2;

  //           const speed = 0.3;

  //           const height = list.offsetHeight;
  //           let y = 0;
  //           let y2 = height;

  //           function clone() {
  //               list2 = list.cloneNode(true);
  //               carouselSlider.appendChild(list2);
  //               list2.style.top = `${height}px`;
  //           }

  //           function moveFirst() {
  //               y -= speed;

  //               if (height >= Math.abs(y)) {
  //               list.style.top = `${y}px`;
  //               } else {
  //               y = height;
  //               }
  //           }

  //           function moveSecond() {
  //               y2 -= speed;

  //               if (list2.offsetHeight >= Math.abs(y2)) {
  //               list2.style.top = `${y2}px`;
  //               } else {
  //               y2 = height;
  //               }
  //           }

  //           function hover() {
  //               clearInterval(a);
  //               clearInterval(b);
  //           }

  //           function unhover() {
  //               a = setInterval(moveFirst, 10);
  //               b = setInterval(moveSecond, 10);
  //           }

  //           clone();

  //           let a = setInterval(moveFirst, 10);
  //           let b = setInterval(moveSecond, 10);

  //           carouselSlider.addEventListener("mouseenter", hover);
  //           carouselSlider.addEventListener("mouseleave", unhover);
  // }

// carousel();

//   document.addEventListener('DOMContentLoaded', function() {
//     const playlist = document.querySelector('.playsong');
//     const audioPlayer = document.querySelector('.audio');

//     playlist.addEventListener('click', function(event) {
//         const listItem = event.target;
//         const audioSrc = listItem.getAttribute('data-src');

//         if (audioSrc) {
//             audioPlayer.setAttribute('src', audioSrc);
//             audioPlayer.play();
//         }
//     });
// });



// const audio = document.getElementById("audio");
// const playPauseButton = document.getElementById("play-pause-button");
// const volumeControl = document.getElementById("volume-control");
// const progressBarContainer = document.querySelector(".progress");
// const progressBar = document.getElementById("progress-bar");
// const currentTimeDisplay = document.getElementById("current-time");
// const totalTimeDisplay1 = document.getElementById("total-time1");
// const totalTimeDisplay2 = document.getElementById("total-time2");
// const volumeIcon = document.getElementById('volume-icon');



// let isPlaying = false;

// playPauseButton.addEventListener("click", () => {
//     if (isPlaying) {
//         audio.pause();
//         playPauseButton.innerHTML = `<i class="fa-solid fa-play fa-2xl"></i>`;
//     } else {
//         audio.play();
//         playPauseButton.innerHTML = `<i class="fa-solid fa-pause fa-2xl"></i>`;
//     }
//     isPlaying = !isPlaying;
// });

// document.addEventListener("keydown", function (event) {
//     if (event.code === "Space") {
//         event.preventDefault();
//         if (isPlaying) {
//             audio.pause();
//             playPauseButton.innerHTML = `<i class="fa-solid fa-play fa-2xl"></i>`;
//         } else {
//             audio.play();
//             playPauseButton.innerHTML = `<i class="fa-solid fa-pause fa-2xl"></i>`;
//         }
//         isPlaying = !isPlaying;
//     }
// });


// progressBarContainer.addEventListener("click", (e) => {
//     const pos = (e.pageX - (progressBarContainer.offsetLeft + progressBarContainer.offsetParent.offsetLeft)) / progressBarContainer.offsetWidth;
//     audio.currentTime = pos * audio.duration;
// });


// volumeControl.addEventListener("input", () => {
//     audio.volume = volumeControl.value;
// });

// audio.addEventListener("timeupdate", () => {
//     const currentTime = audio.currentTime;
//     const duration = audio.duration;

//     const currentMinutes = Math.floor(currentTime / 60);
//     const currentSeconds = Math.floor(currentTime % 60);
//     const totalMinutes = Math.floor(duration / 60);
//     const totalSeconds = Math.floor(duration % 60);

//     currentTimeDisplay.textContent = `${currentMinutes}:${currentSeconds < 10 ? '0' : ''}${currentSeconds}`;
//     totalTimeDisplay1.textContent = `${totalMinutes}:${totalSeconds}`;
//     totalTimeDisplay2.textContent = `${totalMinutes}:${totalSeconds}`;

//     const progress = (currentTime / duration) * 100;
//     progressBar.style.width = `${progress}%`;
// });

// audio.addEventListener("loadedmetadata", () => {
//     const duration = audio.duration;

//     const totalMinutes = Math.floor(duration / 60);
//     const totalSeconds = Math.floor(duration % 60);

//     totalTimeDisplay1.textContent = `${totalMinutes}:${totalSeconds}`;
//     totalTimeDisplay2.textContent = `${totalMinutes}:${totalSeconds}`;

// });



// const wishlist = document.getElementById('wishlist-icon');
// wishlist.addEventListener("click", function () {
//     if (wishlist.classList.contains("love")) {
//         wishlist.classList.remove("love");
//     } else {
//         wishlist.classList.add("love");
//     }
// });


// // ======================
// var playlist = [
//     "https://b.top4top.io/m_28561x2pk1.mp3",
//     "http://127.0.0.1:8000/2.mp3",
//   ];
//   var currentIndex = 0;
  
//   function playAudio(index) {
//     if (index >= 0 && index < playlist.length) {
//       audio.src = playlist[index];
//       audio.play();
//       currentIndex = index;
//     }
//   }
  
//   document.getElementById("play-pause-button").addEventListener("click", function() {
//     if (audio.paused) {
//       audio.pause();
//     } else {
//       audio.play();
//     }
//   });
  
//   document.getElementById("back").addEventListener("click", function() {
//     playAudio(currentIndex - 1);
//   });
  
//   document.getElementById("next").addEventListener("click", function() {
//     playAudio(currentIndex + 1);
//   });
  
//   audio.addEventListener("ended", function() {
//     playAudio(currentIndex + 1);
//   });
 