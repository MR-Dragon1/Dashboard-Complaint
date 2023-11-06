@extends('layouts.master')

@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">

                        <div class="row">

                            <div class="container-fluid">
                                <h3 class="mb-3" style="text-align: center; color:black; margin:20px 0px">Add
                                    Notifications
                                </h3>
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
                                    <form action="{{ route('store-announ') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="email" style="color: black" class="m-1">Email</label>
                                        <input class="form-control mt-2 mb-2" type="text" placeholder="Your email ?"
                                            aria-label="default input example" name="email" id="email" required>

                                        <label for="title" style="color: black" class="m-1">Title</label>
                                        <input class="form-control mt-2 mb-2" type="text"
                                            placeholder="Your title / site ?" aria-label="default input example"
                                            name="title" id="title" required>

                                        <label for="description" style="color: black" class="m-1">Description</label>
                                        <div class="form-floating">
                                            <textarea name="description" id="description" class="form-control mt-2 mb-2" placeholder="" id="floatingTextarea2"
                                                style="height: 100px" required></textarea>
                                            <label style="color: gray" for="floatingTextarea2">What's your notice ?</label>
                                        </div>


                                        <label for="image" style="color: black" class="m-1">Upload Images</label>
                                        <input name="image" id="image" class="form-control mt-2 mb-2" type="file"
                                            aria-label="default input example">




                                        <div class="d-grid gap-2 col-3 mx-auto">
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
@endsection
