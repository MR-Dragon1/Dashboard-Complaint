<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/logos.png') }}">
    <title>Announcement's</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Balinese&display=swap" rel="stylesheet">
    {{-- bundle bootstrap 4.6.2 --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</head>

<body style="background-color: #204ecf">
    <div class="breadcome-area">
        <div class="container-fluid" style="background-color: #204ecf">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container-fluid">
                        <div class="row" style="justify-content: center">
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
                                <div class="container text-center" style="width: 922px">
                                    <div class="row menu-nav-announ" style="margin: 19px 0px;">
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
                                    <h4
                                        style="margin: 38px 0px 28px 0px; font-family:Noto Serif Balinese; color:white; font-size:23px">
                                        Incident History</h4>

                                    <hr class="style2">

                                    <div class="container overflow-hidden text-center">
                                        <div class="row">

                                            @foreach ($announs as $announ)
                                                <div class="row g-0 position-relative"
                                                    style="background-color:white;box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;margin:10px 0px; border-radius:8px;">
                                                    <div class="col-md-6 mb-md-1 p-md-4">
                                                        @if ($announ->imagesAnnouns->isEmpty())
                                                            <div class="slide-new">
                                                                <img style="height:260px; border-radius:5px"
                                                                    class="card-img-top" src="img/no_image.jpg"
                                                                    alt="" id="img-zoom">
                                                            </div>
                                                            <div class="row"
                                                                style="margin: 6px 0px -16px 0px; font-family:monospace;font-size:13px; color:gray; font-weight:bold">
                                                                <div class="col" style="text-align:left">
                                                                    {{ $announ->email }}</div>
                                                                <div class="col" style="text-align:end">
                                                                    {{ $announ->created_at }}</div>
                                                            </div>
                                                        @else
                                                            <div class="slide-new">
                                                                <img class="card-img-top"
                                                                    style="height: auto;width:auto; border-radius: 5px"
                                                                    src="{{ $announ->imagesAnnouns->first()->image }}"
                                                                    alt="Image 1">
                                                                {{-- Tombol atau elemen lainnya yang ingin Anda tambahkan --}}
                                                            </div>
                                                            <div class="row"
                                                                style="margin: 6px 0px -16px 0px; font-family:monospace;font-size:13px;color:gray; font-weight:bold">
                                                                <div class="col" style="text-align:left">
                                                                    {{ $announ->email }}</div>
                                                                <div class="col" style="text-align:end">
                                                                    {{ $announ->created_at }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 p-4 ps-md-0">
                                                        <h5
                                                            style="font-weight: bold; color:#175fe7; font-size:19px; margin:5px 0px">
                                                            {{ $announ->title }}</h5>
                                                        <hr>
                                                        <div style="font-size: 16px">{{ $announ->description }}</div>
                                                        <button type="button" class="btn btn-primary btn-sm mt-3"
                                                            data-toggle="modal" style="font-weight:bold"
                                                            data-target="#editModal{{ $announ->id }}">
                                                            Details
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

                                                                                    <div id="carouselExampleControls"
                                                                                        class="carousel slide"
                                                                                        data-ride="carousel">
                                                                                        <div class="carousel-inner"
                                                                                            style="background: none">
                                                                                            @php
                                                                                                $first = true;
                                                                                            @endphp
                                                                                            @foreach ($announ->imagesAnnouns as $index => $image)
                                                                                                <div
                                                                                                    class="carousel-item {{ $first ? 'active' : '' }}">
                                                                                                    <img class="card-img-top"
                                                                                                        style="height: auto;width:auto; border-radius:8px;margin-bottom:5px"
                                                                                                        src="{{ $image->image }}"
                                                                                                        alt="Image {{ $index }}">
                                                                                                </div>
                                                                                                @php
                                                                                                    $first = false;
                                                                                                @endphp
                                                                                            @endforeach
                                                                                        </div>
                                                                                        @if (count($announ->imagesAnnouns) > 1)
                                                                                            <button
                                                                                                class="carousel-control-prev"
                                                                                                type="button"
                                                                                                data-target="#carouselExampleControls"
                                                                                                data-slide="prev">
                                                                                                <span
                                                                                                    class="carousel-control-prev-icon"
                                                                                                    aria-hidden="true"></span>
                                                                                                <span
                                                                                                    class="sr-only">Previous</span>
                                                                                            </button>
                                                                                            <button
                                                                                                class="carousel-control-next"
                                                                                                type="button"
                                                                                                data-target="#carouselExampleControls"
                                                                                                data-slide="next">
                                                                                                <span
                                                                                                    class="carousel-control-next-icon"
                                                                                                    aria-hidden="true"></span>
                                                                                                <span
                                                                                                    class="sr-only">Next</span>
                                                                                            </button>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="card">
                                                                                        <div class="card-header"
                                                                                            id="heading{{ $key }}"
                                                                                            style="text-align: left">
                                                                                            <h5 class="mb-0">
                                                                                                <button
                                                                                                    style="font-weight: bold; text-decoration:none"
                                                                                                    class="btn btn-link"
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
</body>

</html>
