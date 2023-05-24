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
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('employees.index') }}" class="nav-link active">Employee List</a></li>
                </ul>

                <hr class="d-lg-none text-white-50">

                {{-- membuat menu menuju halaman My Profile, dengan link route 'employee.index' --}}
                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i class="bi-person-circle me-1"></i>My Profile</a>
            </div>
        </div>
    </nav>

     {{-- untuk isi dari conten --}}
    <div class="container-sm mt-5">
        {{-- membuat form, dimana data akan dikirim ke route 'employee.store' menggunakan metode POST --}}
        <form action="{{ route('employees.update', $employee -> id) }}" method="POST">
            {{-- menerapkan CSRF Protection --}}
            @csrf
            @method('PUT')

            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        {{-- judul dari form --}}
                        <h4>Create Employee</h4>
                    </div>
                    <hr>
                    <div class="row">
                        {{-- form untuk First Name --}}
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            {{-- input data Firs Name --}}
                            {{-- @error('age') is-invalid @enderror digunakan untuk menunjukkan terjadi kesalahan dan penanda pada inputan tyang tidak valid --}}
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" id="firstName" value="{{ $employee->firstname }}" placeholder="Enter Last Name">
                            {{-- untuk menampilakan pesan kesalah inputan Firs Name --}}
                            @error('firstName')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- form untuk Last Name --}}
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            {{-- input data Last Name --}}
                            {{-- @error('age') is-invalid @enderror digunakan untuk menunjukkan terjadi kesalahan dan penanda pada inputan tyang tidak valid --}}
                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" id="lastName" value="{{ $employee->lastname }}" placeholder="Enter Last Name">
                            {{-- untuk menampilakan pesan kesalah inputan Last Name --}}
                            @error('lastName')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- form untuk Email --}}
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            {{-- input data Email --}}
                            {{-- @error('age') is-invalid @enderror digunakan untuk menunjukkan terjadi kesalahan dan penanda pada inputan tyang tidak valid --}}
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $employee->email }}" placeholder="Enter Email">
                            {{-- untuk menampilakan pesan kesalah inputan Email --}}
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- form untuk Age --}}
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Age</label>
                            {{-- input data Age --}}
                            {{-- @error('age') is-invalid @enderror digunakan untuk menunjukkan terjadi kesalahan dan penanda pada inputan tyang tidak valid --}}
                            <input type="text" class="form-control @error('age') is-invalid @enderror" name="age" id="age" value="{{ $employee->age }}" placeholder="Enter Age">
                            {{-- untuk menampilakan pesan kesalah inputan Age --}}
                            @error('age')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- untuk create employee bagian position --}}
                        <div class="col-md-12 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select name="position" id="position" class="form-select">
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}" {{ $employee->position_id == $position->id ? 'selected' : '' }}>{{ $position->code.' - '.$position->name }}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            {{-- memberikan tombol Cancel yang akan diarahkan ke route employees.index --}}
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"> Cancel</i></a>
                        </div>
                        <div class="col-md-6 d-grid">
                            {{-- memebero tombol Save yang menunjukkan bahwa data pada form akan di submit --}}
                            <button type="sumbit" class="btn btn-dark btn-lg mat-3"><i class="bi-check-circle me-2"> Edit</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @vite('resources/sass/app.scss')
</body>
</html>

