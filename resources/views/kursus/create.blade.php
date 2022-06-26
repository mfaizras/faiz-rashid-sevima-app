@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <main class="form-registration m-auto">
                    <form action="/proses-kursus" method="POST">
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

                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('course_name') is-invalid @enderror"
                                placeholder="Judul Kursus" name="course_name">
                            @error('course_name')
                                <div class="">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control  @error('course_description') is-invalid @enderror" placeholder="Leave a comment here"
                                name="course_description" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Deskripsi singkat Course</label>
                        </div>
                        @error('course_description')
                            <div class="">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="input-group mb-3">
                            <select class="form-select @error('visibility') is-invalid @enderror" name="visibility"
                                aria-label="Default select example">
                                <option selected>Pilih Akses</option>
                                <option value="public">Public</option>
                                <option value="unlisted">Unlisted</option>
                            </select>
                        </div>
                        @error('visibility')
                            <div class="">
                                {{ $message }}
                            </div>
                        @enderror
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Kirim</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
