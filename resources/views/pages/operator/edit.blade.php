<form id="form-edit" action="{{ route('operator.update', $data->id) }}">
	@csrf
	@method('PUT')
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="name" id="name" class="form-control form-control-sm" autocomplete="off" placeholder="Nama" value="{{ $data->name }}">
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" id="username" class="form-control form-control-sm" autocomplete="off" placeholder="username" value="{{ $data->user->username }}">
	</div>
	<div class="form-group">
		<label>Kata Sandi</label>
		<input type="text" name="password" id="password" class="form-control form-control-sm" autocomplete="off" placeholder="Kosongkan Jika Tidak ada Perubahan">
	</div>
	<div class="form-group">
		<label>Konfirmasi Kata Sandi</label>
		<input type="text" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm" autocomplete="off" placeholder="Kosongkan Jika Tidak ada Perubahan">
	</div>
	
	<button type="submit" class="btn btn-primary btn-sm float-right">Edit</button>
</form>