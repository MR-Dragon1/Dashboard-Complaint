<html>

<head>
    <meta charset="utf-8">
    <title>Report Complaint's</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/logos.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laporan.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Balinese&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .notification {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: max-content;
        z-index: 1;
    }

    .notification .close {
        text-align: center;
        color: #007bff;
        font-size: 11px;
        cursor: pointer;
        font-weight: bolder;
    }
</style>

<body class="body">
    <div class="container">
        <div class="centered-element">
            <div class="row menu-nav">
                <div class="col" style="text-align: center">
                    <a href="{{ route('index-laporan') }}">Report Complaint</a>
                </div>
                <div class="col" style="text-align: center">
                    <a href="{{ route('index-status') }}">Check Status</a>
                </div>
                <div class="col" style="text-align: center">
                    <a href="{{ route('index-announs') }}">Announcements</a>
                </div>
            </div>
            <div id="dialog" class="dialog-page">
                <div class="breadcome-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcome-list-modal">
                                    <div class="row">
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

                                        <div class="container-fluid">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col">

                                                    </div>
                                                    <div class="col">
                                                        <h5 class="mb-3"
                                                            style="text-align: center; color:black; margin:15px 0px; font-family: Noto Serif Balinese;">
                                                            Report Complaint's
                                                        </h5>
                                                    </div>
                                                    <div class="col" style="text-align:right">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <form action="{{ route('store-complaint') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <label for="email" style="color: black"
                                                        class="m-1">Email</label>
                                                    <input class="form-control mt-2 mb-2" type="email"
                                                        placeholder="What is your email ?"
                                                        aria-label="default input example" name="email" id="email"
                                                        required>
                                                    <label for="site" style="color: black"
                                                        class="m-1">Site</label>
                                                    <input class="form-control mt-2 mb-2" type="text"
                                                        placeholder="What your site ?"
                                                        aria-label="default input example" name="site" id="site"
                                                        required>
                                                    <label for="complaint" style="color: black"
                                                        class="m-1">Complaints</label>
                                                    <div class="form-floating">
                                                        <textarea name="complaint" id="complaint" class="form-control mt-2 mb-2" placeholder="" id="floatingTextarea2"
                                                            style="height: 70px" required></textarea>
                                                        <label style="color: gray" for="floatingTextarea2">What's your
                                                            complaint ?</label>
                                                    </div>
                                                    <label for="expectation" style="color: black"
                                                        class="m-1">Expectation</label>
                                                    <div class="form-floating">
                                                        <textarea name="expectation" id="expectation" class="form-control mt-2 mb-2" placeholder="" id="floatingTextarea2"
                                                            style="height: 70px" required></textarea>
                                                        <label style="color: gray" for="floatingTextarea2">How do you
                                                            want ?</label>
                                                    </div>
                                                    <label class="m-1" for="image" style="color: black">Upload
                                                        Images</label>
                                                    <input name="image[]" id="image"
                                                        class="form-control mt-2 mb-2" type="file"
                                                        aria-label="default input example" multiple>
                                                    <div class="form-group m-1 mt-3">
                                                        <div style="font-size: 11px; color:blue"><i>Confirm you are a
                                                                real
                                                                human*</i>
                                                        </div>
                                                        <div class="g-recaptcha" data-type="image"
                                                            data-sitekey="6LeHdREpAAAAABrbVmCXcDxyls1Pgj7t1qtT5oPF">
                                                        </div>
                                                    </div>
                                                    @php
                                                        $randomNumber = rand(100, 999);
                                                        $randomString = Str::random(8);
                                                        $combinedRandom = $randomNumber . $randomString;
                                                    @endphp
                                                    <input type="text" id="ticket" name="ticket"
                                                        value="{{ $combinedRandom }}" hidden>
                                                    <div class="d-grid gap-2 col-6 mx-auto">
                                                        <button id="submitBtn" class="primary-1 mt-4">Submit</button>
                                                    </div>
                                                </form>

                                                @if (session('additionalData'))
                                                    <div id="notification" class="notification">
                                                        <div class="box-ticket">
                                                            <div style="text-align: center; font-size:12px">Thank's for
                                                                your
                                                                complaint. Below is your ticket to check the status on
                                                                the
                                                                check
                                                                status page & <span style="color: red">save it</span>!
                                                            </div>
                                                            <div
                                                                style="text-align:center; font-size:20px;color:red; font-weight:bold; margin:3px">
                                                                {{ session('additionalData')['complaint']->ticket }}
                                                            </div>
                                                            <div class="close"onclick="closeNotification()">( Close
                                                                )</div>
                                                        </div>

                                                    </div>
                                                @endif
                                                <p style="text-align: center">Check status your complaint ? <a
                                                        href="{{ route('index-status') }}"> Status</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
