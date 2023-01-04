<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjual;
use Illuminate\Support\Facades\DB;

use PDF;

class PenjualController extends Controller
{
    public function index()//Request $request
    {
        //if($request->has('cari')){
           // $data_mahasiswa = Mahasiswa::where('nama','LIKE','%'. $request->cari .'%')->paginate(5);
        //}else{
            //$data_mahasiswa = DB::table('mahasiswa')->paginate(5);
        //}



        $data_penjual = DB::table('penjual')->paginate(5);



        
        return view('penjual.index',['data_penjual' => $data_penjual]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $penjual = DB::table('penjual')
            ->where('namapenjual', 'like', "%" . $cari . "%")
            ->paginate();

        return view('penjual.index', ['data_penjual' => $penjual]);
    }

    public function create(Request $request)
    {
        Penjual::create($request->all());
        return redirect('/penjual')->with('sukses', 'Data berhasil di input!');
    }

    public function edit($id)
    {
        $data_penjual = Penjual::find($id);
        return view('penjual.edit',['penjual' => $data_penjual]);
    }

    public function update(Request $request, $id)
    {
        $data_penjual = Penjual::find($id);
        $data_penjual->update($request->all());
        return redirect('/penjual')->with('sukses', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $data_penjual = Penjual::find($id);
        $data_penjual->delete();
        return redirect('/penjual')->with('sukses', 'Data berhasil dihapus');
    }
    public function exportpdf()
    {
        $data_penjual= Penjual::all();
        $pdf = PDF::loadView('export.penjualpdf',['penjual' => $data_penjual]);
        return $pdf->download('penjual.pdf');
    }
       


    
}



