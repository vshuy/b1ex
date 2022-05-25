<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Category create page</title>
    <link href="{{ asset('src/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('src/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <h6>Trang tạo category</h6>
            </div>
            <div class="col-sm-12">
                <form action="{{ route('uploadcategory') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    <span>Nhập tên Danh mục</span>
                    <input type="text" name="categoryname" style="width:600px;"><br>
                    <span>Nhập vào mô tả</span>
                    <input type="text" name="categorydescripe" style="width:600px;">
                    <p><input type="submit" value="Create category"></p>
                </form>
            </div>
        </div>
    </div>


</body>


</html>
