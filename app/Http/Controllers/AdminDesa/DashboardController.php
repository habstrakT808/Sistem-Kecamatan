<?php

namespace App\Http\Controllers\AdminDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $desa = $user->desa;

        if (!$desa) {
            return redirect()->route('login')
                ->with('error', 'Anda belum terdaftar di desa manapun. Silakan hubungi administrator.');
        }

        // Statistik sederhana untuk sementara
        $totalPenduduk = $desa->penduduks()->count();
        $totalPerangkat = $desa->perangkatDesas()->where('status', 'aktif')->count();
        $totalAset = $desa->asetDesas()->where('is_current', true)->count();

        return view('admin-desa.dashboard', compact('desa', 'totalPenduduk', 'totalPerangkat', 'totalAset'));
    }
}