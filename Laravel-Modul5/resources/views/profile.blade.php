<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$pageTitle}}</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    {{-- untuk bagian navbar pada halaman yang memuat menu yang ditampilkan pada halaman --}}
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            {{-- alamat link dari route 'home' sesuai dengan apa yang ada pada HomeController yang mengarahkan pada halaman home --}}
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i>Data Master</a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">

                <ul class="navbar-nav flex-row flex-wrap">
                    {{-- membuat menu menuju halaman Home, dengan link route 'home' --}}
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    {{-- membuat menu menuju halaman Employe List, dengan link route 'employee.index'--}}
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('employees.index') }}" class="nav-link">Employee List</a></li>
                </ul>

                <hr class="d-lg-none text-white-50">

                {{-- membuat menu menuju halaman My Profile, dengan link route 'employee.index' --}}
                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i class="bi-person-circle me-1"></i>My Profile</a>
            </div>
        </div>
    </nav>

    {{-- untuk isi dari conten --}}
    <div class="container mt-4">
        <h4>{{ $pageTitle }}</h4>
        <hr>
        {{-- menampilkan isi dari conten --}}
        <div class="d-flex align-items-center py-2 px-4 bg-light rounded-3 border">
            <div class="bi-house-fill me-3 fs-1"></div>
            <h4 class="mb-0">Well done! this is {{ $pageTitle}}.</h4>
        </div>
    </div>
    @vite('resources/sass/app.scss')
</body>
</html>
