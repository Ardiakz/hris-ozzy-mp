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
            [
                'id' => '003',
                'nama' => 'Bob Smith',
                'department' => 'Produksi',
                'posisi' => 'Supervisor',
                'status' => 'Tidak Aktif',
            ],
            [
                'id' => '004',
                'nama' => 'Alice Johnson',
                'department' => 'Keuangan',
                'posisi' => 'Accountant',
                'status' => 'Aktif',
            ],
            [
                'id' => '005',
                'nama' => 'Charlie Brown',
                'department' => 'Produksi',
                'posisi' => 'Operator',
                'status' => 'Tidak Aktif',
            ],
            [
                'id' => '006',
                'nama' => 'David Lee',
                'department' => 'Warehouse',
                'posisi' => 'WH Bahan',
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

return view('karyawan.index', [
    'karyawan' => $karyawan,
    'totalKaryawan' => $totalKaryawan,
    'karyawanAktif' => $karyawanAktif,
    'karyawanNonaktif' => $karyawanNonaktif,
]);
    }

    public function show($id)
    {return "Detail karyawan ID: " . $id;}
}