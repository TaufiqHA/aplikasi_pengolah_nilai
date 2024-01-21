<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mapel;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $mapels = Mapel::all();
        $guruId = auth()->user()->guru->id;
        $kelas = Kelas::all();

        return view('kelas.index', ['title' => 'Kelas', 'mapels' => $mapels, 'guruId' => $guruId, 'kelas' => $kelas]);
    }

    public function addKelas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required',
            'guru_id' => 'required',
            'mapel_id' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        Kelas::create($validated);

        return back()->with([
            'success' => 'Berhasil menambahkan kelas',
        ]);
    }
}
