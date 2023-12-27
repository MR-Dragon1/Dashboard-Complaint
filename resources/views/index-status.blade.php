<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Report Complaints">
    <meta name="author" content="Roger">
    <title>Check Status</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('vendors/jquery/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <!-- bootstrap affix -->
    <script src="{{ asset('vendors/bootstrap/bootstrap.affix.js') }}"></script>

    <!-- Dorang js -->
    <script src="{{ asset('js/dorang.js') }}"></script>
</head>

<body style="font-family: Quicksand" data-spy="scroll" data-target=".navbar" data-offset="40" id="home"
    class="dark-theme">
    @if (session('success'))
        <div id="lives">
            <div class="check-alert">
                <i class="far fa-check-circle color-alert"></i> &nbsp; &nbsp;
                <span>Well Done! {{ session('success') }}</span>
            </div>
        </div>
    @elseif ($errors->any())
        @foreach ($errors->all() as $error)
            <div id="lives">
                <div class="danger-alert">
                    <i class="far fa-times-circle shine-alert"></i>
                    &nbsp; &nbsp;
                    <span>Wrong! {{ $error }}</span>
                </div>
            </div>
        @endforeach
    @elseif(session('success-spam'))
        <div id="lives">
            <div class="danger-alert">
                <i class="far fa-times-circle shine-alert"></i> &nbsp; &nbsp;
                <span>Sorry! {{ session('success-spam') }}</span>
            </div>
        </div>
    @endif
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
                    <div class="title-text mt-4">Check Status</div>
                    <p class="title-desc">Check the status of your complaint</p>
                </div>
                @if (!isset($data))
                    <form action="{{ route('search') }}" method="GET">
                        <div style="text-align: left;">
                            <label for="ticket" class="title-text-1">ID Ticket <i class="text-danger">*</i></label>
                            <input type="text" name="q" size="50" class="form-control-input"
                                placeholder="Your ticket" required>
                        </div>
                        <div style="text-align: left;">
                            <div class="confirm"><i>Confirm you
                                    are a
                                    real
                                    human<i class="text-danger">*</i></i>
                            </div>
                            <div class="g-recaptcha" data-type="image" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}">
                            </div>
                        </div>
                        <div style="text-align: -webkit-center;" class="mb-3 mt-5">
                            <button type="submit" class="Btn title-text-bt"></button>
                        </div>
                    </form>
                    <p class="title-text-2 mb-3">Want to submit a complaint ?<a href="{{ route('index-laporan') }}"
                            class="text-a"> Report complaint</a>
                    </p>
                @endif
                @if (isset($query))
                    <p class="text-result">ID Ticket: <b style="letter-spacing: 2px">{{ $query }}</b></p>
                @endif
                <div>
                    @if (isset($data))
                        @if ($data->isEmpty())
                            <p class="text-data">- Data not found -</p>
                            <a href="{{ route('index-status') }}" class="text-a">back</a>
                        @else
                            @foreach ($data as $item)
                                <table class="table table-striped table-bordered"
                                    style="font-family: system-ui; font-size:15px; text-align:left">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $item->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>ID Ticket</th>
                                            <td>{{ $item->ticket }}</td>
                                        </tr>
                                        <tr>
                                            <th>Code Agent</th>
                                            <td>{{ $item->code }}</td>
                                        </tr>
                                        <tr>
                                            <th>Website Name</th>
                                            <td>{{ $item->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Site</th>
                                            <td>{{ $item->site }}</td>
                                        </tr>
                                        <tr>
                                            <th>Complaint</th>
                                            <td>{{ $item->complaints }}</td>
                                        </tr>
                                        <tr>
                                            <th>Expectation</th>
                                            <td>{{ $item->expectation }}</td>
                                        </tr>

                                        <tr>
                                            <th>Status</th>
                                            @if ($item->status == '0')
                                                <td>Unprocessed</td>
                                            @elseif ($item->status == '1')
                                                <td>Data is being transferred</td>
                                            @elseif ($item->status == '2')
                                                <td>Data being worked on</td>
                                            @elseif ($item->status == '3')
                                                <td>The complaint has been resolved</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Created_at</th>
                                            <td>{{ $item->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated_at</th>
                                            <td>{{ $item->updated_at }}</td>
                                        </tr>
                                    </thead>
                                </table>
                            @endforeach
                            <a href="{{ route('index-status') }}" class="text-a">back</a>
                        @endif
                    @endif
                </div>
            </div>
        </div><!-- end of container -->
    </div><!-- end of pre footer -->
    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>
