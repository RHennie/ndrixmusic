<!-- Mobile Dark Mode Toggle -->
<div 
    class="sm:hidden absolute top-5 left-1/2 transform -translate-x-1/2 z-10" 
    x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }"
    x-init="document.documentElement.classList.toggle('dark', darkMode)"
>
    <button 
        @click="
            darkMode = !darkMode; 
            localStorage.setItem('theme', darkMode ? 'dark' : 'light'); 
            document.documentElement.classList.toggle('dark', darkMode)
        "
    >
        <!-- Sun Icon (light mode) -->
        <svg 
            x-show="!darkMode" 
            x-transition 
            class="h-6 w-6 text-gray-800 dark:text-gray-200" 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 20 20" 
            fill="currentColor"
        >
            <path fill-rule="evenodd" 
                d="M10 4a6 6 0 100 12 6 6 0 000-12zm0 10a4 4 0 110-8 4 4 0 010 8z" 
                clip-rule="evenodd" 
            />
        </svg>

        <!-- Fixed Moon Icon -->
        <svg 
            x-show="darkMode" 
            x-transition 
            class="h-6 w-6 text-gray-800 dark:text-gray-200" 
            xmlns="http://www.w3.org/2000/svg" 
            fill="currentColor" 
            viewBox="0 0 20 20"
        >
            <path 
                d="M17.293 13.293a8 8 0 01-10.586-10.586 1 1 0 00-1.414-1.414 10 10 0 1013.414 13.414 1 1 0 00-1.414-1.414z" 
            />
        </svg>

    </button>
</div>