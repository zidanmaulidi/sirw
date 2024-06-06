<?php

namespace App\Http\Controllers;

use App\Models\SuratModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $surats = SuratModel::findOrFail($id);

        // Load the view with the compact HTML and CSS
        $pdf = Pdf::loadView('surat.pengantar_pdf', compact('surats'))
            ->setPaper('a4')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'dpi' => 96,
                'defaultFont' => 'sans-serif',
            ]);

        return $pdf->stream('pengantar.pdf');
    }
}