@extends('layouts.master')

@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if (!Auth::check())
                        <div style="margin: 10px 0px"></div>
                    @endif
                    <div class="row">
                        <div class="container-fluid">
                            <h4 class="mb-3" style="text-align: center; color:black; margin:25px 0px;">Notifications
                            </h4>
                            @if (!Auth::check())
                                <div id="liveMessage" style="display: none">
                                    <button class="primary-2" onclick="window.dialog.showModal();">Message <i
                                            class="fa-regular fa-message"></i></button>
                                </div>
                            @else
                                <div id="liveMessage">
                                    <button class="primary-2" onclick="window.dialog.showModal();">Message <i
                                            class="fa-regular fa-message"></i></button>
                                </div>
                            @endif
                            <dialog id="dialog">
                                <div class="breadcome-area">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="breadcome-list-modal">

                                                    <div class="row">

                                                        <div class="container-fluid">
                                                            <h5 class="mb-3"
                                                                style="text-align: center; color:black; margin:15px 0px">
                                                                Add Message
                                                            </h5>
                                                            @if (session('success'))
                                                                <div id="live">
                                                                    <div class="check-alert">
                                                                        <i class="far fa-check-circle color-alert"></i>
                                                                        &nbsp; &nbsp;
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
                                                                <form action="{{ route('store-announ') }}" method="post"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <label for="email" style="color: black"
                                                                        class="m-1">Email</label>
                                                                    <input class="form-control mt-2 mb-2" type="text"
                                                                        placeholder="Your email ?"
                                                                        aria-label="default input example" name="email"
                                                                        id="email" required>

                                                                    <label for="title" style="color: black"
                                                                        class="m-1">Title</label>
                                                                    <input class="form-control mt-2 mb-2" type="text"
                                                                        placeholder="Your title / site ?"
                                                                        aria-label="default input example" name="title"
                                                                        id="title" required>

                                                                    <label for="description" style="color: black"
                                                                        class="m-1">Description</label>
                                                                    <div class="form-floating">
                                                                        <textarea name="description" id="description" class="form-control mt-2 mb-2" placeholder="" id="floatingTextarea2"
                                                                            style="height: 100px" required></textarea>
                                                                        <label style="color: gray"
                                                                            for="floatingTextarea2">What's your notice
                                                                            ?</label>
                                                                    </div>


                                                                    <label for="image" style="color: black"
                                                                        class="m-1">Upload Images</label>
                                                                    <input name="image" id="image"
                                                                        class="form-control mt-2 mb-2" type="file"
                                                                        aria-label="default input example">

                                                                    <div class="d-grid gap-2 col-6 mx-auto">
                                                                        <button class="primary-1 mt-4">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button onclick="window.dialog.close();" aria-label="close" class="x">❌</button>
                            </dialog>

                            <div class="loader"></div>
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
                                            {{-- First in DOM, ordered last --}}
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
                                                            <h5 class="card-title" style="margin: 20px 0px;">
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
                                                                        style="margin-top: -103px; width:650px; font-weight:bold">fullscreen</button>
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
                                <div style="margin: 20px 0px"></div>
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
@endsection
