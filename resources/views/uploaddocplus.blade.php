<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Trang tạo bài học</title>
    <link href="{{ asset('src/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('src/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('src/ckeditor/ckeditor.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <h6>Trang tạo bài học</h6>
            </div>
            <div class="col-sm-12">
                <form action="{{ route('uploadpost') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ csrf_field() }}
                    <textarea name="editor1" id="editor1" rows="10" cols="80">
                </textarea>
                    <span>Nhập tên bài học</span>
                    <input type="text" name="postname" style="width:600px;">
                    <span>Chọn loại bài học</span>
                    <select name="category" id="category">
                        @foreach ($listCategories as $aItem)
                            <option value="{{ $aItem->id }}"> {{ $aItem->ten_loai }}</option>
                        @endforeach
                    </select>
                    <br>
                    <span>Chọn một file excel chứa câu hỏi luyện tập bài học</span>
                    <input type="file" name="fileExcel" value="Select a excel file"><br>
                    <p><input type="submit" value="Upload document"></p>
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
