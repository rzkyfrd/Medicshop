<x-app-layout>

    <div class="py-4">
        <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
            <div class="px-10 py-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <header class="text-center">
                    <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Order</h1>
                </header>
                <hr class="mt-2 mb-4">
                <form action="{{ $order->exists ? route('order.update', $order) : route('order.store') }}"
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
                                <label for="name" class="block text-xs font-medium text-gray-700"> Name
                                </label>
                                <input type="text"  name="name" id="name" placeholder="Input your name receipt..."
                                    class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" value="{{ old('name') }}" />
                            </div>
                            <div class="mb-3">
                                <label for="address" class="block text-xs font-medium text-gray-700"> Address
                                </label>
                                <input type="text"  name="address" id="address" placeholder="Input your address..."  value="{{ old('address') }}"
                                    class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="block text-xs font-medium text-gray-700"> Contact </label>
                                <input type="text" id="contact" name="contact" placeholder="input your number contact..."  value="{{ old('contact') }}"
                                    class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                            </div>
                        </div>
                        <div x-data="{method: '{{ old('payment_method') }}', city: '{{ old('city') }}'}">
                            <div class="mb-3">
                                <label for="date" class="block text-xs font-medium text-gray-700"> Date </label>
                                <input type="date" id="date" name="date" disabled value="{{ date('Y-m-d') }}"
                                    class="mt-1 w-full rounded-md border-gray-200 shadow-sm sm:text-sm" />
                            </div>
                            <div class="mb-3">
                                <label for="city" class="block text-xs font-medium text-gray-700"> City </label>
                                <select name="city" id="city" x-model="city"
                                    class="mt-1 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                                    <option>Please select city</option>
                                    <option {{ old('city') === 'Surabaya' ? 'selected' : '' }} value="Surabaya">Surabaya</option>
                                    <option {{ old('city') === 'Jakart' ? 'selected' : '' }} value="Jakarta">Jakarta</option>
                                    <option {{ old('city') === 'Bandung' ? 'selected' : '' }} value="Bandung">Bandung</option>
                                    <option {{ old('city') === 'Malang' ? 'selected' : '' }} value="Malang">Malang</option>
                                    <option {{ old('city') === 'Solo' ? 'selected' : '' }} value="Solo">Solo</option>
                                    <option {{ old('city') === 'Semarang' ? 'selected' : '' }} value="Semarang">Semarang</option>
                                    <option {{ old('city') === 'Jogja' ? 'selected' : '' }} value="Jogja">Jogja</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="payment_method" class="block text-xs font-medium text-gray-700"> Payment Method </label>
                                <select name="payment_method" id="payment_method" x-model="method"
                                    class="mt-1 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                                    <option>Please select payment method</option>
                                    <option {{ old('payment_method') === 'prepaid' ? 'selected' : '' }} value="prepaid">Prepaid</option>
                                    <option {{ old('payment_method') === 'postpaid' ? 'selected' : '' }} x-show="city === 'Surabaya'" value="postpaid">Postpaid</option>
                                </select>
                            </div>
                            <div class="mb-3" x-show="method === 'prepaid'">
                                <label for="bank" class="block text-xs font-medium text-gray-700"> Bank </label>
                                <select name="bank" id="bank"
                                    class="mt-1 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                                    <option>Please select bank</option>
                                    <option {{ old('bank') === 'credit' ? 'selected' : '' }} value="credit">Credit</option>
                                    <option {{ old('bank') === 'debit' ? 'selected' : '' }} value="debit">Debit</option>
                                    <option {{ old('bank') === 'paypal' ? 'selected' : '' }} value="paypal">Paypal</option>
                                </select>
                            </div>
                            <input type="hidden" name="paypal_id" value="{{ Auth::user()->paypal_id }}">
                        </div>
                    </div>

                    <div class="pb-3 text-center">
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
                <hr>
                <div class="overflow-auto h-44">
                    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="sticky top-0 bg-white whitespace-nowrap px-4 py-2 font-medium text-gray-900">Name</th>
                                <th class="sticky top-0 bg-white whitespace-nowrap px-4 py-2 font-medium text-gray-900">Category</th>
                                <th class="sticky top-0 bg-white whitespace-nowrap px-4 py-2 font-medium text-gray-900">Quantity</th>
                                <th class="sticky top-0 bg-white whitespace-nowrap px-4 py-2 font-medium text-gray-900">Price</th>
                                <th class="sticky top-0 bg-white whitespace-nowrap px-4 py-2 font-medium text-gray-900">Subtotal</th>
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
