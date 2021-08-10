<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use Illuminate\Http\Request;

class ParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //membuat variabel parkir, kemudian ambil semua data pada model parkir
        $parkir = Parkir::all();

        //memberikan respon berupa tampilan view halaman index.
        return view('parkir.index', compact('parkir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //memberikan respon berupa tampilan halaman create(form)
        return view('parkir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //membuat variabel parkir
        $parkir = new Parkir;

        //membuat variabel untuk mengambil/membuat request data pada masing2 field
        $parkir->plat_no = $request->plat_no;
        $parkir->jenis_kendaraan = $request->jenis_kendaraan;
        $parkir->biaya = $request->biaya;
        if($request->file('foto')){
            $file = $request->file('foto');
            $nama_file = time().str_replace(" ", "", $file->getClientOriginalName());
            $file->move('gambar', $nama_file);
            $parkir->foto = $nama_file;}
            $parkir->save();

        return redirect('parkir')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Parkir $parkir)
    {
        //mengambil model parkir pada fungsi 
        //memberikan respon balikan tampilan dari halaman show
        return view('parkir.show', compact('parkir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Parkir $parkir)
    {
        //memberikan respon balikan tampilan halaman edit
        //mengambil model parkir pada fungsi 
        return view('parkir.edit', compact('parkir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parkir $parkir)
    {
        //membuat variabel parkir, kemudian mengupdate semua data yang di request
        $parkir->update($request->all());

        //memberikan respon balikan halaman index dengan menyertakan pesan
        return redirect()->route('parkir.index')->with('success', 'Data berhasil terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parkir $parkir)
    {
        //membuat variabel parkir kemudian jalankan fungsi hapus
        $parkir->delete();

        //memberikan respon balikan ke halaman index dengan menyertakan pesan
        return redirect()->route('parkir.index')->with('success', 'Data berhasil dihapus!');
    }

    public function search(Request $request)
	{
        //membuat variabel pencarian dan merequest data yang dicari
		$search = $request->get('search');
        //variabel parkir yang berisikan plat_no hasil pencarian
		$parkir = Parkir::where('plat_no', 'LIKE', '%'.$search.'%')->paginate(5);
		//memberikan respon tampilan halaman index
        return view('parkir.index', compact('parkir'));
	}
}
