<!DOCTYPE html>
<html>
    <head>
        <title>Laporan PDF Data Barang</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"crossorigin="anonymous">
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 9pt;
            }
        </style>
        <center>
            <h5>Laporan</h5>
            <h1>Data Barang</h1>
        </center>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jenis Barang</th>
                    <th>Stok Barang</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($barang as $brg)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $brg->nama_barang }}</td>
                        <td>{{ $brg->harga_jual }}</td>
                        <td>{{ $brg->jenis_barang }}</td>
                        <td>{{ $brg->stock_barang }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>