<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Voucher') }}
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
                                Data Voucher
                            </div>
                            <a href="{{ route('voucher.create') }}"
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
                                        Item
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider whitespace-nowrap">
                                        Kategori
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider whitespace-nowrap">
                                        Game
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider whitespace-nowrap">
                                        Price
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider whitespace-nowrap">
                                        Quantity
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider whitespace-nowrap">
                                        Discount
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-4 text-left text-sm font-medium text-gray-700 uppercase tracking-wider whitespace-nowrap">
                                        Expired At
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($data as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            {{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            {{ $item->name_item }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            {{ $item->name_kategori }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            {{ $item->name_game }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            {{ $item->price }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            {{ $item->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            {{ $item->discount }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            {{ $item->expired_at }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-left">
                                            <a href="{{ route('voucher.edit', $item->id) }}"
                                                class="text-blue-500 hover:text-blue-700 hover:underline mr-2">Edit</a>
                                            <a href="{{ route('voucher.destroy', $item->id) }}"
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
