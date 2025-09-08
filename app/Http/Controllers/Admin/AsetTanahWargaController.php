<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AsetTanahWarga;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsetTanahWargaController extends Controller
{
    public function index(Request $request)
    {
        $query = AsetTanahWarga::with('desa');
        
        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_pemilik', 'like', "%{$search}%")
                  ->orWhere('nik_pemilik', 'like', "%{$search}%")
                  ->orWhere('nomor_sph', 'like', "%{$search}%");
            });
        }
        
        // Filter berdasarkan desa
        if ($request->has('desa_id') && $request->desa_id) {
            $query->where('desa_id', $request->desa_id);
        }
        
        // Filter berdasarkan status kepemilikan
        if ($request->has('status_kepemilikan') && $request->status_kepemilikan) {
            $query->where('status_kepemilikan', $request->status_kepemilikan);
        }
        
        $asetTanahWargas = $query->latest()->paginate(20)->withQueryString();
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
        $validated = $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'nama_pemilik' => 'required|string|max:255',
            'nik_pemilik' => 'required|string|size:16',
            'nomor_sph' => 'required|string|max:100',
            'jenis_tanah' => 'required|string|in:tanah_kering,tanah_sawah,tanah_pekarangan,tanah_perkebunan',
            'status_kepemilikan' => 'required|string|in:milik_sendiri,warisan,hibah,jual_beli',
            'luas_tanah' => 'required|numeric|min:0',
            'nilai_per_meter' => 'required|numeric|min:0',
            'lokasi' => 'required|string',
            'keterangan' => 'nullable|string',
            'tanggal_perolehan' => 'required|date',
            'bukti_kepemilikan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        
        // Upload bukti kepemilikan
        if ($request->hasFile('bukti_kepemilikan')) {
            $buktiPath = $request->file('bukti_kepemilikan')->store('aset-tanah-warga', 'public');
            $validated['bukti_kepemilikan'] = $buktiPath;
        }
        
        // Buat data aset tanah warga
        $asetTanahWarga = AsetTanahWarga::create($validated);
        
        // Update last_updated_at pada desa
        $desa = Desa::find($request->desa_id);
        $desa->update(['last_updated_at' => now()]);
        
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
        $validated = $request->validate([
            'desa_id' => 'required|exists:desas,id',
            'nama_pemilik' => 'required|string|max:255',
            'nik_pemilik' => 'required|string|size:16',
            'nomor_sph' => 'required|string|max:100',
            'jenis_tanah' => 'required|string|in:tanah_kering,tanah_sawah,tanah_pekarangan,tanah_perkebunan',
            'status_kepemilikan' => 'required|string|in:milik_sendiri,warisan,hibah,jual_beli',
            'luas_tanah' => 'required|numeric|min:0',
            'nilai_per_meter' => 'required|numeric|min:0',
            'lokasi' => 'required|string',
            'keterangan' => 'nullable|string',
            'tanggal_perolehan' => 'required|date',
            'bukti_kepemilikan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        
        // Upload bukti kepemilikan baru jika ada
        if ($request->hasFile('bukti_kepemilikan')) {
            // Hapus file lama jika ada
            if ($asetTanahWarga->bukti_kepemilikan) {
                Storage::disk('public')->delete($asetTanahWarga->bukti_kepemilikan);
            }
            
            $buktiPath = $request->file('bukti_kepemilikan')->store('aset-tanah-warga', 'public');
            $validated['bukti_kepemilikan'] = $buktiPath;
        }
        
        // Update data aset tanah warga
        $asetTanahWarga->update($validated);
        
        // Update last_updated_at pada desa
        $desa = Desa::find($request->desa_id);
        $desa->update(['last_updated_at' => now()]);
        
        return redirect()->route('admin.aset-tanah-warga.index')
            ->with('success', 'Data aset tanah warga berhasil diperbarui.');
    }

    public function destroy(AsetTanahWarga $asetTanahWarga)
    {
        // Hapus file bukti kepemilikan jika ada
        if ($asetTanahWarga->bukti_kepemilikan) {
            Storage::disk('public')->delete($asetTanahWarga->bukti_kepemilikan);
        }
        
        // Hapus data aset tanah warga
        $asetTanahWarga->delete();
        
        // Update last_updated_at pada desa
        $desa = Desa::find($asetTanahWarga->desa_id);
        $desa->update(['last_updated_at' => now()]);
        
        return redirect()->route('admin.aset-tanah-warga.index')
            ->with('success', 'Data aset tanah warga berhasil dihapus.');
    }
}