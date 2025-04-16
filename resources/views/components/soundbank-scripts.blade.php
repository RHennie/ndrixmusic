
<script>
    document.querySelectorAll('.song-block').forEach((block, index) => {
        const audio = document.getElementById(`audio-${index}`);
        const playBtn = block.querySelector('.play-btn');
        const iconPlay = block.querySelector('.icon-play');
        const iconPause = block.querySelector('.icon-pause');
        const slider = block.querySelector('.seek-slider');
        let isDragging = false;

        playBtn.addEventListener('click', () => {
            const isPlaying = !audio.paused;

            document.querySelectorAll('audio').forEach(a => {
                if (a !== audio) {
                    a.pause();
                    const otherBlock = a.closest('.song-block');
                    otherBlock.querySelector('.icon-play').classList.remove('hidden');
                    otherBlock.querySelector('.icon-pause').classList.add('hidden');
                }
            });

            if (isPlaying) {
                audio.pause();
            } else {
                audio.play();
            }

            iconPlay.classList.toggle('hidden', !audio.paused);
            iconPause.classList.toggle('hidden', audio.paused);
        });

        // Update slider position
        audio.addEventListener('timeupdate', () => {
            if (!isDragging && audio.duration) {
                slider.value = (audio.currentTime / audio.duration) * 100;
            }
        });

        // Seeking
        slider.addEventListener('input', () => {
            isDragging = true;
        });

        slider.addEventListener('change', () => {
            if (audio.duration) {
                audio.currentTime = (slider.value / 100) * audio.duration;
            }
            isDragging = false;
        });

        // Reset after end
        audio.addEventListener('ended', () => {
            iconPlay.classList.remove('hidden');
            iconPause.classList.add('hidden');
            slider.value = 0;
        });
    });

    // Search filter
    document.getElementById('search').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        document.querySelectorAll('.song-block').forEach(function (block) {
            block.style.display = block.dataset.name.toLowerCase().includes(query) ? 'block' : 'none';
        });
    });

    function confirmDelete(e) {
        if (!confirm("Are you sure you want to delete this file?")) {
            e.preventDefault();
            return false;
        }
        return true;
    }
    let formToDelete = null;

    function showDeleteModal(form) {
        formToDelete = form;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        formToDelete = null;
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        if (formToDelete) {
            formToDelete.submit();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === "Escape") {
            closeDeleteModal();
        }
    });
    
</script>