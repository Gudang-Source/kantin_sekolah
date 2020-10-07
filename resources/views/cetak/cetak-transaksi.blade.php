<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KantinKu | Invoice</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #333;
            text-align: left;
            font-size: 18px;
            margin: 0;
        }

        h1 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 35px;
        }

        .id {
            font-weight: bold;
        }

        table {
            border: 1px solid #333;
            border-collapse: collapse;
            margin: 0 auto;
            margin-top: 15px;
            width: 700px;
        }

        td,
        tr,
        th {
            padding: 12px;
            border: 1px solid #333;
            width: 185px;
        }

        th {
            background-color: #f0f0f0;
        }

        h4,
        p {
            margin: 0px;
        }

        .tanggal {
            float: right;
        }
    </style>
</head>

<body>
    <h1>
        Invoice KantinKu
    </h1>
    <div class="id">
        @foreach($transaksis as $transaksi)
        <p class="tanggal">
            Tanggal : {{ $transaksi->tanggal }}
        </p>
        <p>
            ID Transaksi &nbsp; &nbsp; : &nbsp; {{ $transaksi->id_transaksi }}
            <br>
            ID Order&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; {{ $transaksi->id_order }}
        </p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail_orders as $detail_order)
            <tr>
                <td>{{ $detail_order->menu->nama_menu }}</td>
                <td>{{ $detail_order->jumlah }}</td>
                <td>Rp {{ number_format($detail_order->sub_total,0,',','.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            @foreach($orders as $order)
            <tr>
                <th colspan="2">Total Harga</th>
                <td>Rp {{ number_format($order->jumlah_harga,0,',','.') }}</td>
            </tr>
            <tr>
                <th colspan="2">Jumlah Bayar</th>
                <td>Rp {{ number_format($transaksi->total_bayar,0,',','.') }}</td>
            </tr>
            <tr>
                <th colspan="2">Kembalian</th>
                <td>Rp {{ number_format($transaksi->total_bayar - $order->jumlah_harga,0,',','.') }}</td>
            </tr>
            @endforeach
        </tfoot>
        @endforeach
    </table>
</body>

</html>