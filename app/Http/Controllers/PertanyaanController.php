<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index() {
        $pertanyaan = Pertanyaan::all();
        return view('pertanyaan', compact('pertanyaan'));
    }

    public function create(Request $request) {
        $data = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]); 

        $pertanyaan = Pertanyaan::create($data);
        return redirect('/pertanyaan')->with('success', 'Pertanyaan berhasil ditambahkan');
    }
}