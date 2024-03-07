<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    {{-- session status --}}
    {{-- <x-auth-session-status class="mb-4" :status="Session('message')" /> --}}

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section>
                    <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 sm:py-12 lg:px-8">
                        <div class="mx-auto max-w-3xl">
                            <header class="text-center">
                                <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Your Cart</h1>
                            </header>

                            <div class="mt-8">
                                <ul class="space-y-4">
                                    @foreach ($cart as $row)
                                        <li class="flex items-center gap-4">
                                            <img src="{{ $row->product->image }}" alt=""
                                                class="size-16 rounded object-cover" />

                                            <div>
                                                <h3 class="text-sm text-gray-900">{{ $row->product->name }}</h3>

                                                <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                                    <div>
                                                        <dt class="inline">Category:</dt>
                                                        <dd class="inline">{{ $row->product->category->name }}</dd>
                                                    </div>

                                                    <div>
                                                        <dt class="inline">Price:</dt>
                                                        <dd class="inline">@currency($row->product->price)</dd>
                                                    </div>
                                                </dl>
                                            </div>

                                            <div class="flex flex-1 items-center justify-end gap-2">
                                                <form>
                                                    <label for="Line1Qty" class="sr-only"> Quantity </label>

                                                    <input type="number" min="1" value="{{ $row->quantity }}"
                                                        id="Line1Qty"
                                                        class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                                </form>

                                                <button class="text-gray-600 transition hover:text-red-600">
                                                    <span class="sr-only">Remove item</span>

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-4 w-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
                                    <div> </div>
                                    <div class="w-96 max-w-lg space-y-4">
                                        <dl class="space-y-0.5 text-sm text-gray-700">
                                            <div class="flex justify-between">
                                                <dt>Subtotal</dt>
                                                <dd>@currency($row->product->price * $row->quantity)</dd>
                                            </div>

                                            <div class="flex justify-between">
                                                <dt>shipping costs</dt>
                                                <dd>@currency(20000)</dd>
                                            </div>

                                            <div class="flex justify-between !text-base font-medium">
                                                <dt>Total</dt>
                                                <dd>£200</dd>
                                            </div>
                                        </dl>

                                        <div class="flex justify-end">
                                            <div class="px-2">
                                                <a class=" group relative inline-flex items-center overflow-hidden rounded bg-indigo-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500"
                                                    href="#">
                                                    <span
                                                        class="absolute -start-full transition-all group-hover:start-4">
                                                        <svg class="size-5 rtl:rotate-180"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                                        </svg>
                                                    </span>

                                                    <span class="text-sm font-medium transition-all group-hover:ms-4">
                                                        Continue shopping</span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#"
                                                    class="
                                                block rounded bg-green-800 px-5 py-3 text-sm text-white transition hover:bg-green-600">
                                                    Checkout
                                                </a>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>