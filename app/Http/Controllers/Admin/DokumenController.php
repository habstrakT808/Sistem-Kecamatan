<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Desa;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::with(['desa', 'uploader'])->paginate(20);
        return view('admin.dokumen.index', compact('dokumens'));
    }

    public function create()
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('admin.dokumen.create', compact('desas'));
    }

    public function store(Request $request)
    {
        // Implementasi akan ditambahkan nanti
        return redirect()->route('admin.dokumen.index')
            ->with('success', 'Dokumen berhasil diupload.');
    }

    public function show(Dokumen $dokumen)
    {
        return view('admin.dokumen.show', compact('dokumen'));
    }

    public function edit(Dokumen $dokumen)
    {
        $desas = Desa::orderBy('nama_desa')->get();
        return view('admin.dokumen.edit', compact('dokumen', 'desas'));
    }

    public function update(Request $request, Dokumen $dokumen)
    {
        // Implementasi akan ditambahkan nanti
        return redirect()->route('admin.dokumen.index')
            ->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(Dokumen $dokumen)
    {
        $dokumen->delete();
        return redirect()->route('admin.dokumen.index')
            ->with('success', 'Dokumen berhasil dihapus.');
    }

    public function download(Dokumen $dokumen)
    {
        // Implementasi download akan ditambahkan nanti
        return redirect()->back()->with('info', 'Fitur download sedang dalam pengembangan.');
    }
}