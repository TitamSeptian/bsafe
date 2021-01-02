@extends('partials.master', [$title = "Material", $activePage = "material"])
@section('h-content')
@include('partials.modal')
@include('partials.alert')
@endsection
@section('m-content')
@if(Auth::user()->roles == 'admin' || Auth::user()->roles == 'operator')
<div class="card">
    <div class="card-header">
        <h4 class="float-left">Material</h4>
        {{-- <button class="float-right btn btn-sm btn-primary" id="btn-create" data-url="{{ route('driver.create') }}"><i class="fas fa-plus"></i> Tambah</button> --}}
        <a href="{{ route('material.create') }}" class="float-right btn btn-sm btn-primary"><i class="fas fa-plus"></i> Buat </a>
    </div>
    <div class="card-body">
        <div id="accordion" class="custom-accordion mb-4">
            @foreach($data as $val)
            <div class="card mb-0">
                <div class="card-header bg-grey">
                    <h5 class="m-0">
                        <a class="custom-accordion-title d-block pt-2 pb-2 text-muted" data-toggle="collapse" href="#{{$val->slug}}" aria-expanded="true" aria-controls="{{$val->slug}}">
                             {{ $val->name }} 
                             <span class="float-right"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                        </a>
                    </h5>
                </div>
                <div id="{{$val->slug}}" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <p>{{ $val->description }}</p>
                        <br>
                        <a href="{{ route('material.show', $val->id) }}" class="ml-2 btn btn-info btn-sm float-right mb-4"><i class="fas fa-eye"></i> Detail</a>
                        <a href="{{ route('material.edit', $val->id) }}" class="btn btn-warning btn-sm float-right mb-4"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <a href="{{ route('material.delete', $val->id) }}" class="mr-2 btn btn-danger btn-sm float-right mb-4"><i class="fas fa-trash"></i> Hapus</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@else 
<div class="row">
    @foreach ($data as $val)
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="float-left">{{ $val->name }}</h4>
            </div>
            <div class="card-body">
                <p>{{ substr($val->description, 0, 200)."..." }}</p>
                <a href="{{ route('material.show', $val->id) }}" class="ml-2 btn btn-info btn-sm float-right mb-4"><i class="fas fa-eye"></i> Lihat</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection

