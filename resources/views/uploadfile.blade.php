<html>

<head>
    <title>Test b1 uploadfile</title>
</head>
<body style="background-color: aqua;">
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