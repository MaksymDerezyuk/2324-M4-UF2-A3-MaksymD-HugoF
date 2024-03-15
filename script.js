document.addEventListener('DOMContentLoaded', function () {
    var musicButton = document.getElementById('musicButton');
    var backgroundMusic = document.getElementById('backgroundMusic');

    musicButton.addEventListener('click', function () {
        if (backgroundMusic.paused) {
            backgroundMusic.play();
            musicButton.textContent = 'Music ON';
            musicButton.classList.add('on');
        } else {
            backgroundMusic.pause();
            musicButton.textContent = 'Music OFF';
            musicButton.classList.remove('on');
        }
    });

    if (!backgroundMusic.paused) {
        musicButton.textContent = 'Music ON';
        musicButton.classList.add('on');
    }
});
