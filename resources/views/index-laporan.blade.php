<!doctype html>

<head>
    <meta charset="utf-8">
    <title>Report Complaint's</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/logos.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laporan.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Balinese&display=swap" rel="stylesheet">
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
                    <a href="{{ route('index-laporan') }}">Report Complaint's</a>
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
                                                        <h5 class=""
                                                            style="text-align: center; color:black; margin:10px 0px; font-family: Noto Serif Balinese;">
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
                                                    <div style="margin: 9px 0px">
                                                        <label for="email"
                                                            style="color: black; margin:2px;font-size:14.5px; font-weight:bold"
                                                            class="">Email</label>
                                                        <input class="form-control" type="email"
                                                            placeholder="What's your email ?"
                                                            aria-label="default input example" name="email"
                                                            id="email" required>
                                                    </div>
                                                    <div style="margin: 9px 0px">
                                                        <label for="kode"
                                                            style="color: black; margin:2px;font-size:14.5px; font-weight:bold">Code
                                                            Agent</label>

                                                        <select class="form-select" name="code" id="selectOption"
                                                            aria-label="Default select example"
                                                            onchange="checkOtherOption()">
                                                            <option style="font-size: 13.7px" selected disabled>Code
                                                                your website</option>
                                                            @foreach ($codes as $code)
                                                                <option value="{{ $code->code }}">
                                                                    {{ $code->code }}</option>
                                                            @endforeach
                                                            <option id="new" value="other">Other code</option>
                                                        </select>

                                                        <div id="otherOption"
                                                            style="display: none;margin:5px 0px -10px 0px">
                                                            <i for="otherInput"
                                                                style="color: black; margin:2px;font-size:13px">Input
                                                                code:</i>
                                                            <input type="text" class="form-control-sm m-1"
                                                                id="otherCodeInput">
                                                        </div>



                                                    </div>
                                                    <div style="margin: 9px 0px">
                                                        <label for="name"
                                                            style="color: black; margin:2px;font-size:14.5px; font-weight:bold">Website
                                                            Name</label>
                                                        <input class="form-control" type="name"
                                                            placeholder="Your website name ?"
                                                            aria-label="default input example" name="name"
                                                            id="name" required>
                                                    </div>
                                                    <div style="margin: 9px 0px">
                                                        <label for="site"
                                                            style="color: black; margin:2px;font-size:14.5px; font-weight:bold">Site</label>
                                                        <input class="form-control" type="text"
                                                            placeholder="Site name ?"
                                                            aria-label="default input example" name="site"
                                                            id="site" required>
                                                    </div>
                                                    <div style="margin: 9px 0px">
                                                        <label for="complaint"
                                                            style="color: black; margin:2px;font-size:14.5px; font-weight:bold">Complaint</label>
                                                        <textarea name="complaint" id="complaint" class="form-control" placeholder="What's your complaint ?"
                                                            id="floatingTextarea2" required></textarea>
                                                    </div>
                                                    <div style="margin: 9px 0px">
                                                        <label for="expectation"
                                                            style="color: black; margin:2px;font-size:14.5px; font-weight:bold">Expectation</label>
                                                        <textarea name="expectation" id="expectation" class="form-control" placeholder="How do you want ?"
                                                            id="floatingTextarea2" required></textarea>
                                                    </div>
                                                    <div style="margin: 9px 0px">
                                                        <label for="image"
                                                            style="color: black; margin:2px;font-size:14.5px; font-weight:bold">Upload
                                                            Images</label>
                                                        <input name="image[]" id="image"
                                                            class="form-control mt-1 mb-1" type="file"
                                                            aria-label="default input example" multiple>
                                                    </div>
                                                    <div class="form-group m-1 mt-3">
                                                        <div style="font-size: 11px; color:blue"><i>Confirm you are a
                                                                real
                                                                human*</i>
                                                        </div>
                                                        <div class="g-recaptcha" data-type="image"
                                                            data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}">
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
                                                        <button id="submitBtn"
                                                            class="primary-1 mt-3 mb-2">Submit</button>
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
                                                                style="text-align:center; font-size:20px;color:red; font-weight:bold; margin:5px 0px">
                                                                {{ session('additionalData')['complaint']->ticket }}
                                                            </div>
                                                            <div class="close"onclick="closeNotification()">( Close
                                                                )</div>
                                                        </div>

                                                    </div>
                                                @endif
                                                <p style="text-align: center;">Check status your
                                                    complaint ? <a href="{{ route('index-status') }}"> Status</a></p>
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
    <script>
        function checkOtherOption() {
            var selectBox = document.getElementById("selectOption");
            var otherCodeInput = document.getElementById("otherOption");

            if (selectBox.value === "other") {
                otherCodeInput.style.display = "block";
                otherCodeInput.value = ""; // reset the input value
            } else {
                otherCodeInput.style.display = "none";
            }
        }

        document.getElementById("otherCodeInput").addEventListener("input", function() {
            var otherOption = document.getElementById("new");
            otherOption.value = this.value;
        });
    </script>
</body>

</html>
