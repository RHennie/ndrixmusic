<button id="darkModeToggle" class="text-sm px-6 py-3 rounded bg-gray-200 dark:bg-gray-700 dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600 transition">
    Toggle Dark Mode
</button>

<script>
    // Dark mode toggle script
    document.addEventListener('DOMContentLoaded', () => {
        const toggleButton = document.getElementById('darkModeToggle');
        if (toggleButton) {
            toggleButton.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            });
        }
    });
</script>
