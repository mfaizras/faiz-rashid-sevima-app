@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <main class="form-registration m-auto">
                    <form action="/login" method="POST">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
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

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                                id="email" placeholder="name@example.com" autofocus required
                                value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required>

                            <label for="password">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    </form>
                    <p class="my-3 text-center">Belum Mendaftar? </p>
                    <a class="container-fluid btn btn-primary" href="/register">Daftar Disini</a></a>
                </main>
            </div>
        </div>
    </div>
@endsection
