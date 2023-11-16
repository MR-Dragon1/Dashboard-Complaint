@extends('layouts.master')

@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 37px">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="container-fluid">
                                <h4 class="mb-3" style="text-align: center; color:black; margin:20px 0px">Complaint Lists
                                    IT
                                </h4>
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
                                                                    Add Complaint
                                                                </h5>
                                                                <div class="row">
                                                                    <form action="{{ route('store-complaint') }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <label for="complaint" style="color: black"
                                                                            class="m-1">Complaints</label>

                                                                        <div class="form-floating">
                                                                            <textarea name="complaint" id="complaint" class="form-control mt-2 mb-2" placeholder="" id="floatingTextarea2"
                                                                                style="height: 100px" required></textarea>
                                                                            <label style="color: gray"
                                                                                for="floatingTextarea2">What's your
                                                                                complaint ?</label>
                                                                        </div>
                                                                        <label for="email" style="color: black"
                                                                            class="m-1">Email</label>
                                                                        <input class="form-control mt-2 mb-2" type="email"
                                                                            placeholder="What is your email ?"
                                                                            aria-label="default input example"
                                                                            name="email" id="email" required>
                                                                        <label class="m-1" for="image"
                                                                            style="color: black">Upload
                                                                            Images</label>
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
                                <div class="row">
                                    <table id="records" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td style="text-align: center">No</td>
                                                <td style="text-align: center">Email</td>
                                                <td style="text-align: center">Site</td>
                                                <td style="text-align: center">Complaint</td>
                                                <td style="text-align: center">Status</td>
                                                <td style="text-align: center">Submited Data</td>
                                                <td style="text-align: center">Updated Data</td>
                                                <td style="text-align: center">Actions</td>
                                            </tr>
                                            @php
                                                $i = 1;
                                            @endphp
                                        <tbody>
                                            @foreach ($complaints as $complaint)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $complaint->id }}</td>
                                                    <td style="vertical-align:middle; text-align:left">
                                                        {{ $complaint->email }}</td>
                                                    <td style="vertical-align:middle;text-align:left">
                                                        {{ $complaint->site }}</td>
                                                    <td style="vertical-align:middle; text-align:left">
                                                        {{ Illuminate\Support\Str::limit($complaint->complaints, 40) }}</td>

                                                    @if ($complaint->status == '0')
                                                        <td style="vertical-align:middle">
                                                            <div class="red-button-1">
                                                                Unprocessed
                                                            </div>
                                                        </td>
                                                    @elseif ($complaint->status == '1')
                                                        <td style="vertical-align:middle">
                                                            <div class="blue-button-1">
                                                                Data Transferred
                                                            </div>
                                                        </td>
                                                    @elseif ($complaint->status == '2')
                                                        <td style="vertical-align:middle">
                                                            <div class="yellow-button-1">
                                                                On Going
                                                            </div>
                                                        </td>
                                                    @elseif ($complaint->status == '3')
                                                        <td style="vertical-align:middle">
                                                            <div class="green-button-1">
                                                                Completed
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td style="vertical-align:middle; text-align:center">
                                                        {{ $complaint->created_at }}</td>
                                                    <td style="vertical-align:middle; text-align:center">
                                                        {{ $complaint->updated_at }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#editModal{{ $complaint->id }}">
                                                            Details
                                                        </button>

                                                        <!-- Modal edit -->
                                                        <div class="modal fade" id="editModal{{ $complaint->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Edit
                                                                            Complaint</h5>

                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @if ($complaint->complaints_image == null)
                                                                            <div style="color: blue">No images!</div>
                                                                        @else
                                                                            <img style="width: auto; height:360px"
                                                                                src="{{ $complaint->complaints_image }}"
                                                                                class="card-img-top m-3" alt=""
                                                                                id="img-zoom">
                                                                            <i class="fa-solid fa-magnifying-glass-plus layout-zoom"
                                                                                id="button-zoom"></i>
                                                                        @endif
                                                                        <div style="text-align: left">
                                                                            <label for="email" style="color: black;"
                                                                                class="m-1">Email</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="email"
                                                                            aria-label="default input example"
                                                                            value="{{ $complaint->email }}" readonly>
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Complaint</label>
                                                                        </div>
                                                                        <div class="form-floating">
                                                                            <textarea class="form-control form-control-sm mt-1 mb-1" id="floatingTextarea" style="height: 65px;" readonly>{{ $complaint->complaints }}</textarea>
                                                                        </div>
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Site</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="text"
                                                                            aria-label="default input example"
                                                                            value="{{ $complaint->site }}" readonly>
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Submited at</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="text"
                                                                            aria-label="default input example"
                                                                            value="{{ $complaint->created_at }}" readonly>
                                                                        <div style="text-align: left">
                                                                            <label for="email" style="color: black"
                                                                                class="m-1">Status</label>
                                                                        </div>

                                                                        @if ($complaint->status == '0')
                                                                            <input
                                                                                class="form-control form-control-sm mt-1 mb-1"
                                                                                type="text"
                                                                                aria-label="default input example"
                                                                                value="Unprocessed" readonly>
                                                                        @elseif ($complaint->status == '1')
                                                                            <input
                                                                                class="form-control form-control-sm mt-1 mb-1"
                                                                                type="text"
                                                                                aria-label="default input example"
                                                                                value="Data is being transferred" readonly>
                                                                        @elseif ($complaint->status == '2')
                                                                            <input
                                                                                class="form-control form-control-sm mt-1 mb-1"
                                                                                type="text"
                                                                                aria-label="default input example"
                                                                                value="Data being worked on" readonly>
                                                                        @elseif ($complaint->status == '3')
                                                                            <input
                                                                                class="form-control form-control-sm mt-1 mb-1"
                                                                                type="text"
                                                                                aria-label="default input example"
                                                                                value="The complaint has been resolved"
                                                                                readonly>
                                                                        @endif

                                                                        <form
                                                                            action="{{ route('complaint.update', $complaint->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('PUT')

                                                                            <div style="text-align: left">
                                                                                <label class="m-1 mt-1 mb-1"
                                                                                    for="status">Edit
                                                                                    Status
                                                                                    Complaint</label>
                                                                            </div>
                                                                            <select name="status" id="status"
                                                                                class="form-select mt-1 mb-1"
                                                                                aria-label="Default select example">
                                                                                <option value="" disabled selected>
                                                                                    Select your option
                                                                                </option>
                                                                                <option value="0">
                                                                                    Unprocessed
                                                                                </option>
                                                                                <option value="2">
                                                                                    On Going
                                                                                </option>
                                                                                <option value="3">
                                                                                    Completed
                                                                                </option>
                                                                            </select>
                                                                            <br>
                                                                            <div class="content-comment">
                                                                                @foreach ($complaint->comments as $comment)
                                                                                    @if ($comment->roles == 1 && $comment->message != null)
                                                                                        <div class="container text-center">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col"
                                                                                                    style="margin-top: 12.5px">
                                                                                                    <div>
                                                                                                        <div class="m-1"
                                                                                                            style="text-align:left">
                                                                                                            <b
                                                                                                                style="font-size: 14px">{{ $comment->person }}
                                                                                                                |
                                                                                                                Customer
                                                                                                                Service</b>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="chat-guest">
                                                                                                            {{ $comment->message }}

                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="m-1 time-chat">
                                                                                                            {{ $comment->created_at }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col mt-1">

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @elseif($comment->roles == 2 && $comment->message != null)
                                                                                        <div class="container text-center">
                                                                                            <div
                                                                                                class="row align-items-center">
                                                                                                <div class="col"
                                                                                                    style="margin-top: 12.5px">
                                                                                                    <div
                                                                                                        style="text-align: right">

                                                                                                        {{-- @if (Auth::check() && Auth::user()->roles == 2)
                                                                                                        <form
                                                                                                            action="{{ route('comments-delete', $comment->id) }}"
                                                                                                            method="POST">
                                                                                                            @csrf
                                                                                                            @method('DELETE')
                                                                                                            <button
                                                                                                                type="submit"
                                                                                                                style="border: none"
                                                                                                                class="btn btn-outline-danger btn-sm"><i
                                                                                                                    class="fa-solid fa-trash"></i></button>
                                                                                                        </form>
                                                                                                    @endif --}}
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col mt-1">
                                                                                                    <div class="m-1"
                                                                                                        style="text-align: right">
                                                                                                        <b
                                                                                                            style="font-size: 14px">{{ $comment->person }}
                                                                                                            | Team
                                                                                                            IT</b>
                                                                                                    </div>
                                                                                                    <div class="chat-team">
                                                                                                        {{ $comment->message }}

                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="m-1 time-chat-2">
                                                                                                        {{ $comment->created_at }}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                            <hr>
                                                                            <div class="form-group">
                                                                                <div class="form-group">
                                                                                    <input name="message" id="message"
                                                                                        placeholder="Add your comments ?"
                                                                                        class="form-control-2"
                                                                                        aria-label="default input example"
                                                                                        style="box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 2px;">
                                                                                </div>
                                                                                @if (Auth::check() && Auth::user()->roles == 2)
                                                                                    <input type="number" name="roles"
                                                                                        id="roles" value="2"
                                                                                        hidden>
                                                                                @else
                                                                                    <input type="number" name="roles"
                                                                                        id="roles" value="1"
                                                                                        hidden>
                                                                                @endif
                                                                            </div>
                                                                            <hr>
                                                                            <div style=text-align:end>
                                                                                <button type="button"
                                                                                    class="btn btn-outline-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Save
                                                                                    changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <button class="primary" onclick="window.dialog.showModal();">Add Complaint</button>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 30px 0px"></div>
        </div>
    </div>


    <script>
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
