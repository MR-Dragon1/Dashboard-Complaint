@extends('layouts.master')

@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row" style="text-align: center">
                            <div class="container-fluid">
                                <h4 class="mb-3" style="text-align: center; color:black; margin:11px 0px">File Spam
                                </h4>
                                <div class="loader"></div>
                                <div class="row">
                                    <table id="records" class="table table-striped">
                                        <thead class="table-dark">
                                            <tr style="text-align:center">
                                                <td style="text-align: center">No</td>
                                                <td style="text-align: center">Ip address</td>
                                                <td style="text-align: center">Email</td>
                                                <td style="text-align: center">Code Agent</td>
                                                <td style="text-align: center">Site</td>
                                                <td style="text-align: center">Status</td>
                                                <td style="text-align: center">Submited Data</td>
                                                <td style="text-align: center">Action</td>
                                            </tr>
                                        <tbody>
                                            @foreach ($spams as $spam)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $loop->iteration }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->ip_address }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->email }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->code }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->site }}</td>
                                                    @if ($spam->status == '0')
                                                        <td style="vertical-align:middle">
                                                            <div class="red-button-1">
                                                                Unprocessed
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td style="vertical-align:middle">{{ $spam->created_at }}</td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal" data-target="#editModal{{ $spam->id }}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>

                                                        <!-- Modal edit -->
                                                        <div class="modal fade" id="editModal{{ $spam->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Details
                                                                            Complaint</h5>

                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div style="text-align: left">
                                                                            <label for="email" style="color: black;"
                                                                                class="m-1">Email</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="email"
                                                                            aria-label="default input example"
                                                                            value="{{ $spam->email }}" readonly>
                                                                        <div style="text-align: left">
                                                                            <label for="code" style="color: black"
                                                                                class="m-1">Code Agent</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="text"
                                                                            aria-label="default input example"
                                                                            value="{{ $spam->code }}" readonly>
                                                                        <div style="text-align: left">
                                                                            <label for="name" style="color: black"
                                                                                class="m-1">Website Name</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="text"
                                                                            aria-label="default input example"
                                                                            value="{{ $spam->name }}" readonly>
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Site Web</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="text"
                                                                            aria-label="default input example"
                                                                            value="{{ $spam->site }}" readonly>

                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Complaint</label>
                                                                        </div>
                                                                        <textarea class="form-control form-control-sm mt-1 mb-1" id="floatingTextarea" style="height: 65px;" readonly>{{ $spam->complaints }}</textarea>
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Expectation</label>
                                                                        </div>
                                                                        <textarea class="form-control form-control-sm mt-1 mb-1" id="floatingTextarea" style="height: 65px;" readonly>{{ $spam->expectation }}</textarea>
                                                                        <div style="text-align: left">
                                                                            <label for="status" style="color: black"
                                                                                class="m-1">Status</label>
                                                                        </div>

                                                                        @if ($spam->status == '0')
                                                                            <input
                                                                                class="form-control form-control-sm mt-1 mb-1"
                                                                                type="text"
                                                                                aria-label="default input example"
                                                                                value="Unprocessed" readonly>
                                                                        @endif
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Submited at</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="text"
                                                                            aria-label="default input example"
                                                                            value="{{ $spam->created_at }}" readonly>



                                                                        <hr>
                                                                        <div style=text-align:end>
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-dismiss="modal">Close</button>

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
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 18px 0px"></div>
        </div>
    </div>
@endsection
