import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/dataTables.dataTables.css';

import 'datatables.net-responsive-dt';
import 'datatables.net-responsive-dt/css/responsive.dataTables.css';

document.addEventListener('DOMContentLoaded', () => {

    const tableElement = document.querySelector('#karyawanTable');

    if (!tableElement) return;

    const table = new DataTable('#karyawanTable', {
        responsive: true,
        pageLength: 10,
        order: [[1, 'asc']],

        layout: {
            topStart: 'pageLength',
            topEnd: null,
            bottomStart: 'info',
            bottomEnd: 'paging',
        },

        language: {
            lengthMenu: 'Tampilkan _MENU_ data',
            info: 'Menampilkan _START_ - _END_ dari _TOTAL_ karyawan',
            infoEmpty: 'Tidak ada data karyawan',
            zeroRecords: 'Karyawan tidak ditemukan',
        },
    });

    function populateFilter(selectId, columnIndex, defaultText) {
    const select = document.querySelector(selectId);

    if (!select) return;

    const values = [
        ...new Set(
            table
                .column(columnIndex)
                .data()
                .toArray()
                .map(value => value.trim())
                .filter(Boolean)
        )
    ].sort((a, b) => a.localeCompare(b));

    select.innerHTML = '';

    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = defaultText;

    select.appendChild(defaultOption);

    values.forEach(value => {
        const option = document.createElement('option');

        option.value = value;
        option.textContent = value;

        select.appendChild(option);
    });
}

populateFilter('#filterDepartment', 2, 'Semua Department');
populateFilter('#filterPosisi', 3, 'Semua Posisi');
// populateFilter('#filterStatus', 4, 'Semua Status');
populateStatusFilter();

function populateStatusFilter() {
    const select = document.querySelector('#filterStatus');

    if (!select) return;

    const statusCells = document.querySelectorAll(
        '#karyawanTable tbody td[data-search]'
    );

    const values = [
        ...new Set(
            [...statusCells]
                .map(cell => cell.dataset.search)
                .filter(Boolean)
        )
    ].sort((a, b) => a.localeCompare(b));

    select.innerHTML = '<option value="">Semua Status</option>';

    values.forEach(value => {
        const option = document.createElement('option');

        option.value = value;
        option.textContent = value;

        select.appendChild(option);
    });
}

    // Live Search
    document
        .querySelector('#searchKaryawan')
        ?.addEventListener('input', function () {
            table.column(1)
            .search(this.value)
            .draw();
        });

    // Filter Department
document
    .querySelector('#filterDepartment')
    ?.addEventListener('change', function () {
        table
            .column(2)
            .search(this.value, { exact: this.value !== '' })
            .draw();
    });

// Filter Posisi
document
    .querySelector('#filterPosisi')
    ?.addEventListener('change', function () {
        table
            .column(3)
            .search(this.value, { exact: this.value !== '' })
            .draw();
    });

// Filter Status
document
    .querySelector('#filterStatus')
    ?.addEventListener('change', function () {
        table
            .column(4)
            .search(this.value, { exact: this.value !== '' })
            .draw();
    });

    // Reset Filter
document
    .querySelector('#resetFilter')
    ?.addEventListener('click', function () {

        // Reset tampilan input
        document.querySelector('#searchKaryawan').value = '';
        document.querySelector('#filterDepartment').value = '';
        document.querySelector('#filterPosisi').value = '';
        document.querySelector('#filterStatus').value = '';

        // Reset filter DataTables
        table.column(1).search('', { exact: false });
        table.column(2).search('', { exact: false });
        table.column(3).search('', { exact: false });
        table.column(4).search('', { exact: false });

        table.draw();
    });

        const resetButton = document.querySelector('#resetFilter');

        resetButton?.addEventListener('click', function () {

        // Kosongkan tampilan input
        searchInput.value = '';
        departmentFilter.value = '';
        posisiFilter.value = '';
        statusFilter.value = '';

        // Kosongkan semua filter DataTables
        table.column(1).search('');
        table.column(2).search('');
        table.column(3).search('');
        table.column(4).search('');

        // Jaga-jaga kalau global search pernah terisi
        table.search('');

        // Render ulang tabel
        table.draw();
        });
});