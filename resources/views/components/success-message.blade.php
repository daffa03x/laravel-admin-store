@if (Session::has('success'))
    <div id="toast"
        class="fixed top-2 right-0 z-50 px-4 py-2 mb-4 mr-4 text-white bg-green-500 rounded shadow-lg opacity-0 transition-opacity duration-300">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="mr-3">
                    <!-- Success icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div>
                    <!-- Message for the toast -->
                    <div class="text-sm font-semibold">Success!</div>
                    <!-- Additional information or description -->
                    <div class="text-xs">{{ Session::get('success') }}</div>
                </div>
            </div>
            <button class="text-white hover:text-gray-300 mb-5 ms-3"
                onclick="document.getElementById('toast').classList.add('opacity-0')">
                <!-- Close icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('toast').classList.remove('opacity-0');
            setTimeout(function() {
                document.getElementById('toast').remove();
            }, 2000);
        }, 100);
    </script>
@endif
