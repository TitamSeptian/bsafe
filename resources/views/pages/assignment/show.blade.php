@extends('partials.master', [$title = "Tugas - Lihat", $activePage = "assignment"])
@section('h-content')
@include('partials.modal')
@include('partials.alert')
@endsection
@section('m-content')
<div class="card">
    <div class="card-header">
        <h4 class="float-left">Detail Tugas</h4>
        {{-- <button class="float-right btn btn-sm btn-primary" id="btn-create" data-url="{{ route('driver.create') }}"><i class="fas fa-plus"></i> Tambah</button> --}}
        <a href="{{ route('assignment.index') }}" class="float-right btn btn-sm btn-warning"> kembali </a>
    </div>
    <div class="card-body">
        <h2><i class="ni ni-book-bookmark"></i> {{ $data->name }}</h2>
        <h5 class="float-right"><i class="ni ni-bell-55"></i>&nbsp;{{ $data->due_date }}</h5>
        <hr>
        <p>{{ $data->description }}</p>
        {{-- <p>{{ $data->material_attachment[0] }}</p> --}}
        <div class="row">
            @foreach ($data->assignment_attachment as $item)

                <div class="col-md-6 rounded d-flex border p-3">
                    <h1>
                        <i class="ni ni-single-copy-04 ml-2"></i>
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
        <hr>
        @if(Auth::user()->roles == "driver")
        <form id="form-store" action="{{ route('assignment.driver', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                {{-- <label>File</label> --}}
                <input type="file" name="file" class="form-control" placeholder="File">
            </div>  
            <button type="submit" class="btn btn-block btn-info btn-sm">Kirim</button>
        </form>
        @endif
    </div>
</div>
@endsection