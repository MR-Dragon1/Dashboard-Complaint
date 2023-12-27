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
            <div class="col-md-10 col-lg-8 m-auto">
                <div class="mt-2 mb-4">
                    <div class="title-text mt-4">Incident History</div>
                    <p class="title-desc">Important events will be informed at here</p>
                </div>

                @foreach ($announs as $announ)
                    <div class="card mt-2 mb-2" style="text-align: left">
                        <div class="card-header" style="font-weight: bold">
                            <a href="{{ route('show-announs', $announ->id) }}"
                                class="mt-2 text-a">{{ $announ->title }}</a>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <div style="font-size: 18px" class="mb-1">{{ $announ->description }}</div>
                                <div class="" style="font-size: 13px;">
                                    {{ $announ->created_at }}<cite title="Source Title">-
                                        {{ $announ->email }}</cite></div>
                            </blockquote>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="title-text-2 mt-4 mb-3">- Thank's for your attention -</p>

        </div><!-- end of container -->
    </div><!-- end of pre footer -->

</body>

</html>
