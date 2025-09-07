<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AsetTanahWarga;
use App\Models\Desa;
use Illuminate\Http\Request;

class AsetTanahWargaController extends Controller
{
    public function index()
    {
        $asetTanahWargas = AsetTanahWarga::with('desa')->paginate(20);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('admin.aset-tanah-warga.index', compact('asetTanahWargas', 'desas'));
    }

    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('admin.aset-tanah-warga.create', compact('desas'));
    }

    public function store(Request $request)
    {
        // Implementasi akan ditambahkan nanti
        return redirect()->route('admin.aset-tanah-warga.index')
            ->with('success', 'Data aset tanah warga berhasil ditambahkan.');
    }

    public function show(AsetTanahWarga $asetTanahWarga)
    {
        return view('admin.aset-tanah-warga.show', compact('asetTanahWarga'));
    }

    public function edit(AsetTanahWarga $asetTanahWarga)
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('admin.aset-tanah-warga.edit', compact('asetTanahWarga', 'desas'));
    }

    public function update(Request $request, AsetTanahWarga $asetTanahWarga)
    {
        // Implementasi akan ditambahkan nanti
        return redirect()->route('admin.aset-tanah-warga.index')
            ->with('success', 'Data aset tanah warga berhasil diperbarui.');
    }

    public function destroy(AsetTanahWarga $asetTanahWarga)
    {
        $asetTanahWarga->delete();
        return redirect()->route('admin.aset-tanah-warga.index')
            ->with('success', 'Data aset tanah warga berhasil dihapus.');
    }
}