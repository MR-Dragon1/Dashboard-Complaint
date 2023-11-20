@extends('layouts.master')

@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 37px">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="container-fluid">
                                <h4 class="mb-3" style="text-align: center; color:black; margin:20px 0px">Message Lists
                                </h4>
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
                                                                <div class="row">
                                                                    <form action="{{ route('store-announ') }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <label for="title" style="color: black"
                                                                            class="m-1">Title</label>
                                                                        <input class="form-control mt-2 mb-2" type="text"
                                                                            placeholder="Your title / site ?"
                                                                            aria-label="default input example"
                                                                            name="title" id="title" required>

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
                                                                        <input name="image[]" id="image"
                                                                            class="form-control mt-2 mb-2" type="file"
                                                                            aria-label="default input example" multiple>

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
                                            <tr style="text-align:center">
                                                <td style="text-align: center">No</td>
                                                <td style="text-align: center">Email</td>
                                                <td style="text-align: center">Title/Site</td>
                                                <td style="text-align: center">Description</td>
                                                <td style="text-align: center">Submited Data</td>
                                                <td style="text-align: center">Details</td>
                                                <td style="text-align: center">Delete</td>
                                            </tr>
                                        <tbody>
                                            @foreach ($messages as $message)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $loop->iteration }}</td>
                                                    <td style="vertical-align:middle">{{ $message->email }}</td>
                                                    <td style="vertical-align:middle">{{ $message->title }}</td>
                                                    <td style="vertical-align:middle">
                                                        {{ Illuminate\Support\Str::limit($message->description, 50) }}</td>
                                                    <td style="vertical-align:middle">{{ $message->created_at }}</td>

                                                    <td style="vertical-align: middle">
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal" data-target="#editModal{{ $message->id }}">
                                                            Show
                                                        </button>

                                                        <!-- Modal edit -->
                                                        <div class="modal fade" id="editModal{{ $message->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable modal-xl"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Details
                                                                            Message</h5>

                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div id="carouselExampleControls"
                                                                                        class="carousel slide"
                                                                                        data-ride="carousel">
                                                                                        <div class="carousel-inner"
                                                                                            style="background: none">
                                                                                            @php
                                                                                                $first = true;
                                                                                            @endphp
                                                                                            @foreach ($message->imagesAnnouns as $index => $image)
                                                                                                <div
                                                                                                    class="carousel-item {{ $first ? 'active' : '' }}">
                                                                                                    <img class="card-img-top"
                                                                                                        style="height: 280px; border-radius:7px; margin-bottom: 8px"
                                                                                                        src="{{ $image->image }}"
                                                                                                        alt="Image {{ $index }}">
                                                                                                    {{-- <button data-target="{{  }}"
                                                                                                        class="fullscreen-button btn btn-dark btn-sm screen-button bulletin">Fullscreen</button> --}}
                                                                                                </div>
                                                                                                @php
                                                                                                    $first = false;
                                                                                                @endphp
                                                                                            @endforeach
                                                                                        </div>
                                                                                        @if (count($message->imagesAnnouns) > 1)
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
                                                                                    <div style="text-align: left">
                                                                                        <label for="email"
                                                                                            style="color: black;"
                                                                                            class="m-1">Email</label>
                                                                                    </div>
                                                                                    <input
                                                                                        class="form-control form-control-sm mt-1 mb-1"
                                                                                        type="email"
                                                                                        aria-label="default input example"
                                                                                        value="{{ $message->email }}"
                                                                                        readonly>
                                                                                    <div style="text-align: left">
                                                                                        <label for="site"
                                                                                            style="color: black"
                                                                                            class="m-1">Title/Site</label>
                                                                                    </div>
                                                                                    <input
                                                                                        class="form-control form-control-sm mt-1 mb-1"
                                                                                        type="text"
                                                                                        aria-label="default input example"
                                                                                        value="{{ $message->title }}"
                                                                                        readonly>
                                                                                    <div style="text-align: left">
                                                                                        <label for="site"
                                                                                            style="color: black"
                                                                                            class="m-1">Description</label>
                                                                                    </div>
                                                                                    <div class="form-floating">
                                                                                        <textarea class="form-control form-control-sm mt-1 mb-1" id="floatingTextarea" style="height: 65px;" readonly>{{ $message->description }}</textarea>
                                                                                    </div>

                                                                                    <div style="text-align: left">
                                                                                        <label for="site"
                                                                                            style="color: black"
                                                                                            class="m-1">Submited
                                                                                            at</label>
                                                                                    </div>
                                                                                    <input
                                                                                        class="form-control form-control-sm mt-1 mb-2"
                                                                                        type="text"
                                                                                        aria-label="default input example"
                                                                                        value="{{ $message->created_at }}"
                                                                                        readonly>
                                                                                </div>
                                                                                <div class="col">

                                                                                    @foreach ($message->updatesAnnouns as $key => $update)
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
                                                                                    @endforeach
                                                                                    <hr>


                                                                                    <form
                                                                                        action="{{ route('message.update', $message->id) }}"
                                                                                        method="POST">
                                                                                        @csrf
                                                                                        @method('PUT')

                                                                                        <div style="text-align: left">
                                                                                            <label class="m-1"
                                                                                                for="status">Update
                                                                                                Status
                                                                                            </label>
                                                                                        </div>
                                                                                        <select name="status"
                                                                                            id="status"
                                                                                            class="form-select mt-1 mb-1"
                                                                                            aria-label="Default select example">
                                                                                            <option value="" disabled
                                                                                                selected>
                                                                                                Select your option
                                                                                            </option>
                                                                                            <option value="Investigating">
                                                                                                Investigating
                                                                                            </option>
                                                                                            <option value="Identified">
                                                                                                Identified
                                                                                            </option>
                                                                                            <option value="Monitoring">
                                                                                                Monitoring
                                                                                            </option>
                                                                                            <option value="Update">
                                                                                                Update
                                                                                            </option>
                                                                                            <option value="Resolved">
                                                                                                Resolved
                                                                                            </option>
                                                                                        </select>
                                                                                        <div style="text-align: left">
                                                                                            <label class="m-1"
                                                                                                for="message">Update
                                                                                                Message
                                                                                            </label>
                                                                                        </div>
                                                                                        <input
                                                                                            style="box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 2px;"
                                                                                            class="form-control-2 mt-1 mb-1"
                                                                                            type="text" id="message"
                                                                                            name="message"
                                                                                            aria-label="default input example"
                                                                                            required>
                                                                                </div>
                                                                            </div>
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
                                                    <td style="vertical-align:middle">
                                                        <form action="{{ route('delete-announ', $message) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <button class="primary" onclick="window.dialog.showModal();">Add message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
