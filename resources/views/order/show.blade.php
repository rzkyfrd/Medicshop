<x-app-layout>

    {{-- session status --}}
    {{-- <x-auth-session-status class="mb-4" :status="Session('message')" /> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <section>
                    <div class="mx-auto max-w-screen-xl px-4 py-4 sm:px-6 sm:py-12 lg:px-8">
                        <div class="flex justify-end py-2">
                            <a href="{{ route('order.print', $order) }}" class="block rounded bg-green-400 w-32 py-1 text-center text-sm text-white transition hover:bg-green-500" href="">
                                Print
                            </a>
                        </div>
                        <div class="border px-4 py-1 mx-0 w-full rounded overflow-y-auto"
                            style="height: calc(100vh - 15rem);" id="print-section">
                            <div class="my-4 w-full flex flex-col justify-center items-center">
                                <x-application-logo class="block h-14 w-52 fill-current text-gray-800" />
                                <br>
                                <b><u>{{ 'ORD/' . strtotime($order->created_at) }}</u></b>
                            </div>
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>User</td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>{{ Auth::user()->name }} <hr> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>{{ $order->name }} <hr> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>{{ $order->address }} <hr> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Contact</td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>{{ $order->contact }} <hr> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>Date</td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>{{ date('d-m-Y', strtotime($order->created_at)) }} <hr> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Paypal ID</td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>{{ Auth::user()->paypal_id ?? '-' }} <hr> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bank</td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>{{ $order->bank }} <hr> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Payment Method</td>
                                                        <td>&nbsp;:&nbsp;</td>
                                                        <td>{{ $order->payment_method }} <hr> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <br>
                                        <table style="margin-top: 20px;border: 1px solid;width: 100%;text-align: center;">
                                            <thead>
                                                <tr style="border: 1px solid;">
                                                    <th style="border: 1px solid;width: 5%;">No.</th>
                                                    <th style="border: 1px solid">Product Name</th>
                                                    <th style="border: 1px solid;width: 10%;">Quantity</th>
                                                    <th style="border: 1px solid;width: 20%;">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->details as $item)
                                                    <tr style="border: 1px solid;">
                                                        <td style="padding: 0 10px;border: 1px solid;">{{ $loop->iteration }}</td>
                                                        <td style="padding: 0 10px;border: 1px solid;text-align: left;">{{ $item->product->name }}</td>
                                                        <td style="padding: 0 10px;border: 1px solid;">{{ $item->quantity }}</td>
                                                        <td style="padding: 0 10px;border: 1px solid;">
                                                            <table style="width: 100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="text-align: left">Rp.</td>
                                                                        <td style="text-align: right">{{ number_format(($item->quantity*$item->price),2,',','.') }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr style="border: 1px solid;">
                                                    <td style="padding: 0 10px;border: 1px solid;" colspan="3">Total (Including Tax)</td>
                                                    <td style="padding: 0 10px;border: 1px solid;">
                                                        <table style="width: 100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="text-align: left">Rp.</td>
                                                                    <td style="text-align: right">{{ number_format($order->details->sum(function ($item) {
                                                                        return $item->quantity*$item->price;
                                                                    }),2,',','.') }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
