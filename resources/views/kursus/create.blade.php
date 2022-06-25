@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <main class="form-registration m-auto">
                    <form action="/kursus/create" method="POST">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal text-center">Buat Kursus Baru</h1>
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
                            <input type="text" class="form-control @error('course_name') is-invalid @enderror"
                                placeholder="Judul Kursus" name="course_name">
                            @error('course_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" name="course_description" id="floatingTextarea2"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Deskripsi singkat Course</label>
                        </div>
                        <select class="form-select" name="visibility" aria-label="Default select example">
                            <option selected>Pilih Akses</option>
                            <option value="public">Public</option>
                            <option value="unlisted">Unlisted</option>
                        </select>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Kirim</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
