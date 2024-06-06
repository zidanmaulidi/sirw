<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_pengadu' => 'required|string|max:255',
            'aduan' => 'required|string|max:255',
            'isi_aduan' => 'required|string',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240', // Max size 10 MB
        ]);
        // Handle file upload
        if ($request->hasFile('bukti')) {
            $buktiFileName = time() . '.' . $request->bukti->getClientOriginalExtension();
            $request->bukti->move(public_path('storage/aduans_image'), $buktiFileName);
            $validatedData['bukti'] = 'aduans_image/' . $buktiFileName; // Save relative path
        }

        // Create a new instance of Aduan model and store it in the database
        $aduan = new Aduan();
        $aduan->fill($validatedData);
        $aduan->save();

        // Redirect back or to a specific route
        return redirect()->route('index')->with('success', 'Pengaduan berhasil diajukan.');
    }
}