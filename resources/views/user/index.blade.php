<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    {{-- session status --}}
    {{-- <x-auth-session-status class="mb-4" :status="Session('message')" /> --}}

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <h4 class="py-2">
                    <a class="btn btn-success waves-effect waves-light" href="{{ route('category.create') }}"
                        role="button">
                        Add Category
                    </a>
                </h4> --}}
                <table class="table table-bordered">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Role</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user as $item)
                            <tr align="center">
                                <td>{{ $item->id }}</td>
                                <td>
                                    @if ($item->is_admin == 1)
                                        Admin
                                    @else
                                        Customer
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->contact }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary">
                                        Edit
                                    </a>
                                    {{-- <button class="btn btn-danger">Delete</button> --}}

                                    <button class="btn btn-danger" data-id="{{ $item }}"
                                        data-nama="{{ $item }}"
                                        data-location="{{ route('category.edit', $item) }}">Delete
                                    </button>
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
