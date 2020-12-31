<form id="form-store" action="{{ route('operator.store') }}">
	@csrf
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="name" id="name" class="form-control form-control-sm" autocomplete="off" placeholder="Nama">
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" id="username" class="form-control form-control-sm" autocomplete="off" placeholder="username">
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