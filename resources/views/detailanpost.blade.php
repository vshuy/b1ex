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
                {!! $aPost->noidung_lythuyet !!}
            </div>
            <h6>Danh sách câu hỏi luyện tập</h6>
            <div class="col-sm-6">
                @foreach ($listQuestion as $aItem)
                    <div class="mt-5">{{ $loop->iteration }} {{ $aItem->noidung_cauhoi }}</div>
                @endforeach
            </div>
            <div class="col-sm-6">
                @foreach ($listAnswer as $aItem)
                    <div> {{ $loop->iteration }} {{ $aItem->noidung_dapan }} </div>
                @endforeach
            </div>
        </div>
    </div>

</body>


</html>
