<a href="javascript:void(0)" data-title="{{ $model->name }}" data-url="{{ $url_show }}" class="badge badge-info btn-show">
	<i class="fas fa-eye"></i> Detail
</a>
<a href="{{ $url_edit }}" data-title="{{ $model->name }}" data-url="{{ $url_edit }}" class="badge badge-warning btn-edit">
	<i class="fas fa-pencil-alt"></i> Edit
</a>
<a href="javascript:void(0)" data-title="{{ $model->name }}" data-url="{{ $url_delete }}" class="badge badge-danger btn-delete">
	<i class="fas fa-trash"></i> Hapus
</a>