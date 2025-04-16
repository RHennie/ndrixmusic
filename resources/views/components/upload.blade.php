<form method="POST" action="{{ route('soundbank.upload') }}" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <!-- Hidden File Input -->
    <input id="file-input" type="file" name="audio" required class="hidden" accept=".mp3,.wav">

    <!-- Custom Drag & Drop Box -->
    <div id="drag-area" class="w-full h-40 border-2 border-dashed border-gray-500 dark:border-gray-700 rounded-md p-4 text-center flex justify-center items-center cursor-pointer bg-gray-100 dark:bg-gray-900 transition-colors duration-300 hover:bg-gray-200 dark:hover:bg-gray-700">
        <div class="text-gray-700 dark:text-gray-300">
            <p>Click or Drag files here</p>
            <p class="text-sm">(Accepted file types: MP3, WAV)</p>
        </div>
    </div>

    <!-- Display selected file name -->
    <div id="file-name" class="text-sm text-gray-600 dark:text-gray-300 mt-2"></div>

    <button type="submit" class="bg-red-600 hover:bg-red-900 text-white px-4 py-2 rounded w-full sm:w-auto">
        Upload
    </button>
</form>

<script>
    const fileInput = document.getElementById('file-input');
    const dragArea = document.getElementById('drag-area');
    const fileNameDisplay = document.getElementById('file-name');

    // Click opens file selector (works on mobile)
    dragArea.addEventListener('click', function () {
        fileInput.click();
    });

    // Highlight area on drag over
    dragArea.addEventListener('dragover', function (event) {
        event.preventDefault();
        dragArea.classList.add('bg-gray-200', 'dark:bg-gray-700');
    });

    // Remove highlight on drag leave
    dragArea.addEventListener('dragleave', function () {
        dragArea.classList.remove('bg-gray-200', 'dark:bg-gray-700');
    });

    // Handle dropped files
    dragArea.addEventListener('drop', function (event) {
        event.preventDefault();
        dragArea.classList.remove('bg-gray-200', 'dark:bg-gray-700');

        const files = event.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            fileNameDisplay.textContent = files[0].name;
        }
    });

    // Show file name on manual selection
    fileInput.addEventListener('change', function () {
        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name;
        }
    });
</script>
