<x-app-layout>
    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex justify-center p-6">
            <div class="w-full max-w-4xl rounded-2xl shadow-xl p-6 space-y-6 bg-white dark:bg-gray-950 transition-colors duration-300">
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
                            <div>
                                <audio controls preload="metadata" class="w-full custom-audio">
                                    <source src="{{ Storage::url($file) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                            <div class="mt-2">
                                <a href="{{ Storage::url($file) }}" download class="text-red-500 hover:underline text-sm">
                                    ⬇️ Download
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>

    <style>
        /* Minimalist custom audio styling */
        audio::-webkit-media-controls-panel {
            background-color: transparent;
        }

        audio::-webkit-media-controls-play-button,
        audio::-webkit-media-controls-timeline,
        audio::-webkit-media-controls-current-time-display,
        audio::-webkit-media-controls-time-remaining-display {
            filter: invert(0%) brightness(0.8);
        }

        html.dark audio::-webkit-media-controls-play-button,
        html.dark audio::-webkit-media-controls-timeline,
        html.dark audio::-webkit-media-controls-current-time-display,
        html.dark audio::-webkit-media-controls-time-remaining-display {
            filter: invert(100%);
        }
    </style>

    <script>
        // Search filter
        document.getElementById('search').addEventListener('input', function () {
            const query = this.value.toLowerCase();
            document.querySelectorAll('.song-block').forEach(function (block) {
                block.style.display = block.dataset.name.toLowerCase().includes(query) ? 'block' : 'none';
            });
        });
    </script>
</x-app-layout>
