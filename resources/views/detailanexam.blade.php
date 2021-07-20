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
                    <a href="{{ route('logout') }}" style="margin-left: 25px;"> Logout</a>
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
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container">
                    {{-- --------------------------------------------------part 1 ok No test this part---------------------------------------- --}}
                    <h2>Chi tiết một đề</h2>
                    <div class="row">
                        <h6>Part1</h6>
                        <div class="colsm-12"> <img
                                src="{{ url('/') . '/' . $oneExam[0]['listPartDocumentArray'][1]->url }}" alt="error">
                        </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[0]['questions'] as $aItem)
                                <div class="mt-5">{{ $loop->iteration }} {{ $aItem->noidung_cauhoi }}</div>
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[0]['document'] as $aItem)
                                <div class="mt-3"> {{ $loop->iteration }} <img
                                        src="{{ url('/') . '/' . $aItem->url }}" alt="error"></div>
                            @endforeach
                        </div>
                        {{-- -----------------------------------------------part 2 ok no test this part------------------------------------------------------------- --}}
                        <h6>Part2</h6>
                        <div class="colsm-12"> <img
                                src="{{ url('/') . '/' . $oneExam[1]['listPartDocumentArray'][1]->url }}"
                                alt="error"> </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[1]['questions'] as $aItem)
                                <div class="mt-5">{{ $loop->iteration }} {{ $aItem->noidung_cauhoi }}</div>
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[1]['answers'] as $aItem)
                                <div class="mt-1"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>
                        {{-- -------------------------------------------------part 3.1 ok no test this part------------------------------------------------------------ --}}
                        <h6>Part3.1</h6>
                        <div class="colsm-12"> <img
                                src="{{ url('/') . '/' . $oneExam[2]['listPartDocumentArray'][1]->url }}"
                                alt="error"> </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[2]['questions'] as $aItem)
                                <div class="mt-5">{{ $loop->iteration }} {{ $aItem->noidung_cauhoi }}</div>
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[2]['answers'] as $aItem)
                                <div class="mt-1"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>
                        {{-- ---------------------------------------------------Part 3.2 ok no test this part----------------------------------- --}}
                        <h6>Part3.2</h6>
                        <div class="col-sm-5">
                            <img src="{{ url('/') . '/' . $oneExam[3]['listPartDocumentArray'][1]->url }}"
                                alt="error">
                        </div>
                        <div class="col-sm-7">
                            @foreach ($oneExam[3]['answers'] as $aItem)
                                <div class="mt-5"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>
                        {{-- -----------------------------------------------------Part 4 ok no test this part--------------------------------- --}}
                        <h6>Part4</h6>
                        <div class="colsm-12"> <img
                                src="{{ url('/') . '/' . $oneExam[4]['listPartDocumentArray'][1]->url }}"
                                alt="error"> </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[4]['questions'] as $aItem)
                                <div class="mt-4">{{ $loop->iteration }} {{ $aItem->noidung_cauhoi }}</div>
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[4]['answers'] as $aItem)
                                <div class="mt-0"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>
                        {{-- ------------------------------------------Part 5 ok no test this part----------------------------------------------- --}}
                        <h6>Part5</h6>
                        <div class="col-sm-6"> <img
                                src="{{ url('/') . '/' . $oneExam[5]['listPartDocumentArray'][1]->url }}"
                                alt="error"> </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[5]['answers'] as $aItem)
                                <div class="mt-1"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>

                        {{-- ------------------------------------------Part 6 ok no test this part--------------------------------------- --}}
                        <h6>Part6</h6>
                        <div class="colsm-12"> <img
                                src="{{ url('/') . '/' . $oneExam[6]['listPartDocumentArray'][1]->url }}"
                                alt="error"> </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[6]['questions'] as $aItem)
                                <div class="mt-4">{{ $loop->iteration }} {{ $aItem->noidung_cauhoi }}</div>
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[6]['answers'] as $aItem)
                                <div class="mt-4"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>
                        {{-- ----------------------------------------------Part 7 ok no test this part------------------------------------------ --}}
                        <h6>Part7</h6>
                        <div class="col-sm-6"> <img
                                src="{{ url('/') . '/' . $oneExam[7]['listPartDocumentArray'][1]->url }}"
                                alt="error"> </div>
                        <div class="col-sm-6 mt-5">
                            @foreach ($oneExam[7]['answers'] as $aItem)
                                <div class="mt-2"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>

                        {{-- ---------------------------------------------Part 8 ok no test this part--------------------------------------------------------------------- --}}
                        <h6>Part8</h6>
                        <div class="col-sm-5"> <img
                                src="{{ url('/') . '/' . $oneExam[8]['listPartDocumentArray'][1]->url }}"
                                alt="error"> </div>
                        <div class="col-sm-7">
                            @foreach ($oneExam[8]['answers'] as $aItem)
                                <div class="mt-5"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>
                        {{-- --------------------------------------------Part 9 OK no test this part----------------------------------------------------------------------- --}}
                        <h6>Part9</h6>
                        <div class="col-sm-5"> <img
                                src="{{ url('/') . '/' . $oneExam[9]['listPartDocumentArray'][1]->url }}"
                                alt="error">
                            <audio controls>
                                <source src="{{ url('/') . '/' . $oneExam[9]['listPartDocumentArray'][0]->url }}"
                                    type="
                                    audio/mpeg">
                            </audio>
                        </div>
                        <div class="col-sm-7">
                            @foreach ($oneExam[9]['questions'] as $aItem)
                                <div class="mt-4">{{ $loop->iteration }} {{ $aItem->noidung_cauhoi }}</div>
                            @endforeach
                        </div>
                        <div class="container">
                            <div class="row">
                                @foreach ($oneExam[9]['document'] as $aItem)
                                    <div class="col-4"> {{ $loop->iteration }} <img
                                            src="{{ url('/') . '/' . $aItem->url }}" alt="error"></div>
                                @endforeach
                            </div>
                        </div>
                        {{-- ----------------------------------------------Part 10----OK no test this part---------------------------------------------------------------- --}}
                        <h6>Part10</h6>
                        <div class="col-sm-12"> <img
                                src="{{ url('/') . '/' . $oneExam[10]['listPartDocumentArray'][1]->url }}"
                                alt="error">
                            <audio controls>
                                <source src="{{ url('/') . '/' . $oneExam[10]['listPartDocumentArray'][0]->url }}"
                                    type="
                                        audio/mpeg">
                            </audio>
                        </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[10]['questions'] as $aItem)
                                <div class="mt-1">{{ $loop->iteration }} {{ $aItem->noidung_cauhoi }}</div>
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[10]['answers'] as $aItem)
                                <div class="mt-1"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>
                        {{-- -----------------------------------------------Part 11---Ok no test this part---------------------------------------- --}}
                        <h6>Part11</h6>
                        <div class="col-sm-12"> <img
                                src="{{ url('/') . '/' . $oneExam[11]['listPartDocumentArray'][1]->url }}"
                                alt="error">
                            <audio controls>
                                <source src="{{ url('/') . '/' . $oneExam[11]['listPartDocumentArray'][0]->url }}"
                                    type="
                                        audio/mpeg">
                            </audio>
                        </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[11]['questions'] as $aItem)
                                <div class="mt-5">{{ $loop->iteration }} {{ $aItem->noidung_cauhoi }}</div>
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[11]['answers'] as $aItem)
                                <div class="mt-1"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>
                        {{-- --------------------------------------------------Part 12 ok no test this part----------------------------------- --}}
                        <h6>Part12</h6>
                        <div class="col-sm-6"> <img
                                src="{{ url('/') . '/' . $oneExam[12]['listPartDocumentArray'][1]->url }}"
                                alt="error">
                            <audio controls>
                                <source src="{{ url('/') . '/' . $oneExam[12]['listPartDocumentArray'][0]->url }}"
                                    type="
                                        audio/mpeg">
                            </audio>
                        </div>
                        <div class="col-sm-6 mt-5">
                            @foreach ($oneExam[12]['answers'] as $aItem)
                                <div class="mt-4"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>
                        {{-- ------------------------------------------------------------------------------------------------------------------ --}}
                        <h6>Part13</h6>
                        <div class="col-sm-6"> <img
                                src="{{ url('/') . '/' . $oneExam[13]['listPartDocumentArray'][1]->url }}"
                                alt="error">
                            <audio controls>
                                <source src="{{ url('/') . '/' . $oneExam[13]['listPartDocumentArray'][0]->url }}"
                                    type="
                                        audio/mpeg">
                            </audio>
                        </div>
                        <div class="col-sm-6">
                            @foreach ($oneExam[13]['answers'] as $aItem)
                                <div class="mt-4"> {{ $loop->iteration }} {{ $aItem->noidung_pa }} </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
