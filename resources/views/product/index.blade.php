<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    {{-- session status --}}
    {{-- <x-auth-session-status class="mb-4" :status="Session('message')" /> --}}

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h4 class="py-2">
                    <a class="btn btn-success waves-effect waves-light" href="{{ route('product.create') }}"
                        role="button">
                        Add Product
                    </a>
                </h4>
                <table class="table table-bordered">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th style="width: 280px">Name</th>
                            <th style="width: 140px">Category</th>
                            <th style="width: 240px">Description</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle">
                        @forelse ($product as $item)
                            <tr align="center" style="font-size:14px">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->desc }}</td>
                                <td>
                                    <img style="width:120px;" src="{{ asset($item['image']) }}">
                                </td>
                                <td>@currency($item->price)</td>
                                <td>
                                    <a href="{{ route('product.edit', $item) }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                    {{-- <button class="btn btn-danger">Delete</button> --}}

                                    <button class="btn btn-danger" data-id="{{ $item }}"
                                        data-nama="{{ $item }}"
                                        data-location="{{ route('product.edit', $item) }}">Delete
                                    </button>
                                    {{-- <button class="btn btn-danger btn-sm" data-id="{{ $row->id }}" data-nama="{{ $row->namabarang }}" data-location="/deletebarang/{{ $row->id }}">
                                        <i class="uil uil-trash-alt font-size-15"></i>
                                    </button> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" align="center">No Data Found</td>
                            </tr>
                        @endforelse ()
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
