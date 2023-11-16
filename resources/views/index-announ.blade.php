<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/logos.png') }}">
    <title>Notifications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row" style="background-color: #0b3b8d">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 style="color: white; text-align:center;margin:30px 0px 15px 0px">Notifications</h3>
                    <div class="row">
                        <div class="container-fluid">
                            @if (session('success'))
                                <div id="live">
                                    <div class="check-alert">
                                        <i class="far fa-check-circle color-alert"></i> &nbsp; &nbsp;
                                        <span>Well Done! {{ session('success') }}</span>
                                    </div>
                                </div>
                            @elseif ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div id="live">
                                        <div class="danger-alert">
                                            <i class="far fa-times-circle shine-alert"></i>
                                            &nbsp; &nbsp;
                                            <span>Wrong! {{ $error }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="container text-center">
                                    <div class="row">
                                        <div class="col-2 order-last">
                                        </div>
                                        <div class="col">
                                            @foreach ($announs as $announ)
                                                <div style="margin: 15px 0px;">
                                                    <div class="card text-center">
                                                        <div class="card-header"
                                                            style="text-align: left;font-size: 14px; color:#635f5f; font-family: monospace">
                                                            <i class="fa-solid fa-user"></i>
                                                            {{ $announ->email }}
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="card-title" style="margin-top:13px">
                                                                {{ $announ->title }}</h5>

                                                            @if ($announ->announcement_image == null)
                                                                <div></div>
                                                                <p style="margin:20px 0px; font-size:17px"
                                                                    class="card-text">
                                                                    {{ $announ->description }}</p>
                                                            @else
                                                                <div class="image-container">
                                                                    <div style="margin: 10px 0px">
                                                                        <img src="{{ $announ->announcement_image }}"
                                                                            alt="" class="m-3 zoomable-image"
                                                                            style="width:650px; height:325px; border-radius:5px;">
                                                                    </div>
                                                                    <button class="btn btn-dark btn-sm zoom-button"
                                                                        style="margin-top: -103px; width:650px; font-weight:bold">Fullscreen</button>
                                                                </div>
                                                                <p style="margin: -13px 0px 20px 0px; font-size:17px"
                                                                    class="card-text">
                                                                    {{ $announ->description }}</p>
                                                            @endif

                                                            @if (Auth::check() && Auth::user()->roles == 2)
                                                                <form action="{{ route('delete-announ', $announ) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                                        style="margin-bottom:12px">Delete</button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <div style="font-size: 14px; color:#635f5f; font-family: monospace"
                                                                class="card-footer text-body-secondary">
                                                                {{ $announ->created_at }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr style="border-top: 3px double #8c8b8b;">
                                            @endforeach
                                        </div>
                                        <div class="col-2 order-first">
                                            {{-- Third in DOM, ordered first --}}
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
    <script>
        $(document).ready(function() {
            // Menambahkan event listener pada semua tombol zoom
            $('.zoom-button').on('click', function() {
                const imageContainer = $(this).closest('.image-container');
                const fullscreenImage = imageContainer.find('.zoomable-image')[0];

                if (!document.fullscreenElement) {
                    fullscreenImage.requestFullscreen();
                } else {
                    document.exitFullscreen();
                }
            });
        });
    </script>
</body>

</html>
