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

                    <div class="flex items-end justify-end p-4">
                        <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                            class="text-black bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center "
                            type="button" name="category">
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
                                    <input id="fiksi" type="checkbox" value="1"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                    <label for="fiksi" class="ml-2 text-sm font-medium text-gray-900">Fiksi</label>
                                </li>

                                <li class="flex items-center">
                                    <input id="nonfiksi" type="checkbox" value="2"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                    <label for="nonfiksi" class="ml-2 text-sm font-medium text-gray-900">Non
                                        Fiksi</label>
                                </li>

                                <li class="flex items-center">
                                    <input id="sejarah" type="checkbox" value="3"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500" />
                                    <label for="sejarah" class="ml-2 text-sm font-medium text-gray-900">Sejarah</label>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        @foreach ($book as $item)
                            <div
                                class="relative flex flex-col text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96 mr-5 mb-5">
                                <div
                                    class="relative h-56 overflow-hidden text-white shadow-lg bg-clip-border rounded-xl bg-blue-gray-500 shadow-blue-gray-500/40">
                                    <img src="{{ asset($item->cover) }}" alt="card-image" />
                                </div>
                                <div class="p-6">
                                    <h5
                                        class="block mb-2 font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                        {{ $item->title }}
                                    </h5>
                                    <p
                                        class="block font-sans text-base antialiased font-light leading-relaxed text-inherit">
                                        {{ $item->description }}
                                    </p>
                                </div>
                                <div class="p-6 pt-0">
                                    <button
                                        class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                                        type="button">
                                        Read More
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>



                    {{ $book->links() }}

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('input[type="checkbox"]').on('change', function() {
                var selectedCategories = [];

                $('input[type="checkbox"]:checked').each(function() {
                    selectedCategories.push($(this).val());
                });

                if (selectedCategories.length > 0) {
                    $('.book-item').hide(); 
                    $('.book-item').each(function() {
                        var itemCategory = $(this).data('category');

                        if (selectedCategories.includes(itemCategory.toString())) {
                            $(this).show();
                        }
                    });
                } else {
                    $('.book-item').show(); // Tampilkan semua jika tidak ada yang dipilih
                }
            });
        });
    </script>
</x-app-layout>
