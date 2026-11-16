<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogAktivitas;

class LogAktivitasController extends Controller
{
    public function index()
    {
        $logs = LogAktivitas::with('admin')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('LogAktivitas.index', compact('logs'));
    }
}