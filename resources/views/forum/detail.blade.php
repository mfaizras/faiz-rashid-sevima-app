@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title mb-3">{{ $datas->title }}</h3>
            <p>{!! $datas->forum_content !!}</p>

        </div>
    </div>
    <div class="comment-section my-3">
        <h5>Komentar</h5>
        <form action="/forum/detail/{{ $datas->id }}" method="POST">
            @csrf
            <input type="hidden" name="comment_id" value="{{ $datas->id }}">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" name="comment_content"id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Tuliskan Komentar / Balasan</label>
            </div>
            <button type="submit" class="btn btn-primary my-2"> Tambahkan Komentar</button>
        </form>

        <hr>
        @foreach ($comments as $comment)
            <div class="card mb-2">
                <div class="card-body">
                    <h6>{{ $comment->user->name }}</h6>
                    <p>{{ $comment->comment_content }}</p>
                </div>
            </div>
        @endforeach

    </div>
@endsection
