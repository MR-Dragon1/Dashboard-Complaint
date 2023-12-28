<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Report Complaints">
    <meta name="author" content="Roger">
    <title>Announcements</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/logos.png') }}">
    <link rel="stylesheet" href="{{ asset('dorang.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('vendors/jquery/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <!-- bootstrap affix -->
    <script src="{{ asset('vendors/bootstrap/bootstrap.affix.js') }}"></script>

    <!-- Dorang js -->
    <script src="{{ asset('js/dorang.js') }}"></script>
</head>

<body style="font-family: Quicksand" data-spy="scroll" data-target=".navbar" data-offset="40" id="home"
    class="dark-theme">
    <!-- page navbar -->
    <nav class="page-navbar" data-spy="affix" data-offset-top="10">
        <ul class="nav-navbar container">
            <li class="nav-item"><a style="display: block;padding: 0.5rem 1rem;" href="{{ route('index-laporan') }}"
                    class="nav-link">Report Complaint's</a></li>
            <li class="nav-item"><a style="display: block;padding: 0.5rem 1rem;" href="{{ route('index-status') }}"
                    class="nav-link">Check Status</a></li>
            <li class="nav-item"><a style="display: block;padding: 0.5rem 1rem;" href="{{ route('index-announs') }}"
                    class="nav-link">Announcements</a></li>
        </ul>
    </nav><!-- end of page navbar -->

    <div class="theme-selector">
        <a href="javascript:void(0)" class="spinner text-a">
            <i class="ti-paint-bucket"></i>
        </a>
        <div class="body">
            <a href="javascript:void(0)" class="light"></a>
            <a href="javascript:void(0)" class="dark"></a>
        </div>
    </div>

    <div class="contact-section">
        <div class="overlay"></div>
        <!-- container -->
        <div class="container-content mt-4 list-contain">
            <div class="col-md-10 col-lg-10 m-auto">
                <div class="mt-2 mb-4">
                    <div class="title-text mt-4" style="font-size: 23px">Show History</div>
                    <p class="title-desc">The latest from current history</p>
                    <div id="carouselExampleIndicators" class="carousel slide mt-3 mb-3" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($images as $key => $image)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="{{ $key }}" class="{{ $loop->first ? 'active' : '' }}"
                                    aria-current="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $key + 1 }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner" style="border-radius: 10px">
                            @foreach ($images as $key => $image)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    @if ($image->image)
                                        <img src="{{ $image->image }}" class="d-block w-100" alt="gambar">
                                    @else
                                        <div class="d-block w-100 bg-dark text-white">Image not available</div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        @if (count($images) > 1)
                            <!-- Memeriksa apakah ada lebih dari 1 gambar -->
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                    @if ($updates->isEmpty())
                        <p class="text-data">- Nothing latest update -</p>
                    @else
                        @foreach ($updates as $update)
                            <div style="display: flex; width:100%;">
                                <div class="result-1">
                                    {{ $update->status }}
                                </div>
                                <div class="result-2">
                                    {{ $update->message }}
                                    <br>
                                    <div style="color: gray; font-size:13px; text-align:right; margin-top:5px">Posted
                                        at
                                        {{ $update->created_at }} UTC</div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <a href="{{ route('index-announs') }}" class="text-a">back</a>
            </div>
        </div><!-- end of container -->
    </div><!-- end of pre footer -->

</body>

</html>
