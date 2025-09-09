<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AsetDesa;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Exports\AsetDesaPdfExport;

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
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'kategori_aset' => 'required|in:tanah,bangunan,inventaris',
            'nama_aset' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'nilai_perolehan' => 'nullable|numeric|min:0',
            'nilai_sekarang' => 'nullable|numeric|min:0',
            'tanggal_perolehan' => 'required|date',
            'kondisi' => 'required|in:baik,rusak_ringan,rusak_berat',
            'lokasi' => 'required|string',
            'bukti_kepemilikan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['updated_by'] = Auth::check() ? Auth::id() : null;

        // Upload bukti kepemilikan
        if ($request->hasFile('bukti_kepemilikan')) {
            $data['bukti_kepemilikan'] = $request->file('bukti_kepemilikan')
                ->store('bukti-aset', 'public');
        }

        $aset = AsetDesa::create($data);

        // Update desa last_updated_at
        $desa = Desa::find($data['desa_id']);
        if ($desa) {
            $desa->updateLastUpdated();
        }

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
        $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'kategori_aset' => 'required|in:tanah,bangunan,inventaris',
            'nama_aset' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'nilai_perolehan' => 'nullable|numeric|min:0',
            'nilai_sekarang' => 'nullable|numeric|min:0',
            'tanggal_perolehan' => 'required|date',
            'kondisi' => 'required|in:baik,rusak_ringan,rusak_berat',
            'lokasi' => 'required|string',
            'bukti_kepemilikan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'keterangan' => 'nullable|string',
            'update_reason' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['updated_by'] = Auth::check() ? Auth::id() : null;

        // Upload bukti kepemilikan baru
        if ($request->hasFile('bukti_kepemilikan')) {
            // Hapus file lama
            if ($asetDesa->bukti_kepemilikan) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($asetDesa->bukti_kepemilikan);
            }
            $data['bukti_kepemilikan'] = $request->file('bukti_kepemilikan')
                ->store('bukti-aset', 'public');
        }

        $asetDesa->update($data);

        // Update desa last_updated_at
        $desa = Desa::find($data['desa_id']);
        if ($desa) {
            $desa->updateLastUpdated();
        }

        return redirect()->route('admin.aset-desa.index')
            ->with('success', 'Data aset desa berhasil diperbarui.');
    }

    public function destroy(AsetDesa $asetDesa)
    {
        $desa_id = $asetDesa->desa_id;
        
        // Hapus file bukti kepemilikan jika ada
        if ($asetDesa->bukti_kepemilikan) {
            Storage::disk('public')->delete($asetDesa->bukti_kepemilikan);
        }

        $asetDesa->delete();
        
        // Update desa last_updated_at
        $desa = Desa::find($desa_id);
        if ($desa) {
            $desa->updateLastUpdated();
        }
        
        return redirect()->route('admin.aset-desa.index')
            ->with('success', 'Data aset desa berhasil dihapus.');
    }
    
    public function riwayat(AsetDesa $aset)
    {
        $riwayat = $aset->riwayat()->with('changedBy')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.aset-desa.riwayat', compact('aset', 'riwayat'));
    }
    
    /**
     * Export data aset desa ke PDF
     */
    public function exportPdf(Request $request)
    {
        $exporter = new AsetDesaPdfExport(
            $request->desa_id,
            $request->jenis_aset,
            $request->kondisi,
            $request->status
        );
        
        return $exporter->download();
    }
}