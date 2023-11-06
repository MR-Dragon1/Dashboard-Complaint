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
                            <h3 class="mb-3" style="text-align: center; color:black; margin:25px 0px;"><u>Notifications</u>
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
                                                            @else
                                                                <div style="margin: 15px 0px"><img class="m-3"
                                                                        src="{{ $announ->announcement_image }}"
                                                                        alt=""
                                                                        style="width:650px; height:325px; border-radius:5px;">
                                                                </div>
                                                            @endif
                                                            <p style="margin: 20px 0px; font-size:17px" class="card-text">
                                                                {{ $announ->description }}</p>
                                                            @if (Auth::check() && Auth::user()->roles == 2)
                                                                <form action="{{ route('delete-announ', $announ) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm">Delete</button>
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
@endsection
