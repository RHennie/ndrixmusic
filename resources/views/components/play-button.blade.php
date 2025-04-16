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
<input type="range" class="seek-slider w-4/5 sm:w-2/3 ml-4 accent-red-600" min="0" max="100" value="0">