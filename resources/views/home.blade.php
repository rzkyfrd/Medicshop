<x-app-layout>
    <div class="py-12 grid grid-cols-4 sm:px-16">
        <div class="mx-auto w-full sm:px-6 lg:px-2">
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
                                    {{-- <a href="">{{ $row->name }}</a> <br> --}}
                                    <div class="flex justify-between">
                                        <label class="cursor-pointer hover:font-semibold"
                                            for="category{{ $row->id }}">{{ $row->name }}</label>
                                        <input onchange="submitForm()"
                                            {{ in_array($row->id, $categories) ? 'checked' : '' }}
                                            class="rounded focus:ring-0 cursor-pointer" type="checkbox"
                                            value="{{ $row->id }}" name="category"
                                            id="category{{ $row->id }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4 col-span-3 w-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-2 lg:px-8">

                            <div class="mt-2 flex items-center justify-between">
                                <div class="flex rounded">
                                    {{-- <p class="text-sm text-gray-500">Showing <span> 4 </span> of 40</p> --}}
                                </div>
                                <div>
                                    <div class="flex items-center max-w-sm mx-auto">
                                        <label for="search" class="sr-only">Search</label>
                                        <div class="relative w-full">
                                            <input type="text" id="search"
                                                onkeydown="event.key == 'Enter' ? submitForm() : ''"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-1.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Search product name..." required
                                                value="{{ $keyword }}" />
                                        </div>
                                        <button type="submit" onclick="submitForm()"
                                            class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg>
                                            <span class="sr-only">Search</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-4">
                            @if ($product->count() == 0)
                                <div class="flex justify-center mt-4 font-semibold text-xl">
                                    <p>Product Tidak Ditemukan</p>
                                </div>
                            @endif

                            <ul class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

                                @foreach ($product as $row)
                                    <li class="border-2 border-gray-100">
                                        <div class="group relative block overflow-hidden">
                                            <a href="{{ route('master.product.detail', $row) }}">
                                                <img src="{{ $row->image }}" alt=""
                                                    class=" h-[200px] max-h-[200px] mx-auto transition duration-500 group-hover:scale-105 sm:h-72" />
                                            </a>

                                            <div class="relative border-t-4 border-gray-100 bg-white px-3 py-2 mt-1">
                                                <h3 class="mt-1 text-lg font-medium text-gray-900 font-bold">
                                                    {{ $row->name }}
                                                </h3>
                                                <p class="mt-1.5 text-sm text-gray-700">@currency($row->price)</p>
                                            </div>
                                            <div class="px-2 mb-2">
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    {{-- <input type="hidden" name=""> --}}
                                                    <input type="hidden" id="id" name="id"
                                                        value="{{ $row->id }}">
                                                    <input type="hidden" name="quantity" id="quantity" value="1">
                                                    <button
                                                        class="block w-full rounded bg-red-600 text-white px-4 py-2 mt-2 text-sm font-medium hover:bg-red-700">
                                                        Add to Cart
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            @if ($product->count() > 0)
                                <div class="w-full mt-4">
                                    {{ $product->links() }}
                                </div>
                            @endif
                        </div>
                    </section>

                </div>
            </div>
        </div>
        <form action="" id="mainForm">
            <input type="hidden" name="keyword" id="keyword" value="{{ $keyword }}">
            <input type="hidden" name="categories" id="categories">
        </form>
    </div>
    <script type="module">
        window.submitForm = function() {
            let categories = [];
            $("input:checkbox[name=category]:checked").each(function() {
                categories.push($(this).val());
            });
            $('#keyword').val($('#search').val());

            if (categories.length > 0 || $('#keyword').val() !== '') {
                $('#categories').show();
                $('#categories').val(JSON.stringify(categories));
            } else {
                $('#categories').hide();
            }
            $('#mainForm').submit();
        }
    </script>
</x-app-layout>
