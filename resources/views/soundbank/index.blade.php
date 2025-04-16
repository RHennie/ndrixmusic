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
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white break-all">{{ $filename }}</h3>

                                <form method="POST" action="{{ route('soundbank.delete', ['file' => urlencode($filename)]) }}" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="filename" value="{{ $filename }}">
                                    <button type="button" onclick="showDeleteModal(this.form)" class="text-red-600 hover:text-red-800 dark:hover:text-red-400 transition rounded-full p-2 hover:bg-red-100 dark:hover:bg-red-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            
                            <div class="relative">
                                <audio id="audio-{{ $loop->index }}" preload="metadata" class="w-full custom-audio">
                                    <source src="{{ Storage::url($file) }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>

                                <div class="flex items-center justify-between mt-2">
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

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex    items-center justify-center z-50 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 w-11/12 max-w-md space-y-4 transition-all duration-300">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delete File</h2>
            <p class="text-gray-700 dark:text-gray-300">Are you sure you want to delete this file? This action cannot be undone.</p>

            <div class="flex justify-end space-x-2">
                <button onclick="closeDeleteModal()" class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    Cancel
                </button>
                <button id="confirmDeleteBtn" class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-800 transition">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <x-soundbank-scripts/>

</x-app-layout>
