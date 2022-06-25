@extends('layouts.main')

@section('content')
    <div class="row">

        <div class="col-lg-4 col-sm-12 mt-3">
            <div class="card" id="collapseCard">
                <div class="card-body">
                    @foreach ($lists as $list)
                        <p><a class="btn btn-primary rounded-pill container-fluid"
                                href="/kursus/{{ $datas->id }}/{{ $list->id }}">{{ $list->course_title }}</a></p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-3">Kursus</h3>
                    <h2 class="text-center">{{ $details->course_title }}</h2>
                    <p>{{ $details->course_content }}</p>


                    <a href="/kursus/{{ $datas->id }}/{{ $details->id }}/next"
                        class="btn btn-primary rounded-pill container-fluid">Lanjutkan</a>

                </div>
            </div>
        </div>
    @endsection
