@extends('partials.master', [$title = "Material - Lihat", $activePage = "material"])
@section('h-content')
@include('partials.modal')
@include('partials.alert')
@endsection
@section('m-content')
<div class="card">
    <div class="card-header">
        <h4 class="float-left">Detail Material</h4>
        {{-- <button class="float-right btn btn-sm btn-primary" id="btn-create" data-url="{{ route('driver.create') }}"><i class="fas fa-plus"></i> Tambah</button> --}}
        <a href="{{ route('material.index') }}" class="float-right btn btn-sm btn-warning"> kembali </a>
    </div>
    <div class="card-body">
        <h2><i class="ni ni-book-bookmark"></i> {{ $data->name }}</h2>
        <hr>
        <p>{{ $data->description }}</p>
        {{-- <p>{{ $data->material_attachment[0] }}</p> --}}
        <div class="row">
            @foreach ($data->material_attachment as $item)

                <div class="col-md-6 rounded d-flex border p-3">
                    <h1>
                        <i class="ni ni-single-copy-04 ml-2"></i>
                    {{-- @if($item->attachment->type == 'pdf')
                        <i class="fas fa-archive"></i>
                    @elseif($item->attachment->type == 'doc')
                    <i class="fa fa-file-word-o"></i>
                    @elseif($item->attachment->type == 'sheet')
                        <i class="fa fa-file-excel-o"></i>
                    @elseif($item->attachment->type == 'slide')
                        <i class="fa fa-file-powerpoint-o"></i>
                        @else
                        <i class="fa fa-file-o"></i>
                    @endif --}}
                    </h1>
                    <a href="{{ asset("/attachment/".$item->attachment->attachment) }}" target="_blank">
                        <div class="ml-4">
                            <h3>{{ $item->attachment->attachment }}</h3>
                            <small>{{ $item->attachment->type }}</small>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{-- <form id="form-store" action="{{ route('material.store') }}" method="POST" enctype="multipart/form-data">
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
        </form> --}}
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