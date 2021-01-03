<div class="rounded d-flex border">
    <h1>
        <i class="ni ni-single-copy-04 ml-2"></i>
    </h1>
    <a href="{{ asset("/attachment/".$data->attachment->attachment) }}" target="_blank">
        <div class="ml-4">
            <h3>{{ $data->attachment->attachment }}</h3>
            <small>{{ $data->attachment->type }}</small>
        </div>
    </a>
</div>
<form action="{{ route('assignment.driver.nilai', $data->id) }}" method="POST" id="form-nilai">
    @csrf
    <div class="form-group">
        <label>Nilai</label>
        <input 
            type="number" 
            class="form-control form-control-sm" 
            name="score" 
            id="score" 
            placeholder="Nilai [0-100]" 
            min="0" 
            max="100" 
            value="{{ $data->score == null ? "" : $data->score }}"
            required 
            >
    </div>
    <button type="submit" class="btn btn-block btn-primary btn-sm"> Nilai</button>
</form>