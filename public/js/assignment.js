$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('body').on('click', '.btn-nilai', function (e) {
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

$('body').on('submit', '#form-nilai', function (e) {
	e.preventDefault();
	$('.form-group').find('.form-control').removeClass('is-invalid')
	$('form').find('.help-block').remove()
	$(this).find(':input[type=submit]').prop('disabled', true);
	const url = $(this).attr('action');
	const data = $(this).serializeArray();
	$.ajax({
		url: url,
		type: 'POST',
		data: data,
		success: res => {
			$('#tableDriverAssignment').DataTable().ajax.reload();
			Swal.fire({
				title:'Sukses !',
				type:'success',
				text: res.msg,
				showConfirmButton: false,
				timer: 2000
			});
			$('#modal').modal('hide');
		},
		error: xhr => {
			$(this).find(':input[type=submit]').prop('disabled', false);
			if (xhr.status == 500) {
				Swal.fire({
					title:'Aduh !',
					type:'warning',
					text: "Terjadi Kesalahan",
					showConfirmButton: false,
					timer: 2000
				});
			}

			errors = xhr.responseJSON;
			$.each(errors.errors, function (key, value) {
				$('input[name='+key+']').closest('.form-group .form-control').addClass('is-invalid')
				$('input[name='+key+']').closest('.form-group').append(`<span class="help-block text-danger">`+value+`</span>`)
			});
		}
	})
});

$('body').on('click', '.btn-refresh', function (e) {
	$('#tableDriverAssignment').DataTable().ajax.reload();
});

