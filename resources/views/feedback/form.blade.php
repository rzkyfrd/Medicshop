<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot> --}}

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section>
                    <div class="mx-auto max-w-screen-xl {{ Auth::user() ? 'grid grid-cols-3' : '' }} gap-4 px-4 py-4 sm:px-6 sm:py-12 lg:px-8">
                        @if (!Auth::user())
                            <h2 class="text-center text-2xl font-bold"> Feedback From Out Customer</h2>
                        @endif
                        <div class="border px-4 py-1 rounded {{ Auth::user() ? 'max-w-3xl' : 'max-w-7xl' }} col-span-2 overflow-auto box-content {{ $feedbacks->count() == 0 ? 'flex items-center justify-center' : '' }}"
                            style="height: calc(100vh - 15rem);">
                            <ul class="space-y-4 mt-3">
                                @forelse ($feedbacks as $key => $feedback)
                                    <li class="flex flex-col {{ Auth::user() ? '' : 'text-lg' }}">
                                        <small class="flex">
                                            <x-input-label for="rating" :value="__('Rating')" />&nbsp;
                                            <div class="flex items-center">
                                                <svg class="cursor-pointer w-4 h-4 {{ $feedback->rating >= 1 ? 'text-yellow-300':'text-gray-300' }} ms-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="cursor-pointer w-4 h-4 {{ $feedback->rating >= 2 ? 'text-yellow-300':'text-gray-300' }} ms-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="cursor-pointer w-4 h-4 {{ $feedback->rating >= 3 ? 'text-yellow-300':'text-gray-300' }} ms-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="cursor-pointer w-4 h-4 {{ $feedback->rating >= 4 ? 'text-yellow-300':'text-gray-300' }} ms-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="cursor-pointer w-4 h-4 ms-1 {{ $feedback->rating >= 5 ? 'text-yellow-300':'text-gray-300' }} dark:text-gray-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                            </div>
                                        </small>
                                        <label for="name">{{ $feedback->user->name }}</label>
                                        <p>{{ $feedback->review }}</p>
                                    </li>
                                    @if ($key < $feedback->count() - 1)
                                        <hr class="text-gray-500">
                                    @endif
                                @empty
                                    <h2 class="text-center text-2xl font-bold"> No Feedback Yet</h2>
                                @endforelse
                            </ul>
                        </div>
                        @if(Auth::user())
                            <form action="{{ route('costumer-feedback.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="rating" id="rating">
                                <h1 class="font-bold text-2xl mb-4">Give Us Your Feedback</h1>
                                <div class="mb-2">
                                    <x-input-label for="rating" :value="__('Rating')" />
                                    <div class="flex items-center">
                                        <svg id="rate1" onclick="rate(1)"
                                            class="cursor-pointer w-4 h-4 text-gray-300 ms-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                        <svg id="rate2" onclick="rate(2)"
                                            class="cursor-pointer w-4 h-4 text-gray-300 ms-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                        <svg id="rate3" onclick="rate(3)"
                                            class="cursor-pointer w-4 h-4 text-gray-300 ms-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                        <svg id="rate4" onclick="rate(4)"
                                            class="cursor-pointer w-4 h-4 text-gray-300 ms-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                        <svg id="rate5" onclick="rate(5)"
                                            class="cursor-pointer w-4 h-4 ms-1 text-gray-300 dark:text-gray-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <x-input-label for="review" :value="__('Feedback')" />
                                    <x-text-area id="review" class="block mt-1 w-full" name="review"
                                        value="{{ old('review') }}" autofocus autocomplete="review" />
                                    <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                                </div>

                                <div class="py-2">
                                    <x-primary-button class="">
                                        {{ __('Send') }}
                                    </x-primary-button>
                                </div>

                            </form>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script type="module">
        window.rate = function(rate) {
            for (let index = 1; index <= 5; index++) {
                $('#rate' + index).removeClass('text-gray-300');
                $('#rate' + index).addClass('text-yellow-300');
                if (index > rate) {
                    $('#rate' + index).removeClass('text-yellow-300');
                    $('#rate' + index).addClass('text-gray-300');
                }
            }
            $('#rating').val(rate);
        }
    </script>
</x-app-layout>
