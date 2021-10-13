<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin page</title>
    <link href="{{ asset('src/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('src/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/dashboard.js') }}"></script>
    <link href="{{ asset('src/dashboard.css') }}" rel="stylesheet">
    <style>
        #myForm {
            display: none;
            position: absolute;
            top: 100px;
            left: 500px;
        }

    </style>
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('dashboard') }}" style="color:green">B1
            EX</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                @if (Auth::check())
                    <span style="color: red;" class="mr-3">{{ Auth::user()->name }}</span>
                    <form id="logout-form" style="color: blue;display: inline;margin-left: 2px;"
                        action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}"> Login</a>
                @endif
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('uploadfilepage') }}">
                                <span data-feather="home"></span> Tải lên một đề
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#" onclick="openForm()">
                                <span data-feather="home"></span> Tạo một đề mới
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('dashboardpost') }}">
                                <span data-feather="home"></span> Quản lý tài liệu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('users.index') }}">
                                <span data-feather="home"></span> Quản lý user
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('roles.index') }}">
                                <span data-feather="home"></span> Quản lý roler
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="text-center" style="position: relative;">
                    <div class="form-popup bg-light" id="myForm" style="padding: 10px;">
                        <form method="POST" action="{{ route('createOneExam') }}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="email"><b>Enter name of exam</b></label></br>
                                <input class="form form-control" type="text" placeholder="Enter exam name here"
                                    name="exam_name" required /></br>
                                <button type="submit" class="btn btn-info">Create new exam</button>
                                <button type="button" class="btn btn-danger" onclick="closeForm()">
                                    Hủy
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <h2>Quản lý đề gốc</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th> Xem chi tiết</th>
                                <th>Xóa đề</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listde as $ADe)
                                <tr>
                                    <td>{{ $ADe->id }}</td>
                                    <td>{{ $ADe->name }}</td>
                                    <td><a href="/detailanrootexamby/{{ $ADe->id }}">Xem chi tiết đề này</a></td>
                                    <td><a href="/deleteanrootexamby/{{ $ADe->id }}">Xóa đề này</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script>
        function openForm() {
            document.getElementById('myForm').style.display = 'block';
        }

        function closeForm() {
            document.getElementById('myForm').style.display = 'none';
        }
    </script>
</body>

</html>
