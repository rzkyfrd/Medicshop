<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot> --}}

    {{-- session status --}}
    {{-- <x-auth-session-status class="mb-4" :status="Session('message')" /> --}}

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="py-2 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr align="center">
                            <th>No.</th>
                            <th>Time Ordered</th>
                            <th>User</th>
                            <th class="w-[40%]">Items</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th class="w-30">Action</th>
                        </tr>
                    </thead>
                    <tbody style="vertical-align: middle">
                        @forelse ($orders as $order)
                            <tr align="center" style="font-size:14px">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($order->created_at)) }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td class="text-left">
                                    @foreach ($order->details as $key => $item)
                                        <div>
                                            <p>{{ $item->product->name }} x{{$item->quantity}} - @ @currency($item->price)</p>
                                        </div>
                                        @if ($key < $order->details()->count()-1)
                                            <hr class="mb-2">
                                        @endif
                                    @endforeach
                                </td>
                                <td>@currency($order->details->sum(function ($item) {
                                    return $item->quantity*$item->price;
                                }))</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <div class="flex flex-col gap-2">
                                        @if ($order->status === 'Waiting For Payment')
                                            <button
                                            x-data={}
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-order-process')"
                                            type="submit" class="btn btn-info bg-blue-300 hover:bg-white hover:text-blue-400">Process</button>

                                            <x-modal name="confirm-order-process" focusable>
                                                <form method="POST" action="{{ route('order.destroy', $order) }}" class="p-6">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="Process">

                                                    <h2 class="text-lg font-medium text-gray-900">
                                                        {{ __('Change this order status to Process ?') }}
                                                    </h2>

                                                    <p class="mt-1 text-sm text-gray-600">
                                                        {{ __('This action will change order status to Process') }}
                                                    </p>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>

                                                        <x-primary-button class="ms-3">
                                                            {{ __('Process') }}
                                                        </x-primary-button>
                                                    </div>
                                                </form>
                                            </x-modal>
                                        @else
                                            <button
                                            x-data={}
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-order-shipping')"
                                            type="submit" class="btn btn-warning bg-yellow-400 hover:bg-white hover:text-yellow-500">Shipping</button>

                                            <x-modal name="confirm-order-shipping" focusable>
                                                <form method="POST" action="{{ route('order.destroy', $order) }}" class="p-6">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="Shipping">

                                                    <h2 class="text-lg font-medium text-gray-900">
                                                        {{ __('Change this order status to Shipping ?') }}
                                                    </h2>

                                                    <p class="mt-1 text-sm text-gray-600">
                                                        {{ __('This action will change order status to Shipping') }}
                                                    </p>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>

                                                        <x-primary-button class="ms-3">
                                                            {{ __('Shipping') }}
                                                        </x-primary-button>
                                                    </div>
                                                </form>
                                            </x-modal>
                                        @endif
                                        <button
                                        x-data={}
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-order-cancel')"
                                        type="submit" class="btn btn-danger bg-red-500 hover:bg-white hover:text-red-600">Cancel</button>

                                        <x-modal name="confirm-order-cancel" focusable>
                                            <form method="POST" action="{{ route('order.destroy', $order) }}" class="p-6">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="Canceled">

                                                <h2 class="text-lg font-medium text-gray-900">
                                                    {{ __('Change this order status to Canceled ?') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-gray-600">
                                                    {{ __('This action will change order status to Canceled') }}
                                                </p>

                                                <div class="mt-6 flex justify-end">
                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                        {{ __('Cancel') }}
                                                    </x-secondary-button>

                                                    <x-primary-button class="ms-3">
                                                        {{ __('Continue') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </x-modal>
                                    </div>
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
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
