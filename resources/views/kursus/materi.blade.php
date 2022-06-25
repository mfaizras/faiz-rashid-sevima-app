@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mb-3">Kursus</h3>
            <h2 class="text-center">{{ $datas->course_name }}</h2>
            <p>{{ $datas->course_description }}</p>

            <h6>Timeline kursus</h6>

            @foreach ($details as $detail)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $loop->iteration . '. ' . $detail->course_title }}</h5>
                        <a href="/kursus/{{ $datas->id }}/{{ $detail->id }}"
                            class="btn btn-primary rounded-pill container-fluid">Mulai Kursus</a>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
