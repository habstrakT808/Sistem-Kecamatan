<?php

namespace App\Http\Controllers\AdminDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin-desa.faq.index');
    }

    public function panduan()
    {
        return view('admin-desa.faq.panduan');
    }
}