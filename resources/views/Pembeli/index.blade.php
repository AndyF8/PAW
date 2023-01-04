<!DOCTYPE html>
<html>

<head>

    <title>Pembeli</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistem Informasi Toko Bangunan') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    
 
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'SI Toko Bangunan') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="/barang">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/penjual">Penjual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pembeli">Pembeli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/supplier">Suplier</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</head>

<body>
    <div class="container mt-3">
        @if (session('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @endif
        <div class="row">
            
            <center><h1 class= "pt-3">Data Pembeli</h1></center>

            <div class="col-4 my-4">
                <a href="/pembeli/exportpdf" class="btn btn-sm btn-success">Export PDF</a>
            </div>

            {{-- form search data --}}
            <div class="col-4 my-4">
                @csrf
                <form class="d-flex" action="/pembeli/cari" method="GET">
                    <input class="form-control me-2" type="text" name="cari"
                    placeholder="Cari data pembeli .." value="{{ old('cari') }}">
                    <button class="btn btn-outline-success" type="submit">Cari</button>

                </form>
            </div>

            <div class="col-3 my-4" align="right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                    data-target="#exampleModal">
                    Tambah Data
                </button>

            </div>

            @if ($data_pembeli->count() > 0)
            @else
                <center>
                    <font color="red">
                        <h3>!! TIdak ditemukan data yang sesuai dengan kata kunci !!</h3>
                    </font>
                
                </center>
            @endif

            <div class="table-responsive">
                <table class="table table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th>NAMA PEMBELI</th>
                            <th>NO PEMBELI</th>
                            <th>ALAMAT PEMBELI</th>
                            
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    @foreach ($data_pembeli as $pembeli)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pembeli->namapembeli}}</td>
                                <td>{{ $pembeli->nopembeli }}</td>
                                <td>{{ $pembeli->alamatpembeli }}</td>
                                
                                <td>
                                    <a href="/pembeli/{{$pembeli->id}}/edit" class = "btn btn-warning bgn-sm">Edit</a>
                                    <a href="/pembeli/delete/{{$pembeli->id}}" class = "btn btn-danger bgn-sm" onclick="return confirm('Yakin Mau Dihapus?')">delete</a>
                                </td>
                                   
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            Current Page: {{ $data_pembeli->currentPage() }}<br>
            Jumlah Data: {{ $data_pembeli->total() }}<br>
            Data perhalaman: {{ $data_pembeli->perPage() }}<br>
            <br>
            {{ $data_pembeli->links() }}
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.pem') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pembeli</label>
                            <input name="namapembeli" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="EmailHelp" placeholder="nama pembeli">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No pembeli</label>
                            <input name="nopembeli" type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="EmailHelp" placeholder="No pembeli">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamatpembeli" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
