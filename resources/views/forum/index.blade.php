@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mb-3">Forum</h3>
            @auth
                <a href="/forum/create" class="btn btn-primary">Buat Forum Baru</a>
            @endauth
            @foreach ($datas as $data)
                <h5><a class="text-black " href="/forum/detail/{{ $data->id }}">{{ $data->title }}</a></h5>
                <p>{{ Str::limit(strip_tags($data->forum_content), 200) }}</p>
                <hr class="my-2">
            @endforeach
        </div>
    </div>
@endsection
