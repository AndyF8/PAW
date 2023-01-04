<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

use PDF;

class SupplierController extends Controller
{
    public function index()//Request $request
    {
        //if($request->has('cari')){
           // $data_mahasiswa = Mahasiswa::where('nama','LIKE','%'. $request->cari .'%')->paginate(5);
        //}else{
            //$data_mahasiswa = DB::table('mahasiswa')->paginate(5);
        //}



        $data_supplier = DB::table('supplier')->paginate(5);



        
        return view('supplier.index',['data_supplier' => $data_supplier]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $supplier = DB::table('supplier')
            ->where('namasupplier', 'like', "%" . $cari . "%")
            ->paginate();

        return view('supplier.index', ['data_supplier' => $supplier]);
    }

    public function create(Request $request)
    {
        Supplier::create($request->all());
        return redirect('/supplier')->with('sukses', 'Data berhasil di input!');
    }

    public function edit($id)
    {
        $data_supplier = Supplier::find($id);
        return view('supplier.edit',['supplier' => $data_supplier]);
    }

    public function update(Request $request, $id)
    {
        $data_supplier = Supplier::find($id);
        $data_supplier->update($request->all());
        return redirect('/supplier')->with('sukses', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $data_supplier = Supplier::find($id);
        $data_supplier->delete();
        return redirect('/supplier')->with('sukses', 'Data berhasil dihapus');
    }
    public function exportpdf()
    {
        $data_supplier = Supplier::all();
        $pdf = PDF::loadView('export.supplierphpdf',['supplier' => $data_supplier]);
        return $pdf->download('supplier.pdf');
    }
       


    
}



