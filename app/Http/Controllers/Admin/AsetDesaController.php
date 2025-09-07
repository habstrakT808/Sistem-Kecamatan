<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AsetDesa;
use App\Models\Desa;
use Illuminate\Http\Request;

class AsetDesaController extends Controller
{
    public function index()
    {
        $asetDesas = AsetDesa::with('desa')->current()->paginate(20);
        $desas = Desa::orderBy('nama_desa')->get();
        return view('admin.aset-desa.index', compact('asetDesas', 'desas'));
    }

    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('admin.aset-desa.create', compact('desas'));
    }

    public function store(Request $request)
    {
        // Implementasi akan ditambahkan nanti
        return redirect()->route('admin.aset-desa.index')
            ->with('success', 'Data aset desa berhasil ditambahkan.');
    }

    public function show(AsetDesa $asetDesa)
    {
        return view('admin.aset-desa.show', compact('asetDesa'));
    }

    public function edit(AsetDesa $asetDesa)
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('admin.aset-desa.edit', compact('asetDesa', 'desas'));
    }

    public function update(Request $request, AsetDesa $asetDesa)
    {
        // Implementasi akan ditambahkan nanti
        return redirect()->route('admin.aset-desa.index')
            ->with('success', 'Data aset desa berhasil diperbarui.');
    }

    public function destroy(AsetDesa $asetDesa)
    {
        $asetDesa->delete();
        return redirect()->route('admin.aset-desa.index')
            ->with('success', 'Data aset desa berhasil dihapus.');
    }

    public function riwayat(AsetDesa $aset)
    {
        $riwayat = $aset->riwayat()->with('changedBy')->orderBy('created_at', 'desc')->get();
        return view('admin.aset-desa.riwayat', compact('aset', 'riwayat'));
    }
}