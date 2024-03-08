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

            <div class="py-2 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg mb-20">
                <h4 class="py-2">
                    <a class="btn btn-success waves-effect waves-light" href="{{ route('master.product.create') }}"
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
                            <th class="w-40">Action</th>
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
                                <td class="flex items-center gap-2">
                                    <a href="{{ route('master.product.edit', $item) }}" class="btn btn-primary">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('master.product.destroy', $item) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger bg-red-600 hover:bg-white hover:text-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" align="center">No Data Found</td>
                            </tr>
                        @endforelse ()
                    </tbody>
                </table>
                <div class="w-full my-4">
                    {{ $product->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
