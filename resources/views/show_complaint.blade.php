@extends('layouts.master')

@section('content')

    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-2">
            </div>
            <div class="col">
                <div class="breadcome-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                @if (Auth::check() && Auth::user()->roles)
                                    <div style="margin: 52px"></div>
                                @else
                                    <div style="margin: 62px"></div>
                                @endif

                                <div class="show-1">
                                    <div class="row">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="card mb-3">


                                                    <div class="container text-center mt-3">
                                                        <div class="row">
                                                            <div class="col order-last" style="text-align: end">
                                                                <a href="{{ route('index-mail') }}">Back</a>
                                                            </div>

                                                            <div class="col order-first" style="text-align: left">
                                                                <p style="" class="card-text icon-user">
                                                                    <small class="text-body-secondary"><i
                                                                            class="fa-solid fa-user"></i>
                                                                        Author: {{ $complaint->email }}</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    @if (session('success'))
                                                        <div id="live">
                                                            <div class="check-alert">
                                                                <i class="far fa-check-circle color-alert"></i> &nbsp;
                                                                &nbsp;
                                                                <span>Well Done! {{ session('success') }}</span>
                                                            </div>
                                                        </div>
                                                    @elseif ($errors->any())
                                                        @foreach ($errors->all() as $error)
                                                            <div id="live">
                                                                <div class="alert alert-danger d-flex align-items-center"
                                                                    role="alert">
                                                                    <i class="fa-solid fa-xmark lertx"></i>
                                                                    <div style="color: red; font-weight:bold">
                                                                        {{ $error }}</div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                    <hr>
                                                    @if ($complaint->complaints_image == null)
                                                        <div style="color: blue">No images!</div>
                                                    @else
                                                        <img style="width: auto; height:400px"
                                                            src="{{ $complaint->complaints_image }}"
                                                            class="card-img-top m-3" alt="" id="img-zoom">
                                                        <i class="fa-solid fa-magnifying-glass-plus layout-zoom"
                                                            id="button-zoom"></i>
                                                    @endif
                                                    <hr>



                                                    <table style="width: 100%">
                                                        <tr>
                                                            <td style="width: 50%; text-align:left; padding-left:15px">
                                                                Complaints</td>
                                                            <td style="width: 50%;text-align:left">:
                                                                {{ $complaint->complaints }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 50%; text-align:left; padding-left:15px">
                                                                Status</td>

                                                            @if ($complaint->status == '0')
                                                                <td style="width: 50%;text-align:left">: Unprocessed</td>
                                                            @elseif ($complaint->status == '1')
                                                                <td style="width: 50%;text-align:left">: Data is being
                                                                    transferred</td>
                                                            @elseif ($complaint->status == '2')
                                                                <td style="width: 50%;text-align:left">: Data being worked
                                                                    on</td>
                                                            @elseif ($complaint->status == '3')
                                                                <td style="width: 50%;text-align:left">: The complaint has
                                                                    been resolved</td>
                                                            @endif
                                                        </tr>
                                                    </table>
                                                    <hr>
                                                    <p type="button" class="collapsible"> {{ $jumlahObject }} comments <i
                                                            class="fa-regular fa-comments"></i>
                                                    </p>
                                                    <div class="content">
                                                        @foreach ($data->comments as $comment)
                                                            @if ($comment->roles == 0)
                                                                <div class="container text-center">
                                                                    <div class="row align-items-center">
                                                                        <div class="col mt-1">
                                                                            <div class="m-1" style="text-align: left">
                                                                                <b
                                                                                    style="font-size: 14px">{{ $comment->person }}</b>
                                                                            </div>
                                                                            <div class="chat-guest">
                                                                                {{ $comment->message }}

                                                                            </div>
                                                                            <div class="m-1 time-chat">
                                                                                {{ $comment->created_at }}
                                                                            </div>
                                                                        </div>

                                                                        <div class="col" style="margin-top: 12.5px">
                                                                            <div style="text-align: left">
                                                                                @if (!Auth::check())
                                                                                    <form
                                                                                        action="{{ route('comments-delete', $comment->id) }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                            style="border: none"
                                                                                            class="btn btn-outline-danger btn-sm"><i
                                                                                                class="fa-solid fa-trash"></i></button>
                                                                                    </form>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @elseif ($comment->roles == 1)
                                                                <div class="container text-center">
                                                                    <div class="row align-items-center">
                                                                        <div class="col" style="margin-top: 12.5px">
                                                                            <div style="text-align: right">
                                                                                @if (Auth::check() && Auth::user()->roles == 1)
                                                                                    <form
                                                                                        action="{{ route('comments-delete', $comment->id) }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                            style="border: none"
                                                                                            class="btn btn-outline-danger btn-sm"><i
                                                                                                class="fa-solid fa-trash"></i></button>
                                                                                    </form>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mt-1">
                                                                            <div class="m-1" style="text-align: right">
                                                                                <b style="font-size: 14px">{{ $comment->person }}
                                                                                    | Customer Service</b>
                                                                            </div>
                                                                            <div class="chat-team">
                                                                                {{ $comment->message }}

                                                                            </div>
                                                                            <div class="m-1 time-chat">
                                                                                {{ $comment->created_at }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @elseif ($comment->roles == 2)
                                                                <div class="container text-center">
                                                                    <div class="row align-items-center">
                                                                        <div class="col" style="margin-top: 12.5px">
                                                                            <div style="text-align: right">
                                                                                @if (Auth::check() && Auth::user()->roles == 2)
                                                                                    <form
                                                                                        action="{{ route('comments-delete', $comment->id) }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                            style="border: none"
                                                                                            class="btn btn-outline-danger btn-sm"><i
                                                                                                class="fa-solid fa-trash"></i></button>
                                                                                    </form>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div class="col mt-1">
                                                                            <div class="m-1" style="text-align: right">
                                                                                <b style="font-size: 14px">{{ $comment->person }}
                                                                                    | Team IT</b>
                                                                            </div>
                                                                            <div class="chat-team">
                                                                                {{ $comment->message }}

                                                                            </div>
                                                                            <div class="m-1 time-chat">
                                                                                {{ $comment->created_at }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        <hr>
                                                        <div>
                                                            <form style="display: grid" method="POST"
                                                                action="{{ route('store-comment', $complaint) }}">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input name="message" id="message"
                                                                        placeholder="Add your comments ?"
                                                                        class="form-control-2"
                                                                        aria-label="default input example"
                                                                        style="box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 1px;"
                                                                        required>
                                                                </div>
                                                                @if (!Auth::check())
                                                                    <input type="text" name="person" id="person"
                                                                        value="Guest" hidden>
                                                                    <input type="number" name="roles" id="roles"
                                                                        value="0" hidden>
                                                                @elseif (Auth::check() && Auth::user()->roles == 2)
                                                                    <input type="text" name="person" id="person"
                                                                        value="{{ $data->email }}" hidden>
                                                                    <input type="number" name="roles" id="roles"
                                                                        value="2" hidden>
                                                                @else
                                                                    <input type="text" name="person" id="person"
                                                                        value="{{ $data->email }}" hidden>
                                                                    <input type="number" name="roles" id="roles"
                                                                        value="1" hidden>
                                                                @endif
                                                                <button type="submit" class="primary-1">Send</button>
                                                            </form>
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
            </div>
            <div class="col-2">
            </div>
        </div>








        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                });
            }


            let fullscreen = document.getElementById("img-zoom");
            let button = document.getElementById("button-zoom");

            button.addEventListener("click", () => {
                if (!document.fullscreenElement) {
                    fullscreen?.requestFullscreen();
                } else {
                    document.exitFullscreen();
                }
            });
        </script>

    @endsection
