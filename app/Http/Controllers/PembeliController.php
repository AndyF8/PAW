<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembeli;
use Illuminate\Support\Facades\DB;

use PDF;

class PembeliController extends Controller
{
    public function index()//Request $request
    {
        //if($request->has('cari')){
           // $data_mahasiswa = Mahasiswa::where('nama','LIKE','%'. $request->cari .'%')->paginate(5);
        //}else{
            //$data_mahasiswa = DB::table('mahasiswa')->paginate(5);
        //}



        $data_pembeli = DB::table('pembeli')->paginate(5);



        
        return view('pembeli.index',['data_pembeli' => $data_pembeli]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $pembeli = DB::table('pembeli')
            ->where('namapembeli', 'like', "%" . $cari . "%")
            ->paginate();

        return view('pembeli.index', ['data_pembeli' => $pembeli]);
    }

    public function create(Request $request)
    {
        Pembeli::create($request->all());
        return redirect('/pembeli')->with('sukses', 'Data berhasil di input!');
    }

    public function edit($id)
    {
        $data_pembeli = Pembeli::find($id);
        return view('pembeli.edit',['pembeli' => $data_pembeli]);
    }

    public function update(Request $request, $id)
    {
        $data_pembeli = Pembeli::find($id);
        $data_pembeli->update($request->all());
        return redirect('/pembeli')->with('sukses', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $data_pembeli = Pembeli::find($id);
        $data_pembeli->delete();
        return redirect('/pembeli')->with('sukses', 'Data berhasil dihapus');
    }
    public function exportpdf()
    {
        $data_pembeli= Pembeli::all();
        $pdf = PDF::loadView('export.pembelipdf',['pembeli' => $data_pembeli]);
        return $pdf->download('pembeli.pdf');
    }
       


    
}



