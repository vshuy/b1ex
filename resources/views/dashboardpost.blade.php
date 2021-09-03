<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document page overview</title>
    <link href="{{ asset('src/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('src/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/dashboard.js') }}"></script>
    <link href="{{ asset('src/dashboard.css') }}" rel="stylesheet">
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
                    <span style="color: red;">{{ Auth::user()->name }}</span>
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
                            <a class="nav-link active" aria-current="page" href="{{ route('uploadpostpage') }}">
                                <span data-feather="home"></span> Tạo tài liệu mới
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('dashboardcategory') }}">
                                <span data-feather="home"></span> Quản lý loại tài liệu
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="table-responsive">
                    <h2>Quản lý Document</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Xem chi tiết</th>
                                <th>Chỉnh sửa tài liệu</th>
                                <th>Xóa document</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listpost as $APost)
                                <tr>
                                    <td>{{ $APost->id }}</td>
                                    <td>{{ $APost->name_post }}</td>
                                    <td><a href="/detailanpostby/{{ $APost->id }}">Xem chi tiết tài liệu này</a>
                                    </td>
                                    <td><a href="/updateanpostby/{{ $APost->id }}">Chỉnh sửa tài liệu này</a></td>
                                    <td><a href="/deleteanpostby/{{ $APost->id }}">Xóa tài liệu này</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
