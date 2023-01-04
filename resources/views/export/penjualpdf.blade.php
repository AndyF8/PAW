<!DOCTYPE html>
<html>
    <head>
        <title>Laporan PDF Data Penjual</title>
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
            <h1>Data Penjual</h1>
        </center>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama penjual</th>
                    <th>No penjual</th>
                    <th>Alamat penjual</th>
                    
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($penjual as $pen)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $pen->namapenjual }}</td>
                        <td>{{ $pen->nopenjual }}</td>
                        <td>{{ $pen->alamatpenjual }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>