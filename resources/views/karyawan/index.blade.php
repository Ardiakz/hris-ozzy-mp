<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Master Karyawan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Background utama halaman -->
    <div class="min-h-screen bg-slate-50">
        <!-- Container utama -->
        <div class="max-w-7xl mx-auto px-6 py-8">

<!-- Header Master Karyawan -->
<div class="flex items-center justify-between mb-8">

    <!-- Bagian kiri: Judul dan subtitle -->
    <div>
        <h1 class="text-2xl font-semibold text-slate-900">
            Master Karyawan
        </h1>

        <p class="text-sm text-slate-500 mt-1">
            Kelola dan lihat data karyawan perusahaan
        </p>
    </div>

    <!-- Bagian kanan: Tombol tambah karyawan -->
    <button
        type="button"
        class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors cursor-pointer"
    >
        + Tambah Karyawan
    </button>
</div>

<!-- Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">

    <!-- Card: Total Karyawan -->
    <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
        <p class="text-sm font-medium text-slate-500">
            Total Karyawan
        </p>

        <h2 class="text-3xl font-bold text-slate-900 mt-2">
            {{ $totalKaryawan }}
        </h2>
    </div>

    <!-- Card: Karyawan Aktif -->
    <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
        <p class="text-sm font-medium text-slate-500">
            Karyawan Aktif
        </p>

        <h2 class="text-3xl font-bold text-emerald-600 mt-2">
            {{ $karyawanAktif }}
        </h2>
    </div>

    <!-- Card: Karyawan Nonaktif -->
    <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
        <p class="text-sm font-medium text-slate-500">
            Karyawan Nonaktif
        </p>

        <h2 class="text-3xl font-bold text-red-500 mt-2">
            {{ $karyawanNonaktif }}
        </h2>
    </div>
</div>

<!-- SEARCH & FILTER -->
<div class="bg-white border border-slate-200 rounded-xl p-5 mb-6 shadow-sm">

    <div class="flex flex-col lg:flex-row lg:items-center gap-3">

        <!-- Search Karyawan -->
        <div class="w-full lg:flex-1 lg:min-w-0">
            <input
                id="searchKaryawan"
                type="text"
                placeholder="Cari nama karyawan..."
                class="w-full border border-slate-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <!-- Filter Department -->
        <div>
            <select
                id="filterDepartment"
                class="w-full lg:w-48 border border-slate-300 rounded-lg px-4 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Semua Department</option>
            </select>
        </div>

        <!-- Filter Posisi -->
        <div>
            <select
                 id="filterPosisi"
                 class="w-full lg:w-48 border border-slate-300 rounded-lg px-4 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Semua Posisi</option>
            </select>
        </div>

        <!-- Filter Status -->
        <div>
            <select
                id="filterStatus"
                class="w-full lg:w-48 border border-slate-300 rounded-lg px-4 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="">Semua Status</option>
            </select>
        </div>

        <button
            id="resetFilter"
            type="button"
            class="px-4 py-2 text-sm font-medium text-slate-600 border border-slate-300 rounded-lg hover:bg-slate-100 cursor-pointer">
            Reset
        </button>

        <!-- Tombol Cari
        <div>
            <button
                type="submit"
                class="w-full lg:w-auto bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-5 py-2 rounded-lg cursor-pointer">
                Cari
            </button>
        </div> -->
    </div>
</div>

            <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm overflow-x-auto">

    <table id="karyawanTable" class="w-full text-sm">

        <thead>
            <tr class="text-left text-slate-500 border-b border-slate-200">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Department</th>
                <th class="px-4 py-3">Posisi</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($karyawan as $item)
                <tr class="border-b border-slate-100 hover:bg-slate-50">
                    <td class="px-4 py-4">
                        {{ $item['id'] }}
                    </td>
                    <td class="px-4 py-4 font-medium text-slate-900">
                        {{ $item['nama'] }}
                    </td>
                    <td class="px-4 py-4">
                        {{ $item['department'] }}
                    </td>
                    <td class="px-4 py-4">
                        {{ $item['posisi'] }}
                    </td>
                    <td
                        class="px-4 py-4"
                        data-search="{{ $item['status'] }}">
                        @if ($item['status'] === 'Aktif')
                            <span class="bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-full text-xs font-medium">
                                Aktif
                            </span>
                        @else
                            <span class="bg-red-50 text-red-700 px-2.5 py-1 rounded-full text-xs font-medium">
                                Tidak Aktif
                            </span>
                        @endif
                    </td>
                    <td class="px-4 py-4">
                        <a
                            href="{{ url('/karyawan/' . $item['id']) }}"
                            class="text-indigo-600 hover:text-indigo-800 font-medium">
                            Detail
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
        </div>
    </div>

</body>
</html>