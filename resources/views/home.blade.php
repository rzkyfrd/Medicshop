<x-app-layout>
    <div class="py-12 grid grid-cols-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4 col-span-3">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-2 lg:px-8">

                            <div class="mt-2 flex items-center justify-between">
                                <div class="flex rounded">
                                    <p class="text-sm text-gray-500">Showing <span> 4 </span> of 40</p>
                                </div>
                                <div>
                                    <form class="flex items-center max-w-sm mx-auto">
                                        <label for="simple-search" class="sr-only">Search</label>
                                        <div class="relative w-full">
                                            <input type="text" id="simple-search"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Search product name..." required />
                                        </div>
                                        <button type="submit"
                                            class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                            <span class="sr-only">Search</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <ul class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

                                @foreach ($product as $row)
                                    <li class="border-2 border-gray-100">
                                        <a href="#" class="group relative block overflow-hidden">
                                            <img src="{{ $row->image }}" alt=""
                                                class=" h-[200px] max-h-[200px] mx-auto transition duration-500 group-hover:scale-105 sm:h-72" />

                                            <div class="relative border-t-4 border-gray-100 bg-white px-3 py-2 mt-1">
                                                <h3 class="mt-1 text-lg font-medium text-gray-900 font-bold">
                                                    {{ $row->name }}
                                                </h3>
                                                <p class="mt-1.5 text-sm text-gray-700">@currency($row->price)</p>
                                                <form class="mt-4">
                                                    <input type="hidden" name="">
                                                    <button
                                                        class="block w-full rounded bg-red-600 text-white p-4 hover text-sm font-medium transition hover:scale-105">

                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <ol class="mt-8 flex justify-center gap-1 text-xs font-medium">
                                <li>
                                    <a href="#"
                                        class="inline-flex size-8 items-center justify-center rounded border border-gray-100">
                                        <span class="sr-only">Prev Page</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>

                                <li>
                                    <a href="#"
                                        class="block size-8 rounded border border-gray-100 text-center leading-8">
                                        1
                                    </a>
                                </li>

                                <li class="block size-8 rounded border-black bg-black text-center leading-8 text-white">
                                    2</li>

                                <li>
                                    <a href="#"
                                        class="block size-8 rounded border border-gray-100 text-center leading-8">
                                        3
                                    </a>
                                </li>

                                <li>
                                    <a href="#"
                                        class="block size-8 rounded border border-gray-100 text-center leading-8">
                                        4
                                    </a>
                                </li>

                                <li>
                                    <a href="#"
                                        class="inline-flex size-8 items-center justify-center rounded border border-gray-100">
                                        <span class="sr-only">Next Page</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </section>

                </div>
            </div>
        </div>
        <div class="mx-auto w-full sm:px-6 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <div class="text-center mb-8">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Categories') }}
                            </h2>
                        </div>
                        {{-- <div class="space-y-2">
                            <details
                                class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
                                <summary
                                    class="flex cursor-pointer items-center justify-between gap-2 bg-white p-4 text-gray-900 transition">
                                    <span class="text-sm font-medium"> Availability </span>

                                    <span class="transition group-open:-rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </span>
                                </summary>

                                <div class="border-t border-gray-200 bg-white">
                                    <header class="flex items-center justify-between p-4">
                                        <span class="text-sm text-gray-700"> 0 Selected </span>

                                        <button type="button"
                                            class="text-sm text-gray-900 underline underline-offset-4">
                                            Reset
                                        </button>
                                    </header>

                                    <ul class="space-y-1 border-t border-gray-200 p-4">
                                        <li>
                                            <label for="FilterInStock" class="inline-flex items-center gap-2">
                                                <input type="checkbox" id="FilterInStock"
                                                    class="size-5 rounded border-gray-300" />

                                                <span class="text-sm font-medium text-gray-700"> In Stock (5+) </span>
                                            </label>
                                        </li>

                                        <li>
                                            <label for="FilterPreOrder" class="inline-flex items-center gap-2">
                                                <input type="checkbox" id="FilterPreOrder"
                                                    class="size-5 rounded border-gray-300" />

                                                <span class="text-sm font-medium text-gray-700"> Pre Order (3+) </span>
                                            </label>
                                        </li>

                                        <li>
                                            <label for="FilterOutOfStock" class="inline-flex items-center gap-2">
                                                <input type="checkbox" id="FilterOutOfStock"
                                                    class="size-5 rounded border-gray-300" />

                                                <span class="text-sm font-medium text-gray-700"> Out of Stock (10+)
                                                </span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </details>
                        </div> --}}
                        <div class="text-left px-4">
                            @foreach ($category as $row)
                                <div class="mb-2">
                                    <a href="">{{ $row->name }}</a> <br>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
