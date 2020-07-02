<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use App\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class JawabanController extends Controller
{
    public function index($id) {
        $pertanyaan = Pertanyaan::findorfail($id);
        $jawaban = Pertanyaan::find($id)->jawaban;

        return view('detail', compact('pertanyaan', 'jawaban'));
    }

    public function store($id, Request $request) {
        $data = $request->validate([
            'isi' => 'required'
        ]);

        // dd($id);

        $jawaban = Jawaban::create([
            'isi' => $request->isi,
            'pertanyaan_id' => $id
        ]);


        return redirect()->route('jawaban.index', $id)->with('success', 'Jawaban anda berhasil dipost');
    }
}