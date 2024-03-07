<x-app-layout>

    {{-- session status --}}
    {{-- <x-auth-session-status class="mb-4" :status="Session('message')" /> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section>
                    <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 sm:py-12 lg:px-8">
                        <div class="border px-4 py-1 mx-0 w-full rounded overflow-y-auto"
                            style="height: calc(100vh - 15rem);">
                            <ul class="space-y-4 mt-3 mb-4">
                                @foreach ($orders as $key => $order)
                                    <div class="flex justify-between items-start gap-4">
                                        <div class="flex w-full flex-col gap-4">
                                            @foreach ($order->details as $row)
                                                <li class="flex justify-between items-center gap-4">
                                                    <div class="flex items-center gap-4">
                                                        <img src="{{ $row->product->image }}" alt=""
                                                            class="size-16 rounded object-cover" />

                                                        <div>
                                                            <h3 class="text-sm text-gray-900">{{ $row->product->name }}</h3>

                                                            <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                                                <div>
                                                                    <dt class="inline">Category:</dt>
                                                                    <dd class="inline">{{ $row->product->category->name }}
                                                                    </dd>
                                                                </div>

                                                                <div>
                                                                    <dt class="inline">Price:</dt>
                                                                    <dd class="inline">@currency($row->product->price)</dd>
                                                                </div>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        {{-- <h3 class="text-sm text-gray-900">{{ $order->name }}</h3> --}}
                                                        <table class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <dt class="inline">Quantity</dt>
                                                                    </td>
                                                                    <td>
                                                                        : <dd class="inline">{{ $row->quantity }}
                                                                        </dd>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <dt class="inline">Sub Total</dt>
                                                                    </td>
                                                                    <td>
                                                                        : <dd class="inline">@currency($row->quantity*$row->price)</dd>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </div>

                                        <div class="max-w-lg space-y-4 ">
                                            <dl class="space-y-0.5 text-sm text-gray-700">
                                                <div class="flex justify-between">
                                                    <dt>Payment Method</dt>
                                                    <dd class="uppercase">{{ $order->payment_method }}</dd>
                                                </div>
                                                <div class="flex justify-between">
                                                    <dt>Bank</dt>
                                                    <dd>{{ $order->bank }}</dd>
                                                </div>
                                                <div class="flex justify-between">
                                                    <dt>Status</dt>
                                                    <dd>{{ $order->status }}</dd>
                                                </div>
                                                <div class="flex justify-between">
                                                    <dt>Grand Total</dt>
                                                    <dd class="font-bold">@currency($order->details->sum(function ($item) {
                                                        return $item->quantity*$item->price;
                                                    }))</dd>
                                                </div>
                                            </dl>

                                            <div class="flex flex-col justify-between w-80 gap-2">
                                                <div class="flex justify-between gap-2">
                                                    <a href="{{ route('order.show', $order) }}" class="block rounded bg-blue-400 w-full py-1 text-center text-sm text-white transition hover:bg-blue-500" href="">
                                                        Detail
                                                    </a>
                                                    <a class="block rounded bg-green-400 w-full py-1 text-center text-sm text-white transition hover:bg-green-500" href="">
                                                        Cetak
                                                    </a>
                                                </div>
                                                <form method="POST" class="w-full" action="{{ route('order.destroy', $order) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="block rounded bg-red-600 w-full py-1 text-center text-sm text-white transition hover:bg-red-800">
                                                        Cancel
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($key < $order->count() - 1)
                                        <hr class="text-gray-500">
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
