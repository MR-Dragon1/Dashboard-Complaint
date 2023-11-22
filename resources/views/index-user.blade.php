@extends('layouts.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 55px">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="container-fluid">
                                <h4 class="mb-3" style="text-align: center; color:black; margin:20px 0px">User Lists
                                </h4>
                                {{-- <div class="loader"></div> --}}
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
                                                                    style="text-align: center; color:black; margin:11px 0px">
                                                                    Add User
                                                                </h5>
                                                                <div class="row">
                                                                    <form action="{{ route('store-user') }}" method="post">
                                                                        @csrf
                                                                        <label for="name" style="color: black;"
                                                                            class="m-1">Name
                                                                        </label>
                                                                        <input style="" class="form-control mt-2 mb-2"
                                                                            type="text" placeholder="Whats your name ?"
                                                                            aria-label="default input example"
                                                                            name="name" id="name" required>

                                                                        <label for="email" style="color: black;"
                                                                            class="m-1">Email
                                                                        </label>
                                                                        <input style="" class="form-control mt-2 mb-2"
                                                                            type="text" placeholder="Whats your email ?"
                                                                            aria-label="default input example"
                                                                            name="email" id="email" required>
                                                                        <label for="password" style="color: black;"
                                                                            class="m-1">Password
                                                                        </label>
                                                                        <input style="" class="form-control mt-2 mb-2"
                                                                            type="password" placeholder="Min. 8 Character"
                                                                            aria-label="default input example"
                                                                            name="password" id="password" required>
                                                                        <div style="margin: 16px 0px 9px 0px">
                                                                            <label for="roles" style="color: black;"
                                                                                class="m-1">IP Address
                                                                            </label>
                                                                            <input class="form-control" type="text"
                                                                                placeholder=""
                                                                                aria-label="default input example"
                                                                                name="ip[]" id="input"
                                                                                data-role="tagsinput" required>
                                                                        </div>
                                                                        <label for="roles" style="color: black;"
                                                                            class="m-1">Roles
                                                                        </label>
                                                                        <div class="container text-center">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-check m-1"
                                                                                        style="text-align: left">
                                                                                        <input
                                                                                            class="form-check-input mt-2 mb-2"
                                                                                            type="radio" name="roles"
                                                                                            id="roles" value="2">
                                                                                        <label class="form-check-label m-1"
                                                                                            for="roles">
                                                                                            Team IT
                                                                                        </label>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-check m-1"
                                                                                        style="text-align: left">
                                                                                        <input
                                                                                            class="form-check-input mt-2 mb-2"
                                                                                            type="radio" name="roles"
                                                                                            id="roles" value="1">
                                                                                        <label class="form-check-label m-1"
                                                                                            for="roles">
                                                                                            Customer Service
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                    <table id="records" class="table table-striped" style="font-size: 15px">
                                        <thead class="table-dark">
                                            <tr style="text-align:center">
                                                <td style="text-align: center">No</td>
                                                <td style="text-align: center">Name</td>
                                                <td style="text-align: center">Email</td>
                                                <td style="text-align: center">Roles</td>
                                                <td style="text-align: center">Action</td>
                                            </tr>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $loop->iteration }}</td>
                                                    <td style="vertical-align:middle; text-align:left">{{ $user->name }}
                                                    </td>
                                                    <td style="vertical-align:middle; text-align:left">{{ $user->email }}
                                                    </td>
                                                    @if ($user->roles == '1')
                                                        <td style="vertical-align:middle">Customer Service</td>
                                                    @elseif($user->roles == '2')
                                                        <td style="vertical-align:middle">Team IT</td>
                                                    @endif
                                                    <td style="vertical-align:middle">
                                                        <div
                                                            style="display: flex; text-align:center; justify-content:center">
                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                style="margin: 0px 4px; padding:6px 8px"
                                                                data-toggle="modal"
                                                                data-target="#editModal{{ $user->id }}">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </button>
                                                            <form action="{{ route('delete-user', $user) }}"
                                                                class="m-0 p-0" method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    style="margin: 0px 4px;padding:6px 8px"
                                                                    class="btn btn-outline-danger btn-sm delete"><i
                                                                        class="fa-solid fa-minus"></i></button>
                                                            </form>

                                                        </div>
                                                        <div class="modal fade" id="editModal{{ $user->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog  modal-dialog-centered modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Details
                                                                            User</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <form
                                                                                action="{{ route('user.update', $user->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <div style="text-align: left">
                                                                                    <label for="site"
                                                                                        style="color: black"
                                                                                        class="m-1">Name</label>
                                                                                </div>
                                                                                <input
                                                                                    class="form-control form-control-sm mt-1 mb-1"
                                                                                    type="text"
                                                                                    aria-label="default input example"
                                                                                    value="{{ $user->name }}" readonly>
                                                                                <div style="text-align: left">
                                                                                    <label for="site"
                                                                                        style="color: black"
                                                                                        class="m-1">Email</label>
                                                                                </div>
                                                                                <input
                                                                                    class="form-control form-control-sm mt-1 mb-1"
                                                                                    type="text"
                                                                                    aria-label="default input example"
                                                                                    value="{{ $user->email }}" readonly>
                                                                                <div
                                                                                    style="margin: 6px 0px; text-align:left">
                                                                                    <div style="text-align: left">
                                                                                        <label for="site"
                                                                                            style="color: black"
                                                                                            class="m-1">Ip
                                                                                            Address</label>
                                                                                    </div>
                                                                                    @foreach ($user->ips as $ip)
                                                                                        <input class="form-control"
                                                                                            type="text" name="ip"
                                                                                            data-role="tagsinput"
                                                                                            aria-label="default input example"
                                                                                            value="{{ $ip->ip }}">
                                                                                    @endforeach
                                                                                </div>
                                                                                <div style="text-align: left">
                                                                                    <label for="site"
                                                                                        style="color: black"
                                                                                        class="m-1">Roles</label>
                                                                                </div>

                                                                                @if ($user->roles == 1)
                                                                                    <input
                                                                                        class="form-control form-control-sm mt-1 mb-1"
                                                                                        type="text"
                                                                                        aria-label="default input example"
                                                                                        value="Customer Service" readonly>
                                                                                @else
                                                                                    <input
                                                                                        class="form-control form-control-sm mt-1 mb-1"
                                                                                        type="text"
                                                                                        aria-label="default input example"
                                                                                        value="Team IT" readonly>
                                                                                @endif
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
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="primary" onclick="window.dialog.showModal();">Add user</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 18px 0px"></div>
        </div>
    </div>
    <div class="wrapper" id="icon-menus">
        <input type="checkbox" />
        <div class="fab"></div>
        <div class="fac">
            <div class="new"><a href="{{ route('index-announs') }}" class=""><i
                        class="fa-solid fa-bell"></i></a>
                <span style="margin: 50px" class="new-text">Announcements</span>
            </div>

            <div class="new"><a href="{{ route('index-status') }}"><i class="fa-solid fa-inbox"></i></a>
                <span style="margin: 50px" class="new-text">Check status</span>
            </div>
            <div class="new"><a href="{{ route('index-laporan') }}"><i
                        class="fa-solid fa-envelope-open-text"></i></a>
                <span style="margin: 50px" class="new-text">Report complaint</span>
            </div>
            <div class="new"><a href="{{ route('login') }}" class=""><i class="fa-solid fa-house"></i></a>
                <span style="margin: 50px" class="new-text">Home</span>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $(".delete").click(function(e) {
                e.preventDefault(); // Untuk mencegah tindakan default dari tombol submit

                var deleteForm = $(this).closest('form'); // Mendapatkan elemen form terdekat
                Swal.fire({
                    title: "Are you sure ?",
                    text: "You will not be able to recover these data files!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#1D5CFF",
                    cancelButtonColor: "#db0808",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Swal.fire({
                        //     title: "Deleted!",
                        //     text: "Your file has been deleted.",
                        //     icon: "success"
                        // });
                        deleteForm.submit();
                    } else {
                        Swal.close();
                    }
                });
            });
        });
    </script>
@endsection
