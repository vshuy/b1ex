<html>

<head>
    <title>Uploadfile page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/1618376060.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- start using font  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
</head>
<body style="background-color: rgb(255, 255, 255);">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e1e1e1;">
        <a class="navbar-brand" href="#">
            <div style="font-family: 'Roboto', sans-serif;font-size: 40px;font-weight: 900;color:green;font-style: italic;">
                B1 EX</div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
            </ul>
            {{-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> --}}

                @if(Auth::check())
                <span style="color: red">Hello {{Auth::user()->name}}</span>
                <a href="{{route('logout')}}" style="margin-left: 25px;"> Logout</a>
                @else
                <a href="{{route('loginpage')}}"> Login</a>
                @endif
        </div>
    </nav>
    <form action="{{route('uploadfile')}}" method="POST" enctype="multipart/form-data">
        @csrf <!-- {{ csrf_field() }} -->
        <span>Select folder data </span>
        <input id="myInput" type="file" name="listfileimg[]" value="SelectFolder" webkitdirectory directory multiple><br><br>
        <span>Select a file excel</span>
        <input type="file"  name="fileExcel"><br><br>
        <input type="submit">
    </form>
</body>
</html>
