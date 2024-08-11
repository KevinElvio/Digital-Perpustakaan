<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books Colection') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Filter Kategori -->
                    <div class="flex items-end justify-end p-4">
                        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                            class="text-black bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center "
                            type="button">
                            Filter by category
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow ">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 ">
                                Category
                            </h6>
                            <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                <li class="flex items-center">
                                    <input id="fiksi" type="checkbox" value="fiksi"
                                        class="category-filter w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 " />
                                    <label for="fiksi" class="ml-2 text-sm font-medium text-gray-900 ">
                                        Fiksi
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="nonfiksi" type="checkbox" value="nonfiksi"
                                        class="category-filter w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 " />
                                    <label for="nonfiksi" class="ml-2 text-sm font-medium text-gray-900 ">
                                        Non Fiksi
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="sejarah" type="checkbox" value="sejarah"
                                        class="category-filter w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 " />
                                    <label for="sejarah" class="ml-2 text-sm font-medium text-gray-900 ">
                                        Sejarah
                                    </label>
                                </li>
                            </ul>
                            <button type="button" id="filter-btn"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-3">Filter</button>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        @foreach ($book as $item)
                            <div
                                class="relative flex flex-col text-gray-700 bg-gray-300 shadow-md bg-clip-border rounded-xl w-96 mr-5 mb-5">
                                <div
                                    class="relative h-56 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                                    <img src="{{ asset($item->cover) }}" alt="card-image" />
                                </div>
                                <div class="p-6">
                                    <h5
                                        class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-900">
                                        {{ $item->title }}
                                    </h5>
                                    <h2 class="block mb-2 font-sans antialiased font-semibold leading-snug tracking-normal text-gray-900">
                                        @if($item->category_id == 1)
                                            Fiksi
                                        @elseif($item->category_id == 2)
                                            Non Fiksi
                                        @elseif($item->category_id == 3)
                                            Sejarah
                                        @else
                                            Kategori Lain
                                        @endif
                                    </h2>
                                    
                                    <p
                                        class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                                        {{ $item->description }}
                                    </p>
                                </div>
                                <div class="p-6 pt-0 flex">
                                    <a href="{{ url('book/'.$item->id.'/edit') }}"
                                        class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-2 rounded-lg bg-green-700 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none mr-4"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/></g></svg>
                                    </a>

                                    <a href=""
                                        class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-2 rounded-lg bg-red-700 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                                        type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><g fill="none" <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6zM19 4h-3.5l-1-1h-5l-1 1H5v2h14z"/></svg>
                                        </a>

                                    <h2 class="block mb-2 font-sans antialiased font-semibold leading-snug tracking-normal text-gray-900 mt-2 ml-32"><span>Jumlah : </span>{{ $item->quantity }}</h2>
                                </div>
                            </div>
                        @endforeach
                    </div>



                    {{ $book->links() }}

                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script>
        $(document).ready(function() {
            $('#filter-btn').on('click', function() {
                var selectedCategories = [];

                $('.category-filter:checked').each(function() {
                    selectedCategories.push($(this).val());
                });

                if (selectedCategories.length > 0) {
                    $('.book-item').hide();
                    $('.book-item').each(function() {
                        var itemCategory = $(this).data('category');

                        if (selectedCategories.includes(itemCategory)) {
                            $(this).show();
                        }
                    });
                } else {
                    $('.book-item').show();
                }
            });
        });
    </script>
</x-app-layout>
