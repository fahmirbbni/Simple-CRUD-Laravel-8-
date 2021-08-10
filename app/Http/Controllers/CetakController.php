<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use Barryvdh\DomPDF\PDF;

class CetakController extends Controller
{
    public function index($id)
    {
        //menginisiasi variabel parkir, kemudian mengambil data id pada model parkir
        $parkir=Parkir::where('id', $id)->get();

        //membuat variable pdf, kemudian ambil
        $pdf= PDF::loadview('parkir.print', compact('parkir'));
        return $pdf->stream();
    }

}