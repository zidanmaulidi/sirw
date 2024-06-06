<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kegiatan;
use App\Models\Keuangan;
use App\Models\SuratModel;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $informations = Informasi::all();
        $kegiatans = Kegiatan::all();
        $keuangans = Keuangan::all();
        $surats = SuratModel::paginate(5);
        return view('landing-page.index', compact('informations', 'kegiatans', 'keuangans', 'surats'));
    }
}