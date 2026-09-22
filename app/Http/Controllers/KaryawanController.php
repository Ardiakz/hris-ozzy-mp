<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = [
            [
                'id' => '001',
                'nama' => 'John Wick',
                'department' => 'Produksi',
                'posisi' => 'Operator',
                'status' => 'Aktif',
            ],
            [
                'id' => '002',
                'nama' => 'Jane Doe',
                'department' => 'HR',
                'posisi' => 'Staff HR',
                'status' => 'Aktif',
            ],
        ];

$totalKaryawan = count($karyawan);

$karyawanAktif = collect($karyawan)
    ->where('status', 'Aktif')
    ->count();

$karyawanNonaktif = collect($karyawan)
    ->where('status', 'Tidak Aktif')
    ->count();

        return view('karyawan.index', compact(
            'karyawan',
            'totalKaryawan',
            'karyawanAktif',
            'karyawanNonaktif'
        ));
    }
}