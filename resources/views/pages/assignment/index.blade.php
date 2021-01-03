@extends('partials.master', [$title = "Tugas", $activePage = "assignment"])
@section('h-content')
@include('partials.modal')
@include('partials.alert')
@endsection
@section('m-content')
@if(Auth::user()->roles == 'admin' || Auth::user()->roles == 'operator')
    @if(count($data) > 0)
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Tugas</h4>
            <a href="{{ route('driver.assignment.index') }}" class="float-right btn btn-sm btn-info ml-2"> Pengerjaan Tugas</a>
            <a href="{{ route('assignment.create') }}" class="float-right btn btn-sm btn-primary"><i class="fas fa-plus"></i> Buat </a>
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
                            <a href="{{ route('assignment.show', $val->id) }}" class="ml-2 btn btn-info btn-sm float-right mb-4"><i class="fas fa-eye"></i> Detail</a>
                            <a href="{{ route('assignment.edit', $val->id) }}" class="btn btn-warning btn-sm float-right mb-4"><i class="fas fa-pencil-alt"></i> Edit</a>
                            <a href="{{ route('assignment.delete', $val->id) }}" class="mr-2 btn btn-danger btn-sm float-right mb-4"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @else 
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Tugas</h4>
            <a href="{{ route('assignment.create') }}" class="float-right btn btn-sm btn-primary"><i class="fas fa-plus"></i> Buat </a>
        </div>
        <div class="card-body">
            <h2>Masih kosong</h2>
        </div>
    </div>
    @endif
@else 
    @if(count($data) > 0)
    <div class="row">
        @foreach ($data as $val)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-left">{{ $val->name }}</h4>
                    <sup>
                        #
                        <span>
                            {{ count($val->driver_assignment_attachment) > 0 ? $val->driver_assignment_attachment[0]->status : "akses"  }}
                        </span>
                    </sup>
                </div>
                <div class="card-body">
                    <p>{{ substr($val->description, 0, 200)."..." }}</p>
                    <a href="{{ route('assignment.show', $val->id) }}" class="ml-2 btn btn-info btn-sm float-right mb-4"><i class="fas fa-eye"></i> Lihat</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else 
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Tugas</h4>
        </div>
        <div class="card-body">
            <h2>Masih kosong</h2>
        </div>
    </div>
    @endif
@endif
@endsection

