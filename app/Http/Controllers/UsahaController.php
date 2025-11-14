<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usaha;

class UsahaController extends Controller
{
    public function index()
    {
        $usahas = Usaha::all();
        return view('admin.usaha.index', compact('usahas'));
    }

    public function carius(Request $request)
    {
        $kata = $request->input('kata');

        $usahas = Usaha::where('nama_usaha', 'LIKE', "%$kata%")->get();

        return view('admin.usaha.index', compact('usahas'));
    }

    public function create()
    {
        return view('admin.usaha.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
        ]);

        Usaha::create([
            'nama_usaha' => $request->nama_usaha,
        ]);

        return redirect()->route('usaha.index')->with('success', 'Data usaha berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $usaha = Usaha::findOrFail($id);
        return view('admin.usaha.edit', compact('usaha'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
        ]);

        $usaha = Usaha::findOrFail($id);
        $usaha->update([
            'nama_usaha' => $request->nama_usaha,
        ]);

        return redirect()->route('usaha.index')->with('success', 'Data usaha berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $usaha = Usaha::findOrFail($id);
        $usaha->delete();
        return redirect()->route('usaha.index')->with('success', 'Data usaha berhasil dihapus.');
    }

}
