<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot> --}}

    <div class="py-8">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="px-14 py-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form
                    action="{{ $category->exists ? route('master.category.update', $category) : route('master.category.store') }}"
                    method="POST">
                    @csrf
                    @if ($category->exists)
                        @method('PUT')
                    @endif
                    <div class="mb-2">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 max-w-xl" type="text" name="name"
                            :value="old('name', $category->name)" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="desc" :value="__('Desciption')" />
                        <x-text-area id="desc" class="block mt-1 w-full" name="desc"
                            value="{{ old('desc', $category->desc) }}" autofocus autocomplete="desc" />
                        <x-input-error :messages="$errors->get('desc')" class="mt-2" />
                    </div>

                    {{-- <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control @error('name') border-red-500 @enderror"
                            value="{{ old('name') }}" />
                        @error('name')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea type="text" name="desc" class="form-control" rows="3">{{ old('desc') }}</textarea>
                    </div> --}}

                    <div class="py-2">
                        <x-primary-button class="ml-3">
                            {{ __('Save') }}
                        </x-primary-button>

                        <x-danger-button role="button" class="ml-3">
                            <a class="waves-effect waves-light" href="{{ route('master.category.index') }}"
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
