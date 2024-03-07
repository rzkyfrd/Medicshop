<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="px-10 py-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form
                    action="{{ $product->exists ? route('master.product.update', $product) : route('master.product.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($product->exists)
                        @method('PUT')
                    @endif
                    <div class="mb-2">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name', $product->name)" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        {{-- <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 max-w-xl" type="text" name="name"
                            :value="old('name', $product->name)" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                        <label for="category"
                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Select Category</label>
                        <select id="category_id" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Choose category</option>
                            @foreach ($category as $item)
                                <option {{ old('category_id', $product['category_id']) == $item->id ? 'selected' : '' }}
                                    value="{{ $item->id }}">{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="desc" :value="__('Desciption')" />
                        <x-text-area id="desc" class="block mt-1 w-full" name="desc"
                            value="{{ old('desc', $product->desc) }}" autofocus autocomplete="desc" />
                        <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-1 max-w-xl" type="File" name="image"
                            accept="image/png, image/jpeg" :value="old('image', $product->image)" autofocus autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 max-w-xl" type="number" name="price"
                            :value="old('price', $product->price)" autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="py-3">
                        <x-primary-button class="ml-3">
                            {{ __('Save') }}
                        </x-primary-button>

                        <x-danger-button role="button" class="ml-3">
                            <a class="waves-effect waves-light" href="{{ route('master.product.index') }}"
                                role="button">
                                {{ __('Back') }}
                            </a>
                            </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
