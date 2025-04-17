<div 
    x-data="{ 
        darkMode: localStorage.getItem('theme') === 'dark' 
    }" 
    x-init="document.documentElement.classList.toggle('dark', darkMode)" 
    class="flex items-center justify-center"
>
    <button 
        @click="
            darkMode = !darkMode; 
            localStorage.setItem('theme', darkMode ? 'dark' : 'light'); 
            document.documentElement.classList.toggle('dark', darkMode)
        " 
        class="w-10 h-10 rounded-full bg-white dark:bg-gray-800 shadow-md flex items-center justify-center transition-all duration-500 ease-in-out hover:scale-105" 
        aria-label="Toggle Dark Mode"
    >
        <!-- Sun Icon -->
        <svg 
            x-show="!darkMode" 
            x-transition 
            xmlns="http://www.w3.org/2000/svg" 
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
            stroke="currentColor" 
            class="w-6 h-6 text-yellow-500"
        >
            <path stroke-linecap="round" stroke-linejoin="round" 
                d="M12 3v1.5m0 15V21m9-9h-1.5M4.5 12H3m15.364-6.364l-1.06 1.06M6.696 17.303l-1.06 1.06m12.728 0l-1.06-1.06M6.696 6.697L5.636 5.636M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z" 
            />
        </svg>

        <!-- Moon Icon -->
        <svg 
            x-show="darkMode" 
            x-transition 
            xmlns="http://www.w3.org/2000/svg" 
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" 
            stroke="currentColor" 
            class="w-6 h-6 text-gray-300"
        >
            <path stroke-linecap="round" stroke-linejoin="round" 
                d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" 
            />
        </svg>
    </button>
</div>
