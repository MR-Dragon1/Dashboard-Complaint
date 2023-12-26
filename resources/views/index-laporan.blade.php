<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Report Complaints">
    <meta name="author" content="Roger">
    <title>Report Complaint's</title>
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
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
                    class="nav-link">Report Complaint's</a>
            </li>
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
                    <div class="title-text mt-4">Report Complaint's</div>
                    <p class="title-desc">Explain your complaint at here</p>
                </div>
                <form action="{{ route('store-complaint') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="text-align: left;">
                        <label for="email" class="title-text-1">Email <i class="text-danger">*</i></label>
                        <input name="email" id="email" type="email" size="50" autocapitalize="on"
                            class="form-control-input" autocomplete="off" placeholder="What's your email" required>
                    </div>

                    <div style="text-align: left;">
                        <label for="code" class="title-text-1">Code Agent <i class="text-danger">*</i></label>
                        <input style="text-transform:uppercase" type="text" id="code" name="code"
                            autocomplete="off" class="form-control-input code-input" placeholder="Code website"
                            required>
                    </div>

                    <div style="text-align: left;">
                        <label for="name" class="title-text-1">Website Name <i class="text-danger">*</i></label>
                        <input type="text" name="name" id="name" autocomplete="off"
                            class="form-control-input" placeholder="Your website name" required>
                    </div>

                    <div style="text-align: left;">
                        <label for="site" class="title-text-1">Site <i class="text-danger">*</i></label>
                        <input type="text" name="site" id="site" autocomplete="off"
                            class="form-control-input" placeholder="Site Name" required>
                    </div>

                    <div style="text-align: left;">
                        <label for="complaint" class="title-text-1">Complaint <i class="text-danger">*</i></label>
                        <textarea name="complaint" id="complaint" autocomplete="off" rows="4" class="form-control-input"
                            placeholder="What's your complaint ?" required></textarea>
                    </div>

                    <div style="text-align: left;">
                        <label for="expectation" class="title-text-1">Expectation <i
                                class="text-danger">*</i></label>
                        <textarea name="expectation" id="expectation" autocomplete="off" rows="4" class="form-control-input"
                            placeholder="How do you want ?" required></textarea>
                    </div>


                    <div style="text-align: left;">
                        <label for="image" class="title-text-1">Upload Images</label>
                        {{-- <input name="image[]" id="image" class="form-control-input" type="file"
                                aria-label="default input example" multiple> --}}
                    </div>

                    <div class="card-line mb-3">
                        <div class="top-line">
                            <p>Drag & drop image uploading</p>
                        </div>
                        <div class="drag-area" id="drag-area">
                            <span class="visible">
                                Drag & drop image here or
                                <span class="select" role="button">Browse</span>
                            </span>
                            <span class="on-drop">Drop images here</span>
                            <input name="image[]" id="image" type="file" class="file" multiple>
                        </div>

                        <!-- IMAGE PREVIEW CONTAINER -->
                        <div class="containerline mt-2"></div>
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
                    @php
                        $randomNumber = rand(100, 999);
                        $randomString = Str::random(8);
                        $combinedRandom = $randomNumber . $randomString;
                    @endphp
                    <input type="text" id="ticket" name="ticket" value="{{ $combinedRandom }}" hidden>

                    <div style="text-align: -webkit-center;" class="mb-3 mt-5">
                        <button id="submitBtn" type="submit" class="Btn title-text-bt"></button>
                    </div>
                </form>
                @if (session('additionalData'))
                    <div id="notification" class="notification">
                        <div class="box-ticket">
                            <div style="font-family: Quicksand">Thank's for
                                your
                                complaint. Below is your ticket to check the status your complaint on
                                the
                                check
                                status page & <span style="color: red">save it</span>!
                            </div>
                            <div class="content-box">
                                "{{ session('additionalData')['complaint']->ticket }}"
                            </div>
                            <div class="close"onclick="closeNotification()">&times;</div>
                        </div>

                    </div>
                @endif
                <p class="title-text-2 mb-3">Check status your complaint ? <a class="text-a"
                        href="{{ route('index-status') }}">Status</a></p>
            </div>
        </div><!-- end of container -->
    </div><!-- end of pre footer -->

    <!-- core  -->

    <script src="{{ asset('upload.js') }}"></script>
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
    <!-- Di dalam file blade atau HTML Anda -->
    <script>
        // Fungsi untuk menutup pemberitahuan
        function closeNotification() {
            var notification = document.getElementById('notification');
            notification.style.display = 'none';
        }

        // Tampilkan pemberitahuan saat halaman dimuat
        window.onload = function() {
            var notification = document.getElementById('notification');
            if (notification) {
                notification.style.display = 'block';
            }
        }
    </script>
</body>

</html>
