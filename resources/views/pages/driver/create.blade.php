<form id="form-store" action="{{ route('driver.store') }}" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label>NIK</label>
		<input type="text" name="NIK" id="NIK" class="form-control form-control-sm" autocomplete="off" placeholder="NIK">
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="name" id="name" class="form-control form-control-sm" autocomplete="off" placeholder="Nama">
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
		<input type="date" name="birth" id="birth" class="form-control form-control-sm" autocomplete="off" placeholder="Tanggal Lahir">
	</div>
	
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" id="alamat" class="form-control form-control-sm" placeholder="Alamat"></textarea>
	</div>

	<div class="form-group">
		<label>Foto</label>
		<input type="file" name="foto" id="foto" class="form-control form-control-sm">
		<input type="hidden" name="hidden_foto" id="hidden_foto">
	</div>

	<hr class="py-3">
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
<script>
	$("#foto").on('change', function () {
		let val = $(this).val()
		// console.log(val);
		$('#hidden_foto').val(val);
	});
</script>