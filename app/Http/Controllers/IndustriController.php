<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industri;

class IndustriController extends Controller
{
    public function index()
    {
        $industris = Industri::all();
        return view('admin.industri.index', compact('industris'));
    }

    public function create()
    {
        return view('admin.industri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_industri' => 'required|string|max:255',
        ]);

        Industri::create([
            'nama_industri' => $request->nama_industri,
        ]);

        return redirect()->route('industri.index')->with('success', 'Industri berhasil ditambahkan.');
    }

    public function edit(Industri $industri)
    {
        return view('admin.industri.edit', compact('industri'));
    }

    public function update(Request $request, Industri $industri)
    {
        $request->validate([
            'nama_industri' => 'required|string|max:255',
        ]);

        $industri->update([
            'nama_industri' => $request->nama_industri,
        ]);

        return redirect()->route('industri.index')->with('success', 'Industri berhasil diperbarui.');
    }

    public function destroy(Industri $industri)
    {
        $industri->delete();
        return redirect()->route('industri.index')->with('success', 'Industri berhasil dihapus.');
    }
}
