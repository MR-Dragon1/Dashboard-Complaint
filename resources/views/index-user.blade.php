@extends('layouts.master')

@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="container-fluid">
                                <h3 class="mb-3" style="text-align: center; color:black; margin:20px 0px">User Lists
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
                                    <table id="records" class="table table-striped">
                                        <thead>
                                            <tr style="text-align:center">
                                                <td style="text-align: center">Name</td>
                                                <td style="text-align: center">Email</td>
                                                <td style="text-align: center">Roles</td>
                                                <td style="text-align: center">Actions</td>
                                            </tr>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $user->name }}</td>
                                                    <td style="vertical-align:middle">{{ $user->email }}</td>
                                                    @if ($user->roles == '1')
                                                        <td style="vertical-align:middle">Customer Service</td>
                                                    @elseif($user->roles == '2')
                                                        <td style="vertical-align:middle">Team IT</td>
                                                    @endif
                                                    <td style="vertical-align:middle">
                                                        <form action="{{ route('delete-user', $user) }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <button class="primary" onclick="window.dialog.showModal();">Add User</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
