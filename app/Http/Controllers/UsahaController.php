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
}
