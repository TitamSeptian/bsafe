@extends('partials.master', [$title = "Material - Buat", $activePage = "material"])
@section('h-content')
@include('partials.modal')
@include('partials.alert')
@endsection
@section('m-content')
<div class="card">
    <div class="card-header">
        <h4 class="float-left">Buat Material</h4>
        <hr>
        {{-- <button class="float-right btn btn-sm btn-primary" id="btn-create" data-url="{{ route('driver.create') }}"><i class="fas fa-plus"></i> Tambah</button> --}}
        <a href="{{ route('material.index') }}" class="float-left btn btn-sm btn-warning"> kembali </a>
    </div>
    <div class="card-body">
        <form id="form-store" action="{{ route('material.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="name" id="name" class="form-control" autocomplete="off" placeholder="Judul" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" id="description" class="form-control" placeholder="Deskripsi">{{ old('description') }}</textarea>
            </div>
            <hr>
            <a class="btn btn-secondary mb-3" href="javascript:void(0)" id="add-attachment"><i class="fas fa-plus"></i> Lampiran</a>
            <div id="attachment-container"></div>
            <button type="submit" class="btn btn-block btn-primary btn-sm"><i class="fas fa-plus"></i> Buat</button>
        </form>
    </div>
</div>
@endsection
@push('js')
<script>
    let attachment = $('#attachment-container');
    let sum = $('#sum');
    $('#add-attachment').on('click', function () {
        attachment.prepend(`
             <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Tipe</label>
                                <select name="type[]" class="form-control form-control-sm">
                                    <option disabled>Tipe Lampiran</option>
                                    <option value="doc">Document</option>
                                    <option value="pdf">PDF</option>
                                    <option value="slide">Slide</option>
                                    <option value="sheet">Sheet</option>
                                    <option value="file">file</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lampiran</label>
                                <input type="file" name="attachment[]" id="attachment" class="form-control" placeholder="Lampiran">
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="javascript:void(0)" class="remove">
                                <div class="icon icon-shape text-muted rounded-circle shadow">
                                   <i class="fas fa-times"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `);
        sum.html(sum.html() + 1);
    });
    $('body').on('click', '.remove', function(e) {
        e.preventDefault();
        $(this).parent().parent().parent().remove();
        
    });
</script>
@endpush