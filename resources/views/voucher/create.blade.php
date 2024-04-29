<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voucher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto px-4 sm:px-8">
                        <h1 class="text-lg mb-6 text-center">Form Tambah Voucher</h1>
                        <form action="{{ route('voucher.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm mb-2" for="price">
                                    Price
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="price" type="text" placeholder="Price" name="price" />
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm mb-2" for="quantity">
                                    Quantity
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="quantity" type="text" placeholder="Quantity" name="quantity" />
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm mb-2" for="discount">
                                    Discount
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="discount" type="text" placeholder="Discount" name="discount" />
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm mb-2" for="expired_at">
                                    Expired Date
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="expired_at" type="date" placeholder="Expired Date" name="expired_at" />
                            </div>
                            <div class="w-full mx-auto mb-4">
                                <label for="game" class="block text-sm font-medium text-gray-700">Game
                                </label>
                                <div class="mt-1 relative">
                                    <select id="game" name="id_game"
                                        class="block w-full py-2 px-4 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($game as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
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
