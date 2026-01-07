<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ikm;
use App\Models\Usaha;
use App\Models\Industri;

class IKMController extends Controller
{
    /* ===========================================================
       LIST DATA
    ============================================================*/
    public function index(Request $request)
    {
        // RESET WIZARD
        if ($request->has('cancel_wizard')) {
            session()->forget([
                'ikm_personal',
                'ikm_usaha',
                'wizard_step'
            ]);
        }

        $perPage = $request->get('per_page', 10);

        $query = Ikm::with('industri');

        // 🔍 FILTER RENTANG TANGGAL INPUT
        if ($request->filled('tgl_input_from') && $request->filled('tgl_input_to')) {
            $query->whereBetween('tgl_input', [
                $request->tgl_input_from,
                $request->tgl_input_to
            ]);
        } elseif ($request->filled('tgl_input_from')) {
            $query->whereDate('tgl_input', '>=', $request->tgl_input_from);
        } elseif ($request->filled('tgl_input_to')) {
            $query->whereDate('tgl_input', '<=', $request->tgl_input_to);
        }

        // 🔍 FILTER NAMA IKM / PEMILIK
        if ($request->filled('nm_pemilik')) {
            $query->where('nm_pemilik', 'like', '%' . $request->nm_pemilik . '%');
        }

        // 🔍 FILTER NAMA PERUSAHAAN
        if ($request->filled('nm_perusahaan_')) {
            $query->where('nm_perusahaan_', 'like', '%' . $request->nm_perusahaan_ . '%');
        }

        // 🔍 FILTER JENIS INDUSTRI
        if ($request->filled('industri_id')) {
            $query->where('industri_id', $request->industri_id);
        }

        // 🔍 FILTER NIB
        if ($request->filled('nib')) {
            $query->where('nib', 'like', '%' . $request->nib . '%');
        }

        $ikms = $query
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->appends($request->query());

        return view('admin.ikm.index', [
            'ikms'       => $ikms,
            'perPage'    => $perPage,
            'industris'  => Industri::all()
        ]);
    }

    public function show($id)
    {
        $ikm = Ikm::with(['usaha', 'industri'])->findOrFail($id);
        return view('admin.ikm.show', compact('ikm'));
    }

    /* ===========================================================
       STEP 1 — PERSONAL
    ============================================================*/
    public function create()
    {
        // RESET TOTAL SETIAP TAMBAH DATA BARU
        session()->forget([
            'ikm_personal',
            'ikm_usaha',
            'wizard_step'
        ]);

        session(['wizard_step' => 1]);

        return redirect()->route('ikm.form.personal');
    }

    public function formPersonal()
    {
        session(['wizard_step' => 1]);
        return view('admin.ikm.create.personal');
    }

    public function storePersonal(Request $request)
    {
        $request->validate([
            'tgl_input'  => 'required|date',
            'nm_pemilik' => 'required',
            'alamatpm'   => 'required',
            'telp'       => 'required',
            'email'      => 'nullable|email',
        ]);

        session([
            'ikm_personal' => $request->only([
                'tgl_input','nm_pemilik','alamatpm','telp','email'
            ]),
            'wizard_step' => 2
        ]);

        return redirect()->route('ikm.form.usaha');
    }

    /* ===========================================================
       STEP 2 — USAHA
    ============================================================*/
    public function formUsaha()
    {
        if (!session('ikm_personal')) {
            return redirect()->route('ikm.form.personal');
        }

        return view('admin.ikm.create.usaha', [
            'usahas' => Usaha::all(),
            'industris' => Industri::all(),
        ]);
    }

    public function storeUsaha(Request $request)
    {
        $request->validate([
            'nm_perusahaan_' => 'required',
            'alamatpr'       => 'required',
            'industri_id'    => 'required|exists:industri,id',
            'usaha_id'       => 'required|exists:usaha,id',
            'skala'          => 'required|in:kecil,menengah,besar',
            'jml_tk'         => 'required|integer|min:1',
        ]);

        session([
            'ikm_usaha' => $request->only([
                'nm_perusahaan_','alamatpr','produk',
                'industri_id','usaha_id','skala','jml_tk'
            ]),
            'wizard_step' => 3
        ]);

        return redirect()->route('ikm.form.legalitas');
    }

    /* ===========================================================
       STEP 3 — LEGALITAS
    ============================================================*/
    public function formLegalitas()
    {
        if (!session('ikm_usaha')) {
            return redirect()->route('ikm.form.usaha');
        }

        return view('admin.ikm.create.legalitas');
    }

    public function storeLegalitas(Request $request)
    {
        $fields = ['npwp','nib','kbli','merk','halal','sni','sppirt'];
        $legalitasData = [];

        foreach ($fields as $field) {
            $legalitasData[$field] = $request->has($field.'_check')
                ? $request->{$field}
                : null;
        }

        Ikm::create(array_merge(
            session('ikm_personal'),
            session('ikm_usaha'),
            $legalitasData
        ));

        session()->forget(['ikm_personal','ikm_usaha','wizard_step']);

        return redirect()
            ->route('ikm.index')
            ->with('success', 'Data "'.$request->nama_ikm.'" berhasil ditambahkan');
    }

    /* ===========================================================
    EDIT
    ===========================================================*/
    public function edit($id)
    {
        $ikm = Ikm::with(['usaha','industri'])->findOrFail($id);
        return view('admin.ikm.edit', compact('ikm'));
    }

    /* ===========================================================
    UPDATE
    ===========================================================*/
    public function update(Request $request, $id)
    {
        $ikm = Ikm::findOrFail($id);
        $ikm->update($request->all());

        return redirect()
            ->route('ikm.index')
            ->with('success', 'Data <b>'.$ikm->nama_ikm.'</b> berhasil diperbarui');
    }

    /* ===========================================================
    DELETE
    ===========================================================*/
    public function destroy($id)
    {
        $ikm = Ikm::findOrFail($id);
        $nama = $ikm->nm_perusahaan_;

        $ikm->delete();

        return redirect()
            ->route('ikm.index')
            ->with('success', 'Data "'.$ikm->nama_ikm.'" berhasil dihapus');
    }
}
