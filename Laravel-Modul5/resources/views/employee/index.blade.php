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
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">{{ $pageTitle}}</h4>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grip gap-2">
                    {{-- membuat menu menuju halaman untuk menambahkan employee baru, dengan link route 'employee.create' --}}
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">Create Employee</a>
                </div>
            </div>
        </div>
        <hr>
        {{-- menampilkan isi tabel dari employe list --}}
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Position</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->firstname }}</td>
                            <td>{{ $employee->lastname }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->age }}</td>
                            <td>{{ $employee->position_name }}</td>
                            <td>
                                <div class="d-flex">
                                {{-- button untuk menampilkan data karyawan --}}
                                    <a href="{{ route('employees.show', ['employee' => $employee->employee_id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-person-lines-fill"></i></a>
                                    {{-- button untuk edit --}}
                                    <a href="{{ route('employees.edit', ['employee' => $employee->employee_id]) }}" class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

                                    <div>
                                        {{-- untuk deletet data --}}
                                        <form action="{{ route('employees.destroy', ['employee' => $employee->employee_id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i class="bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @vite('resources/sass/app.scss')
</body>
</html>
