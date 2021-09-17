<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Document edit page</title>
    <link href="{{ asset('src/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('src/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/ckeditor/ckeditor.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <h6>Trang chỉnh sửa tài liệu</h6>
            </div>
            <div class="col-sm-12">
                <form action="/updatepostrequest" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    <textarea name="editor1" id="editor1" rows="10" cols="80">
                        {!! $aPost->noidung_lythuyet !!}
                </textarea>
                    <input type="hidden" id="idpost" name="idpost" value="{{ $aPost->id }}">
                    <span>Nhập tên tài liệu</span>
                    <input type="text" name="postname" value="{{ $aPost->ten_lythuyet }}" style="width:600px;">
                    <p><input type="submit" value="Update document"></p>
                </form>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('editor1', {
            extraPlugins: 'uploadimage,image2',
            filebrowserUploadUrl: '{{ route('upload', ['_token' => csrf_token()]) }}',
            filebrowserUploadMethod: 'form',
            height: 700,
        });
    </script>

</body>


</html>
