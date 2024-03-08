<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style media="screen">
            @page {
                page: 21cm 29.7cm;
                margin: 1.5cm 0cm  0cm 0cm;
            }

            @font-face {
                font-size:12px;
            }

            /** setting untuk setiap halaman pdf **/
            body {
                width: 19cm;
                padding-right: 1cm;
                padding-left: 1cm;
                padding-top: 0cm;
                padding-bottom: 1cm;
                font-family: 'Arial Narrow', Arial, sans-serif;
            }

            /** setting untuk underline **/
            hr{
                padding: 0px;
                margin: 0px;
                border: 0.5px solid;
            }

            /** setting untuk paragraph **/
            p{
                line-height: 1;
            }

            /** setting untuk header pdf **/
            #header {
                position: relative;
                width: 16cm;
            }

            table { border-collapse: collapse; }

            tr, td { padding: 0; }
		</style>

</head>
<body>

    <div id="header">
    </div>

	<main>
        <div style="text-align: center">
            <img style="margin-left: auto;margin-right: auto;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/logo.png'))) }}" alt="">
            <br><br>
            <b><u>{{ 'ORD/' . strtotime($order->created_at) }}</u></b>
        </div>
        <br><br>
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
                        <table style="width: 100%;">
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
                    <td colspan="2">
                        <br>
                        <table style="border: 1px solid;width: 100%;text-align: center;">
                            <thead>
                                <tr style="background-color: #00e3f3">
                                    <th style="border: 1px solid;width: 5%;">No.</th>
                                    <th style="border: 1px solid;">Product Name</th>
                                    <th style="border: 1px solid;width: 15%;">Quantity</th>
                                    <th style="border: 1px solid;width: 20%;">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->details as $key => $item)
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
                                    <div style="page-break-after: always;"></div>
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
                    </td>
                </tr>
            </tbody>
        </table>
        <div style="margin-top: 50px;text-align: right">
            <b><u>E-MEDICSHOP</u></b>
        </div>
	</main>
</body>
</html>
