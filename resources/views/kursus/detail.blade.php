@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mb-3">Kursus</h3>
            <h2 class="text-center">{{ $datas->course_name }}</h2>
            <p>{{ $datas->course_description }}</p>

            <h6>Timeline kursus</h6>
            <ul style="list-style-type: none;">
                @foreach ($details as $detail)
                    <li>{{ $loop->iteration . '. ' . $detail->course_title }}</li>
                @endforeach
            </ul>
            <a href="/kursus/detail/{{ $datas->id }}/join" class="btn btn-primary rounded-pill container-fluid">Gabung
                Kursus Ini</a>
        </div>
    </div>
@endsection
