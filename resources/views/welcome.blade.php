<x-app-layout>
    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex justify-center p-6">
            <div class="w-full max-w-4xl rounded-2xl shadow-xl p-6 space-y-6 bg-white dark:bg-gray-800 transition-colors duration-300">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-800 pb-4">
                    Latest Albums
                </h2>

                <!-- Album Card -->
                <div class="rounded-xl p-4 shadow flex flex-col gap-4 bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Protocol 13</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Album by <span class="font-medium">NDrix</span></p>
                        </div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Released: April 22, 2025</span>
                    </div>
                    <div class="rounded overflow-hidden">
                        <!-- Spotify embed for album -->
                        <iframe style="border-radius:12px" 
                            src="https://open.spotify.com/embed/album/7ibbBLWc8GLHug6qt08lck?utm_source=generator" 
                            width="100%" height="152" frameBorder="0" 
                            allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
