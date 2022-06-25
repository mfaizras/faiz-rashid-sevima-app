@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mb-3">Kursus</h3>
            <div class="row">
                @foreach ($datas as $data)
                    <div class="card col-lg-6 col-sm-12 mt-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->course_name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Course by : {{ $data->user->name }}</h6>
                            <p class="card-text">{{ $data->course_description }}</p>
                            <a href="/kursus/detail/{{ $data->id }}"
                                class="btn btn-primary container-fluid rounded-pill">Lihat Lebih
                                Lanjut</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
