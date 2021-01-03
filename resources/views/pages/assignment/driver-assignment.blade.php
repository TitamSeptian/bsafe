@extends('partials.master', [$title = "Tugas - Lihat Pengerjaan", $activePage = "assignment"])
@section('h-content')
@include('partials.modal')
@include('partials.alert')
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" type="text/css">
@endpush
@section('m-content')
<div class="card">
    <div class="card-header">
        <h4 class="float-left">Pengerjaan Tugas</h4>
        {{-- <button class="float-right btn btn-sm btn-primary" id="btn-create" data-url="{{ route('driver.create') }}"><i class="fas fa-plus"></i> Tambah</button> --}}
        <a href="{{ route('assignment.index') }}" class="float-right btn btn-sm btn-warning"> kembali </a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered no-wrap" style="width: 100%" id="tableDriverAssignment">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Tugas</td>
                    <td>Nilai</td>
                    <td></td>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"> </script>
<script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"> </script>
<script src="{{ asset('assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"> </script>
<script>
    $(document).ready(function() {
    let tableTitle = 'Tugas Sopir';
    $('#tableDriverAssignment').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        //bLengthChange: false, //hide show entrie
        ajax: "{{ route('driver.assignment.data') }}",
        columns: [
            { data: "DT_RowIndex", orderable: false, searchable: false },
            { data: "driver.name" },
            { data: "assignment.name" },
            { data: "score", render: function(a,b,c){
                return c.score == null ? "Belum dinilai" : c.score
            } },
            { data: 'action', orderable: false, searchable: false },
        ],
        oLanguage: {
            sEmptyTable: tableTitle+ " Masih Kosong",
            sInfo: "Total _TOTAL_ "+tableTitle+" Untuk Ditampilkan (_START_ - _END_)",
            sInfoFiltered: " - Dari _MAX_ "+ tableTitle,
            sLoadingRecords: "Memuat...",
            sZeroRecords: tableTitle+ "Tidak Ditemukan",
            sProcessing: "Sedang Memuat...",
            sInfoEmpty: tableTitle + " Tidak ada",
            oPaginate: {
                sNext: '<i class="fas fa-angle-right"></i>',
                sPrevious: '<i class="fas fa-angle-left"></i>',
            }
       }
    });
});
</script>
<script src="{{ asset('js/assignment.js') }}"></script>
@endpush