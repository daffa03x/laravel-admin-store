<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto px-4 sm:px-8">
                        <h1 class="text-lg mb-6 text-center">Form Ubah Game</h1>
                        <form action="{{ route('game.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="game">
                                    Game
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="game" type="text" placeholder="Game" name="name"
                                    value="{{ $data->name }}" />
                            </div>
                            <div class="w-full mx-auto">
                                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori :
                                </label>
                                <div class="mt-1 relative">
                                    <select id="kategori" name="id_kategori"
                                        class="block w-full py-2 px-4 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($kategori as $item)
                                            @if ($item->id === $data->id_kategori)
                                                <option value="{{ $item->id }}" selected>{{ $item->name_kategori }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name_kategori }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <!-- Heroicon name: solid/chevron-down -->
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10.707 14.293a1 1 0 001.414-1.414l-5-5a1 1 0 00-1.414 0l-5 5a1 1 0 001.414 1.414L10 9.414l.707.707z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mx-auto">
                                <label for="item" class="block text-sm font-medium text-gray-700">Item :
                                </label>
                                <div class="mt-1 relative">
                                    <select id="item" name="id_item"
                                        class="block w-full py-2 px-4 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($item_game as $item)
                                            @if ($item->id === $data->id_item)
                                                <option value="{{ $item->id }}" selected>{{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <!-- Heroicon name: solid/chevron-down -->
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10.707 14.293a1 1 0 001.414-1.414l-5-5a1 1 0 00-1.414 0l-5 5a1 1 0 001.414 1.414L10 9.414l.707.707z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <!-- Image input field -->
                            <div class="mb-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                <div class="mt-1 flex items-center">
                                    <label for="image"
                                        class="flex items-center justify-center w-1/4 h-40 bg-gray-100 border rounded-lg cursor-pointer hover:bg-gray-200">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        <span class="ml-2 text-sm font-medium text-gray-700">Choose a file</span>
                                        <input type="file" id="image" name="image" class="hidden"
                                            onchange="previewImage(event)">
                                    </label>
                                    <img id="preview" class="mx-2 w-1/4 h-40 object-cover rounded"
                                        style="display: none;">
                                </div>
                            </div>
                            <div>
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onloadend = () => {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>
