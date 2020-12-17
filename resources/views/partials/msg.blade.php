@if ($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>
        <h4>Aduh !!</h4>
    </strong><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif (session('msgSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>
        <h4>Sukses!</h4>
    </strong><br>
    {!! session('msgSuccess') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(session('msgWarning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>
        <h4>Terjadi Kesalahan !!</h4>
    </strong><br>
    {{ session('msgWarning') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
