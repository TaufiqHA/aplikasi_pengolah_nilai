<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index', ['title' => 'Dashboard']);
    }

    public function dataDiri()
    {
        $guru = auth()->user()->guru;
        return view('guru.dataDiri', ['title' => 'Data Diri', 'guru' => $guru]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'email|required',
            'nip' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        $guruId = auth()->user()->guru->id;

        Guru::where('id', $guruId)->update($validated);

        return back()->with([
            'success' => 'Berhasil Update Data Diri'
        ]);
    }
}
