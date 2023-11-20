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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- bundle bootstrap 4.6.2 --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-fluid">
                        <div class="row">
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
                                    <h3 style="margin: 35px 0px 35px 0px">Incident History</h3>
                                    <hr>
                                    <div class="container overflow-hidden text-center">
                                        <div class="row ">

                                            @foreach ($announs as $announ)
                                                <div class="col-4 mb-4">
                                                    <div class="card h-100">
                                                        @if ($announ->imagesAnnouns->isEmpty())
                                                            <div class="slide-new">
                                                                <img style="height:230px" class="card-img-top"
                                                                    src="img/no_image.jpg" alt=""
                                                                    id="img-zoom">
                                                            </div>
                                                        @else
                                                            <div class="carousel-new">
                                                                <div class="slides-new">
                                                                    <div class="slide-new">
                                                                        <img style="height:230px; border-radius:7px"
                                                                            class="card-img-top"
                                                                            src="{{ $announ->imagesAnnouns->first()->image }}"
                                                                            alt="" id="img-zoom">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="card-body">
                                                            <button type="button" class="btn btn-outline-primary mb-2"
                                                                data-toggle="modal"
                                                                style="border: none; font-weight:bold"
                                                                data-target="#editModal{{ $announ->id }}">
                                                                {{ $announ->title }}
                                                            </button>
                                                            <div class="modal fade" id="editModal{{ $announ->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                Update History</h5>

                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="container-fluid">

                                                                                @foreach ($announ->updatesAnnouns as $key => $update)
                                                                                    <div class="accordion"
                                                                                        id="accordionExample">
                                                                                        <div class="card">
                                                                                            <div class="card-header"
                                                                                                id="heading{{ $key }}"
                                                                                                style="text-align: left">
                                                                                                <h5 class="mb-0">
                                                                                                    <button
                                                                                                        style="font-weight: bold; text-decoration:none"
                                                                                                        class="btn btn-link btn-sm"
                                                                                                        type="button"
                                                                                                        data-toggle="collapse"
                                                                                                        data-target="#collapse{{ $key }}"
                                                                                                        aria-expanded="true"
                                                                                                        aria-controls="collapse{{ $key }}">
                                                                                                        {{ $update->status }}
                                                                                                    </button>
                                                                                                </h5>
                                                                                            </div>
                                                                                            <div id="collapse{{ $key }}"
                                                                                                class="collapse"
                                                                                                aria-labelledby="heading{{ $key }}"
                                                                                                data-parent="#accordionExample">
                                                                                                <div class="card-body"
                                                                                                    style="text-align: justify">
                                                                                                    {{ $update->message }}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                            <hr>
                                                                            <div style=text-align:end>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-dismiss="modal">Close</button>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="card-text" style="text-align: justify;">
                                                                {{ $announ->description }}</p>

                                                            <p style="text-align:end" class="card-text"><small
                                                                    class="text-body-secondary">{{ $announ->email }}
                                                                    <br>{{ $announ->created_at }}</small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper" id="icon-menu">
            <input type="checkbox" />
            <div class="fab"></div>
            <div class="fac">
                <a href="{{ route('index-announs') }}"><i class="fa-solid fa-bell"></i></a>
                <a href="{{ route('index-status') }}"><i class="fa-solid fa-inbox"></i></a>
                <a href="{{ route('index-laporan') }}"><i class="fa-solid fa-envelope-open-text"></i></a>
            </div>
        </div>
</body>

</html>
