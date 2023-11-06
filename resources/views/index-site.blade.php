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
                                <h3 class="mb-3" style="text-align: center; color:black; margin:20px 0px">Site Lists
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
                                                                    Add Site
                                                                </h5>
                                                                <div class="row">
                                                                    <form action="{{ route('store-site') }}" method="post">
                                                                        @csrf
                                                                        <label for="name" style="color: black;"
                                                                            class="m-1">Name
                                                                            Sites</label>
                                                                        <input style="" class="form-control mt-2 mb-2"
                                                                            type="text"
                                                                            placeholder="What is the name of your site ?"
                                                                            aria-label="default input example"
                                                                            name="name" id="name" required>
                                                                        <label for="grup" style="color: black"
                                                                            class="m-1">Groups</label>
                                                                        <select name="grup" id="grup"
                                                                            class="form-select "
                                                                            aria-label="Default select example">
                                                                            <option selected>Select Groups</option>
                                                                            <option value="PNG" selected>PNG</option>
                                                                        </select>
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
                                                <td style="text-align: center">Name Sites</td>
                                                <td style="text-align: center">Groups</td>
                                                @if (Auth::check() && Auth::user()->roles == 2)
                                                    <td style="text-align: center">Actions</td>
                                                @endif
                                            </tr>
                                        <tbody>
                                            @foreach ($sites as $site)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $site->name_sites }}</td>
                                                    <td style="vertical-align:middle">{{ $site->groups }}</td>
                                                    @if (Auth::check() && Auth::user()->roles == 2)
                                                        <td style="vertical-align:middle">
                                                            <form action="{{ route('delete-site', $site) }}" method="post">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            @if (Auth::check() && Auth::user()->roles == 1)
                                <button class="primary" onclick="window.dialog.showModal();">Add Site</button>
                            @elseif(Auth::check() && Auth::user()->roles == 2)
                                <button class="primary" onclick="window.dialog.showModal();">Add Site</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
