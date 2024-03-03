<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                            <div class="mt-8">
                                <p class="text-sm text-gray-500">Showing <span> 4 </span> of 40</p>
                            </div>
                            <div class="mt-8 flex items-center justify-between">
                                <div class="flex rounded border border-gray-100">
                                    <button
                                        class="inline-flex size-10 items-center justify-center border-e text-gray-600 transition hover:bg-gray-50 hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                        </svg>
                                    </button>

                                    <button
                                        class="inline-flex size-10 items-center justify-center text-gray-600 transition hover:bg-gray-50 hover:text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                                        </svg>
                                    </button>
                                </div>
                                <div>
                                    <label for="SortBy" class="sr-only">SortBy</label>

                                    <select id="SortBy" class="h-10 rounded border-gray-300 text-sm">
                                        <option>Sort By</option>
                                        <option value="Title, DESC">Title, DESC</option>
                                        <option value="Title, ASC">Title, ASC</option>
                                        <option value="Price, DESC">Price, DESC</option>
                                        <option value="Price, ASC">Price, ASC</option>
                                    </select>
                                </div>
                            </div>

                            <ul class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                                <li>
                                    <a href="#" class="group block overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                            alt=""
                                            class="h-[250px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[350px]" />

                                        <div class="relative bg-white pt-3">
                                            <h3
                                                class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                                Basic Tee
                                            </h3>

                                            <p class="mt-2">
                                                <span class="sr-only"> Regular Price </span>

                                                <span class="tracking-wider text-gray-900"> £24.00 GBP </span>
                                            </p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="group block overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                            alt=""
                                            class="h-[250px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[350px]" />

                                        <div class="relative bg-white pt-3">
                                            <h3
                                                class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                                Basic Tee
                                            </h3>

                                            <p class="mt-2">
                                                <span class="sr-only"> Regular Price </span>

                                                <span class="tracking-wider text-gray-900"> £24.00 GBP </span>
                                            </p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="group block overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                            alt=""
                                            class="h-[250px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[350px]" />

                                        <div class="relative bg-white pt-3">
                                            <h3
                                                class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                                Basic Tee
                                            </h3>

                                            <p class="mt-2">
                                                <span class="sr-only"> Regular Price </span>

                                                <span class="tracking-wider text-gray-900"> £24.00 GBP </span>
                                            </p>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="group block overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                                            alt=""
                                            class="h-[250px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[350px]" />

                                        <div class="relative bg-white pt-3">
                                            <h3
                                                class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                                Basic Tee
                                            </h3>

                                            <p class="mt-2">
                                                <span class="sr-only"> Regular Price </span>

                                                <span class="tracking-wider text-gray-900"> £24.00 GBP </span>
                                            </p>
                                        </div>
                                    </a>
                                </li>
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
    </div>
</x-app-layout>
