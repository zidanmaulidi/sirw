<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\SuratModel;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index($id)
    {
        $surats = SuratModel::findOrFail($id); // Retrieve SuratModel by ID
        return view('surat.pengantar_pdf', compact('surats')); // Pass the SuratModel instance to the view
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'nama_pengaju' => 'required',
            'NIK' => 'required|digits:16', // Memastikan NIK memiliki panjang tepat 16 digit
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'pekerjaan' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'keperluan' => 'required',
        ]);

         // Buat instance Surat dengan data yang diberikan
         $surat = new SuratModel([
            'nama_pengaju' => $request->nama_pengaju,
            'NIK' => $request->NIK,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'pekerjaan' => $request->pekerjaan,
            'status' => $request->status,
            'alamat' => $request->alamat,
            'keperluan' => $request->keperluan,
        ]);

        // Simpan surat ke dalam database
        $surat->save();


        // Redirect atau kembalikan respons sesuai kebutuhan
        return response()->json(['success' => true, 'id' => $surat->id]);
    }
}