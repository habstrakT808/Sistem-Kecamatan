<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesaController extends Controller
{
    public function index()
    {
        $desas = Desa::withCount(['penduduks', 'perangkatDesas'])
            ->orderBy('nama_desa')
            ->get();

        return view('admin.desa.index', compact('desas'));
    }

    public function create()
    {
        return view('admin.desa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'kode_desa' => 'required|string|max:10|unique:desas',
            'kepala_desa' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kode_pos' => 'required|string|max:10',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'luas_wilayah' => 'nullable|numeric|min:0',
            'komoditas_unggulan' => 'nullable|string',
            'kondisi_sosial_ekonomi' => 'nullable|string',
            'sk_kepala_desa' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'monografi_file' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $data = $request->all();

        // Upload SK Kepala Desa
        if ($request->hasFile('sk_kepala_desa')) {
            $data['sk_kepala_desa'] = $request->file('sk_kepala_desa')
                ->store('sk-kepala-desa', 'public');
        }

        // Upload Monografi
        if ($request->hasFile('monografi_file')) {
            $data['monografi_file'] = $request->file('monografi_file')
                ->store('monografi', 'public');
        }

        $data['last_updated_at'] = now();

        Desa::create($data);

        return redirect()->route('admin.desa.index')
            ->with('success', 'Data desa berhasil ditambahkan.');
    }

    public function show(Desa $desa)
    {
        $desa->load(['penduduks', 'perangkatDesas', 'asetDesas', 'asetTanahWargas']);
        
        return view('admin.desa.show', compact('desa'));
    }

    public function edit(Desa $desa)
    {
        return view('admin.desa.edit', compact('desa'));
    }

    public function update(Request $request, Desa $desa)
    {
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'kode_desa' => 'required|string|max:10|unique:desas,kode_desa,' . $desa->id,
            'kepala_desa' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kode_pos' => 'required|string|max:10',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'luas_wilayah' => 'nullable|numeric|min:0',
            'komoditas_unggulan' => 'nullable|string',
            'kondisi_sosial_ekonomi' => 'nullable|string',
            'sk_kepala_desa' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'monografi_file' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $data = $request->all();

        // Upload SK Kepala Desa
        if ($request->hasFile('sk_kepala_desa')) {
            // Hapus file lama
            if ($desa->sk_kepala_desa) {
                Storage::disk('public')->delete($desa->sk_kepala_desa);
            }
            $data['sk_kepala_desa'] = $request->file('sk_kepala_desa')
                ->store('sk-kepala-desa', 'public');
        }

        // Upload Monografi
        if ($request->hasFile('monografi_file')) {
            // Hapus file lama
            if ($desa->monografi_file) {
                Storage::disk('public')->delete($desa->monografi_file);
            }
            $data['monografi_file'] = $request->file('monografi_file')
                ->store('monografi', 'public');
        }

        $data['last_updated_at'] = now();

        $desa->update($data);

        return redirect()->route('admin.desa.index')
            ->with('success', 'Data desa berhasil diperbarui.');
    }

    public function destroy(Desa $desa)
    {
        // Hapus file terkait
        if ($desa->sk_kepala_desa) {
            Storage::disk('public')->delete($desa->sk_kepala_desa);
        }
        if ($desa->monografi_file) {
            Storage::disk('public')->delete($desa->monografi_file);
        }

        $desa->delete();

        return redirect()->route('admin.desa.index')
            ->with('success', 'Data desa berhasil dihapus.');
    }

    public function updateCoordinates(Request $request, Desa $desa)
    {
        $request->validate([
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $desa->update([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'last_updated_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Koordinat berhasil diperbarui.'
        ]);
    }
}