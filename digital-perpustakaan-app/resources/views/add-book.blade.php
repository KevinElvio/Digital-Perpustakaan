<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're in Add Book !!") }}
                </div> --}}

                <form class="max-w-3xl mx-auto" action="{{ url('book') }}" method="POST">
                    @csrf


                    <div class="mb-5">
                        <label for="title" class="block mb-2 mt-10 text-sm font-bold text-gray-900 dark:text-black">
                            Title</label>
                        <input type="title" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder= "Add Title" required />
                    </div>



                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownDefaultRadio"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mb-5"
                        type="button">Category<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDefaultRadio"
                        class="z-10 hidden w-48 bg-blue-950 divide-y divide-gray-100 rounded-lg shadow">
                        <ul class="p-3 space-y-3 text-sm text-gray-700 " aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center">
                                    <input id="default-radio-1" type="radio" value="" name="default-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="default-radio-1"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fiksi</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <input checked id="default-radio-2" type="radio" value=""
                                        name="default-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="default-radio-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Non
                                        Fiksi</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <input id="default-radio-3" type="radio" value="" name="default-radio"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="default-radio-3"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sejarah</label>
                                </div>
                            </li>
                        </ul>
                    </div>


                    <div class="mb-5">
                        <label for="description" class="block mb-2 text-sm font-bold text-gray-900 dark:text-black">
                            Description</label>
                        <input type="description" id="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder= "Add Description" required />
                    </div>


                    <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900">Choose
                        quantity:</label>
                    <div class="relative flex items-center max-w-[8rem]">
                        <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input"
                            class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                            <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 1h16" />
                            </svg>
                        </button>
                        <input type="text" id="quantity-input" data-input-counter
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 "
                            placeholder="999" required />
                        <button type="button" id="increment-button" data-input-counter-increment="quantity-input"
                            class="bg-gray-100  hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100  focus:ring-2 focus:outline-none">
                            <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                        </button>
                    </div>
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 ">Please
                        select a 5 digit number from 0 to 9.</p>




                    <label class="block mb-2 text-sm font-medium text-gray-900 mt-5" for="default_size">Upload
                        PDF</label>
                    <input
                        class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 "
                        id="default_size" type="file">



                    <label class="block mb-2 text-sm font-medium text-gray-900 mt-5" for="default_size">Upload
                        Book Cover</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to
                                        upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 ">JPEG, PNG, or JPG</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>




                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 mb-10 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-5">Submit</button>


                </form>

            </div>
        </div>
    </div>
</x-app-layout>
