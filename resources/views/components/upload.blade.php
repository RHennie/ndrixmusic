<form method="POST" action="{{ route('soundbank.upload') }}" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <!-- Custom Drag & Drop Box -->
    <label for="file-input" class="w-full h-40 border-2 border-dashed border-gray-500 dark:border-gray-700 rounded-md p-4 text-center flex justify-center items-center cursor-pointer bg-gray-100 dark:bg-gray-900 transition-colors duration-300 hover:bg-gray-200 dark:hover:bg-gray-700">
        <div id="drag-area" class="text-gray-700 dark:text-gray-300">
            <p>Click or Drag files here</p>
            <p class="text-sm">(Accepted file types: MP3, WAV)</p>
        </div>
        <input id="file-input" type="file" name="audio" required class="hidden" accept=".mp3,.wav">
    </label>

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

    // Handle dragover event to highlight the drag area
    dragArea.addEventListener('dragover', function (event) {
        event.preventDefault();
        dragArea.classList.add('bg-gray-200', 'dark:bg-gray-700');
    });

    // Handle dragleave event to remove the highlight
    dragArea.addEventListener('dragleave', function () {
        dragArea.classList.remove('bg-gray-200', 'dark:bg-gray-700');
    });

    // Handle drop event
    dragArea.addEventListener('drop', function (event) {
        event.preventDefault();
        dragArea.classList.remove('bg-gray-200', 'dark:bg-gray-700');

        const files = event.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files; // Set the files to the input field
            fileNameDisplay.textContent = files[0].name; // Show the file name
        }
    });

    // When user selects a file, update the displayed file name
    fileInput.addEventListener('change', function () {
        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name;
        }
    });
</script>
