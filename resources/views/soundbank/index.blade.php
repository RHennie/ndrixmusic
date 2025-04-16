<x-app-layout>
    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex justify-center p-6 w-full">
            <div class="w-full max-w-4xl rounded-2xl shadow-xl p-6 space-y-6 bg-white dark:bg-gray-800 transition-colors duration-300">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-800 pb-4">
                    Soundbank
                </h2>

                @if (session('success'))
                    <div class="bg-green-100 dark:bg-green-800 text-green-900 dark:text-green-100 p-2 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                
                <x-upload/>

                <input type="text" id="search" placeholder="Search songs..."
                       class="bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 px-3 py-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-red-500 transition mt-4">

                <div id="file-list" class="space-y-6 mt-4">
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
                                <!--play button includes slider-->
                                    <x-play-button/>
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
    <x-soundbank-scripts/>
</x-app-layout>
