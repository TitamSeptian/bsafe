@extends('partials.master', [$title = "Driver", $activePage = "driver"])
@section('h-content')
@include('partials.alert')
@endsection

@section('m-content')
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Sopir</h4>
            <hr>
            <a class="float-left btn btn-sm btn-warning" id="btn-create" href="{{ route('driver.index') }}"><i class="fa fa-arrow-circle-o-up"></i> Kembali</a>
        </div>
        <div class="card-body">
           <form id="form-store" action="{{ route('driver.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="NIK" id="NIK" class="form-control form-control-sm" autocomplete="off" placeholder="NIK" value="{{ old('NIK') }}">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" id="name" class="form-control form-control-sm" autocomplete="off" placeholder="Nama" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control form-control-sm" placeholder="Jenis Kelamin">
                    <option disabled>Jenis Kelamin</option>
                    <option value="L">Laki - laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="birth" id="birth" class="form-control form-control-sm" autocomplete="off" placeholder="Tanggal Lahir" value="{{ old('birth') }}">
            </div>
            
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control form-control-sm" placeholder="Alamat">{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" id="foto" class="form-control form-control-sm">
                <input type="hidden" name="hidden_foto" id="hidden_foto">
            </div>

            <hr class="py-3">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" id="username" class="form-control form-control-sm" autocomplete="off" placeholder="username" value="{{ old('username') }}">
            </div>
            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="password" name="password" id="password" class="form-control form-control-sm" autocomplete="off" placeholder="Kata Sandi">
            </div>
            <div class="form-group">
                <label>Konfirmasi Kata Sandi</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm" autocomplete="off" placeholder="Konfirmasi Kata Sandi">
            </div>
            
            <button type="submit" class="btn btn-primary btn-sm float-right">Tambah</button>
        </form>
        </div>
    </div>
@endsection
@push('js')

@endpush