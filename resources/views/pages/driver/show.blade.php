<div class="row">
	<div class="col-md-4">
		<img src="{{ asset("/foto/$data->foto")  }}" class="img-fluid">
	</div>
	<div class="col-md-8">
		<table>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>&nbsp;{{ $data->NIK }}</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>&nbsp;{{ $data->name }}</td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td>&nbsp;{{ $data->birth }}</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td>&nbsp;{{ $data->gender == "L" ? "Laki - laki" : "Perempuan" }}</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td>&nbsp;{{ $data->alamat }}</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td><b>&nbsp;{{ $data->status }}</b></td>
			</tr>
			<hr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td>&nbsp;{{ $data->user->username }}</td>
			</tr>
			

		</table>
	</div>
</div>