@extends('layouts.master')

@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if (!Auth::check())
                        <div style="margin: 10px 0px"></div>
                    @endif
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="container-fluid">
                                <h3 class="mb-3" style="text-align: center; color:black; margin:20px 0px">IP Address
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
                                                                    Add Ip Address
                                                                </h5>
                                                                <div class="row">
                                                                    <form action="{{ route('store-ip') }}" method="post">
                                                                        @csrf
                                                                        <label for="name" style="color: black;"
                                                                            class="m-1">IP Address</label>
                                                                        <input style="" class="form-control mt-2 mb-2"
                                                                            type="text" placeholder="Add your ip address"
                                                                            aria-label="default input example"
                                                                            name="ip" id="ip" required>
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
                                                <td style="text-align: center">IP Address</td>
                                                <td style="text-align: center">Created At</td>
                                                <td style="text-align: center">Action</td>
                                            </tr>
                                        <tbody>
                                            @foreach ($ips as $ip)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $loop->iteration }}</td>
                                                    <td style="vertical-align:middle; text-align:left">{{ $ip->ip }}
                                                    </td>
                                                    <td style="vertical-align:middle">{{ $ip->created_at }}</td>
                                                    <td style="vertical-align:middle">
                                                        <form action="{{ route('delete-ip', $ip) }}" method="post">
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
                            <button class="primary" onclick="window.dialog.showModal();">Add new ip</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
