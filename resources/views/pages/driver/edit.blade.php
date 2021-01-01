@extends('partials.master', [$title = "Driver", $activePage = "driver"])
@section('h-content')
@include('partials.alert')
@endsection
@section('m-content')
<div class="card">
    <div class="card-header">
        <h4 class="float-left">Edit Sopir - {{ $data->name }}</h4>
        <hr>
        <a class="float-left btn btn-sm btn-warning" id="btn-create" href="{{ route('driver.index') }}"><i class="fa fa-arrow-circle-o-up"></i> Kembali</a>
    </div>
    <div class="card-body">
        <form id="form-store" action="{{ route('driver.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="NIK" id="NIK" class="form-control form-control-sm" autocomplete="off" placeholder="NIK" value="{{ $data->NIK }}">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" id="name" class="form-control form-control-sm" autocomplete="off" placeholder="Nama" value="{{ $data->name }}">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control form-control-sm" placeholder="Jenis Kelamin">
                    <option disabled>Jenis Kelamin</option>
                    <option value="L" {{ $data->gender == "L" ? "selected" : ""}}>Laki - laki</option>
                    <option value="P" {{ $data->gender == "P" ? "selected" : ""}}>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="birth" id="birth" class="form-control form-control-sm" autocomplete="off" placeholder="Tanggal Lahir" value="{{ $data->birth }}">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control form-control-sm" placeholder="Alamat">{{ $data->alamat }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset("/foto/$data->foto")  }}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Foto</label>
                        <small><b>*</b>Kosongkan Jika tidak ada perubahan</small>
                        <input type="file" name="foto" id="foto" class="form-control form-control-sm">
                        <input type="hidden" name="hidden_foto" id="hidden_foto" {{ $data->foto }}>
                    </div>
                </div>
            </div>
            <hr class="py-3">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" id="username" class="form-control form-control-sm" autocomplete="off" placeholder="username" value="{{ $data->user->username }}">
            </div>
            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="password" name="password" id="password" class="form-control form-control-sm" autocomplete="off" placeholder="Kosongkan Jika tidak ada perubahan">
            </div>
            <div class="form-group">
                <label>Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm" autocomplete="off" placeholder="Kosongkan Jika tidak ada perubahan">
            </div>
            <button type="submit" class="btn btn-primary btn-sm float-right">Edit</button>
        </form>
    </div>
</div>
@endsection
@push('js')
@endpush
