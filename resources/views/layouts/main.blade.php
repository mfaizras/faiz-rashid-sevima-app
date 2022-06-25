<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Soluschool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/style.css" />
</head>

<body>
    <!-- start navbar -->
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand text-uppercase" href="#">Soluschool</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/kursus">Kursus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/forum">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/class">Kelas</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="/avatar.png" class="profile-navbar-img rounded-pill" alt="" />
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item my-auto">
                            <a href="/login" class="btn btn-outline-light px-3 rounded-pill">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i> Masuk</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- main content -->
    <div class="container mt-3">
        @yield('content')
    </div>

    <!-- akhir main content -->

    <!-- footer -->
    <div class="position-static text-black bottom-0 text-center p-1 mb-2" style="width: 100%">
        <div class="container">© 2022. Made with <i class="fa-solid fa-heart"></i> by <a href="http://faizrashid.my.id/"
                class="text-black"> Faiz Rashid</a> (mfaizras@gmail.com)</div>
    </div>
    <!-- akhir footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
