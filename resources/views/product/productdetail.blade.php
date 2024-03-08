<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Product') }}
        </h2>
    </x-slot> --}}

    {{-- session status --}}
    {{-- <x-auth-session-status class="mb-4" :status="Session('message')" /> --}}

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{ $product->id }}">
                            <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-2 lg:px-8">
                                <p class="text-right font-semibold mb-2">
                                    <a href="/"><x-fas-arrow-left-long class="w-4 inline-block mr-4" /> Back</a>
                                </p>
                                <div class="flex gap-4">
                                    <div class="group block overflow-hidden w-full">
                                        <img src="{{ asset($product['image']) }}" alt=""
                                            class="h-[250px] max-h-[300px] mx-auto transition duration-500 group-hover:scale-105 sm:h-[350px]" />
                                    </div>
                                    <div class="border rounded-lg p-2 px-4 w-full">
                                        <div class="w-full text-3xl font-bold">
                                            <p>{{ $product->name }}</p>
                                        </div>
                                        <div class="w-full text-gray-500">
                                            <p>{{ $product->category?->name }}</p>
                                        </div>
                                        <div class="w-full mt-2 text-3xl font-bold text-red-500">
                                            <p>@currency($product->price)</p>
                                        </div>
                                        <div class="mt-4">
                                            <p>{{ $product->desc }}</p>
                                        </div>
                                        <div class="mt-2 flex w-full justify-start items-center gap-4">
                                            <div>
                                                <label for="quantity" class="sr-only"> Quantity </label>
                                                <div x-data="{ quantity: 1 }"
                                                    class="flex items-center rounded border border-gray-200">
                                                    <button x-on:click="quantity = (quantity == 1 ) ? 1 : quantity-1"
                                                        type="button"
                                                        class="size-10 leading-10 text-gray-600 transition hover:opacity-75">
                                                        &minus;
                                                    </button>

                                                    <input type="number" id="quantity" x-model="quantity"
                                                        name="quantity"
                                                        class="h-10 w-16 border-transparent text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />

                                                    <button x-on:click="quantity++" type="button"
                                                        class="size-10 leading-10 text-gray-600 transition hover:opacity-75">
                                                        &plus;
                                                    </button>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="inline-block rounded bg-red-600 px-14 py-3 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-red-500">
                                                ADD TO CART
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
