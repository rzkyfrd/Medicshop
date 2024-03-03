<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    {{-- session status --}}
    {{-- <x-auth-session-status class="mb-4" :status="Session('message')" /> --}}

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h4 class="py-2">
                    <a class="btn btn-success waves-effect waves-light" href="{{ route('category.create') }}"
                        role="button">
                        Add Category
                    </a>
                </h4>
                <table class="table table-bordered">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Desc</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($category as $item)
                            <tr align="center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->desc }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">
                                        Edit
                                    </a>
                                    <button class="btn btn-danger">Delete</button>
                                    {{-- <button class="btn btn-danger btn-sm" data-id="{{ $row->id }}" data-nama="{{ $row->namabarang }}" data-location="/deletebarang/{{ $row->id }}">
                                        <i class="uil uil-trash-alt font-size-15"></i>
                                    </button> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" align="center">No Data Found</td>
                            </tr>
                        @endforelse ()
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
