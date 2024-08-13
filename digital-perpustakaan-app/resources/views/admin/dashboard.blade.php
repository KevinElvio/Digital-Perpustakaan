<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADMIN') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-10 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-10 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-10 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-10 py-3">
                                    File
                                </th>
                                <th scope="col" class="px-10 py-3">
                                    Cover
                                </th>
                                <th scope="col" class="px-10 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-10 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($book as $item)
                                <tr class="odd:bg-white  even:bg-gray-50  border-b ">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $item->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->quantity }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->file }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset($item->cover) }}" alt="card-image" />
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($item->category_id == 1)
                                            Fiksi
                                        @elseif($item->category_id == 2)
                                            Non Fiksi
                                        @elseif($item->category_id == 3)
                                            Sejarah
                                        @else
                                            Kategori Lain
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ url('book/' . $item->id . '/edit') }}"
                                            class="font-medium text-blue-600  hover:underline">Edit</a>
                                    </td>

                                    <td class="px-6 py-4">
                                        <form action="{{ url('book/' . $item->id . '/delete') }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this book?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:underline">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <a href="{{ url('admin/export') }}" type="button"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-5">Download
                    books.xlsx</a>


            </div>
        </div>
    </div>
</x-app-layout>
