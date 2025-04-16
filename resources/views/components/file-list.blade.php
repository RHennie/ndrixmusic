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