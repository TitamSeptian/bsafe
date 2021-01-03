@extends('partials.master', [$title = "Dashboard", $activePage = "dashboard"])
@section('h-content')
<!-- Card stats -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Materi</h5>
                        <span class="h2 font-weight-bold mb-0">{{ count(\App\Material::get()) }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="ni ni-active-40"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Tugas</h5>
                        <span class="h2 font-weight-bold mb-0">{{ count(\App\Assignment::get()) }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                            <i class="ni ni-chart-pie-35"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Rata Rata Nilai</h5>
                        <span class="h2 font-weight-bold mb-0">
                            {{ substr($nilai, 0, strlen($nilai)-5) }}
                        </span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                            <i class="ni ni-money-coins"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Rank</h5>
                        <span class="h2 font-weight-bold mb-0">#1</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="ni ni-chart-bar-32"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('m-content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <h1>Hallo {{ Auth::user()->username }} !</h2>
            <p>
                <b>bsafe</b> adalah Sebuah aplikasi edukasi berbasis web yang berisi informasi-informasi berkendara dengan baik yang ditargetkan untuk para pengemudi bus sopir yang baik adalah sopir yang memahami tentang karirnya. Tingkatkan pemahaman anda melalui bsafe
            </p>
        </div>
    </div>
</div>
@endsection
