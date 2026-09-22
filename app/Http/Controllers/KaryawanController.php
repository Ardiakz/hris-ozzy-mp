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
        ];

    // Mengambil pilihan filter dari URL
$search = request('search');
$department = request('department');
$posisi = request('posisi');
$status = request('status');

// Mengubah array karyawan menjadi Collection
$karyawanFiltered = collect($karyawan)
    ->filter(function ($item) use ($search, $department, $posisi, $status) {

        // Filter berdasarkan nama atau ID Karyawan
        $matchSearch = !$search ||
            str_contains(strtolower($item['nama']), strtolower($search)) ||
            str_contains(strtolower($item['id']), strtolower($search));

        // Filter berdasarkan Department
        $matchDepartment = !$department ||
            $item['department'] === $department;

        // Filter berdasarkan Posisi
        $matchPosisi = !$posisi ||
            $item['posisi'] === $posisi;

        // Filter berdasarkan Status
        $matchStatus = !$status ||
            $item['status'] === $status;

        // Karyawan ditampilkan jika memenuhi semua filter
        return $matchSearch &&
               $matchDepartment &&
               $matchPosisi &&
               $matchStatus;
    });

$totalKaryawan = count($karyawan);

$karyawanAktif = collect($karyawan)
    ->where('status', 'Aktif')
    ->count();

$karyawanNonaktif = collect($karyawan)
    ->where('status', 'Tidak Aktif')
    ->count();

        return view('karyawan.index', compact(
        'karyawan',
        'karyawanFiltered',
        'totalKaryawan',
        'karyawanAktif',
        'karyawanNonaktif'
        ));
    }
}