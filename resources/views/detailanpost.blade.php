<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Detail document</title>
    <link href="{{ asset('src/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('src/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <h6>Chi tiết tài liệu</h6>
            </div>
            <div class="col-sm-12">
                {!! $aPost->contents_post !!}
            </div>
        </div>
    </div>

</body>


</html>
