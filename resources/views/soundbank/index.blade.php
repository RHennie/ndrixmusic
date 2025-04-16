<x-app-layout>
    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex justify-center p-6">
            <div class="w-full max-w-4xl rounded-2xl shadow-xl p-6 space-y-6 bg-white dark:bg-gray-800 transition-colors duration-300">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-800 pb-4">
                    🎵 Soundbank
                </h2>

                @if (session('success'))
                    <div class="bg-green-100 dark:bg-green-800 text-green-900 dark:text-green-100 p-2 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('soundbank.upload') }}" enctype="multipart/form-data" class="flex items-center space-x-4">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-900 text-white px-4 py-2 rounded">
                        Upload
                    </button>
                    <input type="file" name="audio" required
                           class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
                </form>

                <input type="text" id="search" placeholder="Search songs..."
                       class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-3 py-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-red-500 transition">

                <div id="file-list" class="space-y-6">
                    @foreach($files as $file)
                        @php $filename = basename($file); @endphp
                        <div class="rounded-xl p-4 shadow bg-gray-100 dark:bg-gray-900 transition-colors duration-300 song-block" data-name="{{ $filename }}">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $filename }}</h3>
                                </div>
                            </div>

                            <div class="relative">
                                <audio id="audio-{{ $loop->index }}" preload="metadata" class="w-full custom-audio">
                                    <source src="{{ Storage::url($file) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>

                                <div class="flex items-center justify-between mt-2">
                                    <!-- Play/Pause Button -->
                                    <button class="play-btn rounded-full w-12 h-12 flex items-center justify-center p-0 transition-all duration-300">
                                        <!-- Play Icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 icon-play text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M5 3v18l15-9-15-9z" />
                                        </svg>
                                        <!-- Pause Icon (hidden by default) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 icon-pause text-red-600 hidden" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M6 4h4v16H6zm8 0h4v16h-4z" />
                                        </svg>
                                    </button>


                                    <!-- Slider -->
                                    <input type="range" class="seek-slider w-full ml-4 accent-red-600" min="0" max="100" value="0">
                                </div>
                            </div>

                            <div class="mt-2">
                                <a href="{{ Storage::url($file) }}" download class="text-red-500 hover:underline text-sm">
                                    Download
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>

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
    </script>
</x-app-layout>
