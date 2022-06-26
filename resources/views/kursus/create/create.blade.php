@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <main class="form-registration m-auto">
                    <form action="/mycourse/{{ $course->id }}" method="POST">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal text-center">Buat Materi Baru</h1>
                        @if (session()->has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session()->has('failed'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('failed') }}
                            </div>
                        @endif

                        <div class="input-group">
                            <input type="text" class="form-control @error('course_title') is-invalid @enderror"
                                placeholder="Judul" name="course_title">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Content</label>
                            <input id="body" type="hidden" name="course_content" value="{{ old('body') }}">
                            <trix-editor input="body"></trix-editor>
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Kirim</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
