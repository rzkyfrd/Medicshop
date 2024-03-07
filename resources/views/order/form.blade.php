<x-app-layout>

    <div class="py-4">
        <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
            <div class="px-10 py-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <header class="text-center">
                    <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Order</h1>
                </header>
                <hr class="mt-2 mb-4">
                <form action="{{ $order->exists ? route('master.order.update', $order) : route('master.order.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($order->exists)
                        @method('PUT')
                    @endif
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="mb-3">
                                <label for="user_id" class="block text-xs font-medium text-gray-700"> User ID </label>
                                <input type="text" disabled id="user_id" placeholder="User ID"
                                    class="mt-1 w-full rounded-md border-gray-200 bg-gray-300 shadow-sm sm:text-sm"
                                    value="{{ Auth::user()->id }}" />
                            </div>
                            <div class="mb-3">
                                <label for="name" class="block text-xs font-medium text-gray-700"> Addressee
                                </label>
                                <input type="text" id="name" placeholder="input your name receipt..."
                                    class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="block text-xs font-medium text-gray-700"> Contact </label>
                                <input type="text" id="contact" placeholder="input your number contact..."
                                    class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                            </div>
                        </div>
                        <div>
                            <div class="mb-3">
                                <label for="Address" class="block text-xs font-medium text-gray-700"> Address </label>
                                <textarea type="text" id="Address" style="resize: none;" placeholder="input your Address..."
                                    class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="block text-xs font-medium text-gray-700"> City </label>
                                <select name="city" id="city"
                                    class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                                    <option value="">Please select city</option>
                                    <option value="Surabaya">Surabaya</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Bandung">Bandung</option>
                                    <option value="Malang">Malang</option>
                                    <option value="Solo">Solo</option>
                                    <option value="Semarang">Semarang</option>
                                    <option value="Jogja">Jogja</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="py-3 text-center">
                        <x-primary-button class="ml-3">
                            {{ __('Procced') }}
                        </x-primary-button>

                        <x-danger-button role="button" class="ml-3">
                            <a class="waves-effect waves-light" href="{{ route('cart.index') }}" role="button">
                                {{ __('Back') }}
                            </a>
                            </x-primary-button>
                    </div>
                </form>

                <div class="text-xl text-left font-bold text-gray-900 ">Item list Order</div>
                <hr class="mt-1 mb-4">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Category</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Quantity</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Price</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Subtotal</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @foreach ($cart as $row)
                                <tr class="odd:bg-gray-50">
                                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                        {{ $row->product->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                        {{ $row->product->category->name }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                        {{ $row->quantity }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                        @currency($row->product->price)
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                        {{ $row->product->price }}*{{ $row->quantity }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
