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
            2
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

    <div class="flex flex-col md:flex-row gap-4">

        <!-- Search Karyawan -->
        <div class="flex-1">
            <input
                type="text"
                placeholder="Cari nama karyawan..."
                class="w-full border border-slate-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
        </div>

        <!-- Filter Department -->
        <div>
            <select
                class="w-full md:w-48 border border-slate-300 rounded-lg px-4 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
                <option value="">Semua Department</option>
                <option value="Produksi">Produksi</option>
                <option value="HR">HR</option>
            </select>
        </div>

<!-- Filter Posisi -->
<div>
    <select
        class="w-full md:w-48 border border-slate-300 rounded-lg px-4 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
    >
        <option value="">Semua Posisi</option>
        <option value="Operator">Operator</option>
        <option value="Staff HR">Staff HR</option>
    </select>
</div>

        <!-- Filter Status -->
        <div>
            <select
                class="w-full md:w-40 border border-slate-300 rounded-lg px-4 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
                <option value="">Semua Status</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>

    </div>

</div>

            @foreach ($karyawan as $item)
                <p>
                    {{ $item['id'] }} -
                    {{ $item['nama'] }} -
                    {{ $item['department'] }} -
                    {{ $item['posisi'] }} -
                    {{ $item['status'] }}
                </p>
            @endforeach
        </div>
    </div>

</body>
</html>