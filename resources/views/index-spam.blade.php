@extends('layouts.master')

@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 37px">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="container-fluid">
                                <h4 class="mb-3" style="text-align: center; color:black; margin:20px 0px">Spam
                                </h4>
                                <div class="loader"></div>
                                <div class="row">
                                    <table id="records" class="table table-striped">
                                        <thead>
                                            <tr style="text-align:center">
                                                <td style="text-align: center">No</td>
                                                <td style="text-align: center">Ip address</td>
                                                <td style="text-align: center">Email</td>
                                                <td style="text-align: center">Site</td>
                                                <td style="text-align: center">Complaint</td>
                                                <td style="text-align: center">Expectation</td>
                                                <td style="text-align: center">Status</td>
                                                <td style="text-align: center">Submited Data</td>
                                                <td style="text-align: center">Actions</td>
                                            </tr>
                                        <tbody>
                                            @foreach ($spams as $spam)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $loop->iteration }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->ip_address }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->email }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->site }}</td>
                                                    <td style="vertical-align:middle">
                                                        {{ Illuminate\Support\Str::limit($spam->complaints, 30) }}</td>
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        {{ Illuminate\Support\Str::limit($spam->expectation, 30) }}</td>
                                                    </td>
                                                    @if ($spam->status == '0')
                                                        <td style="vertical-align:middle">
                                                            <div class="red-button-1">
                                                                Unprocessed
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td style="vertical-align:middle">{{ $spam->created_at }}</td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#editModal{{ $spam->id }}">
                                                            Details
                                                        </button>

                                                        <!-- Modal edit -->
                                                        <div class="modal fade" id="editModal{{ $spam->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Details
                                                                            Complaint</h5>

                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="carousel-new">
                                                                            <div class="slides-new">

                                                                            </div>
                                                                            <button class="prev button"><i
                                                                                    style="vertical-align: middle"
                                                                                    class="fa-solid fa-caret-left"></i></button>
                                                                            <button class="next button"><i
                                                                                    style="vertical-align: middle"
                                                                                    class="fa-solid fa-caret-right"></i></button>
                                                                        </div>



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
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Site</label>
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
                                                                        <div class="form-floating">
                                                                            <textarea class="form-control form-control-sm mt-1 mb-1" id="floatingTextarea" style="height: 65px;" readonly>{{ $spam->complaints }}</textarea>
                                                                        </div>
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Expectation</label>
                                                                        </div>
                                                                        <div class="form-floating">
                                                                            <textarea class="form-control form-control-sm mt-1 mb-1" id="floatingTextarea" style="height: 65px;" readonly>{{ $spam->expectation }}</textarea>
                                                                        </div>
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
                                                                                class="m-1">Submited At</label>
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
            <div style="margin: 30px 0px"></div>
        </div>
    </div>
@endsection
