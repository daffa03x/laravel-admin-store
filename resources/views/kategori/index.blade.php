<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori') }}
        </h2>
    </x-slot>
    <x-success-message />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col">
                        <div class="flex items-center mb-4">
                            <div class="p-2 font-semibold text-xl text-gray-800 leading-tight">
                                Data Kategori
                            </div>
                            <a href="{{ route('kategori.create') }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-auto">
                                Tambah
                            </a>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200 w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider whitespace-nowrap">
                                        No
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider whitespace-nowrap">
                                        Kategori
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider whitespace-nowrap">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($data as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            {{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            {{ $item->name_kategori }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            <a href="{{ route('kategori.edit', $item->id) }}"
                                                class="text-blue-500 hover:text-blue-700 hover:underline mr-2">Edit</a>
                                            <a href="{{ route('kategori.destroy', $item->id) }}"
                                                class="text-red-500 hover:text-red-700 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr></tr>
                            </tfoot>
                        </table>
                        <div class="mt-7 mb-4">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
