<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;

use PDF;

class BarangController extends Controller
{
    public function index()//Request $request
    {
        //if($request->has('cari')){
           // $data_mahasiswa = Mahasiswa::where('nama','LIKE','%'. $request->cari .'%')->paginate(5);
        //}else{
            //$data_mahasiswa = DB::table('mahasiswa')->paginate(5);
        //}



        $data_barang = DB::table('barang')->paginate(5);



        
        return view('barang.index',['data_barang' => $data_barang]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $barang = DB::table('barang')
            ->where('namabarang', 'like', "%" . $cari . "%")
            ->paginate();

        return view('barang.index', ['data_barang' => $barang]);
    }

    public function create(Request $request)
    {
        Barang::create($request->all());
        return redirect('/barang')->with('sukses', 'Data berhasil di input!');
    }

    public function edit($id)
    {
        $data_barang = Barang::find($id);
        return view('barang.edit',['barang' => $data_barang]);
    }

    public function update(Request $request, $id)
    {
        $data_barang = Barang::find($id);
        $data_barang->update($request->all());
        return redirect('/barang')->with('sukses', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $data_barang = Barang::find($id);
        $data_barang->delete();
        return redirect('/barang')->with('sukses', 'Data berhasil dihapus');
    }

    public function exportpdf()
    {
        $data_barang = Barang::all();
        $pdf = PDF::loadView('export.barangpdf',['barang' => $data_barang]);
        return $pdf->download('barang.pdf');
    }
       


    
}


