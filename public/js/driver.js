$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('body').on('click', '.btn-show', function (e) {
	e.preventDefault();
	const url = $(this).data('url');
	const title = $(this).data('title');
	$.ajax({
		url: url,
		dataType: 'html',
		success: (res) => {
			$('#modal-body').html(res)
			$('#modal-title').html(title)
			$('#modal').modal('show');
		}
	})
});

// when click button delete will be delete spesifik data form storage using softDeelet
$('body').on('click', '.btn-delete', function (e) {
	e.preventDefault();
	const url = $(this).data('url');
	const data = $(this).data('title');

	Swal.fire({
		title:'Anda Yakin ?',
		type:'warning',
		text:data + ' Akan Dihapus',
		showCancelButton: true,
		confirmButtonColor:'#ff4f70',
		cancelButtonColor:'#8A8A8A',
		confirmButtonText:'Ya, Hapus !',
		cancelButtonText:'Batal',
	})
	.then(res=>{
		if (res.value) {
			$.ajax({
				url:url,
				type:'POST',
				data: {
					'_method':'DELETE'
				},
				success: function(res){
					$('#myModal').modal('hide');

					Swal.fire({
						title:'Sukses !',
						type:'success',
						text:res.msg,
						showConfirmButton: false,
						timer: 1800
					});

					$('#tableDriver').DataTable().ajax.reload();
				},

				error: function(xhr){
					const errors = xhr.responseJSON;

					Swal.fire({
						title:'Peringatan !',
						type:'warning',
						text:errors.msg,
					});
				}
			});
		}
	})
});


$('body').on('click', '.btn-refresh', function (e) {
	$('#tableDriver').DataTable().ajax.reload();
});

