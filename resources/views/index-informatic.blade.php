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
                                <h3 class="mb-3" style="text-align: center; color:black; margin:20px 0px">Complaint Lists IT
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
                                <div class="modal" id="editComplaintModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form id="editComplaintForm" action="{{ route('update-informatic') }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="mb-3"
                                                        style="text-align: center; color:black; margin:15px 0px">
                                                        Edit Status
                                                    </h5>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="complaint_id" id="complaint_id">

                                                    <div class="form-group">
                                                        <div style="text-align: left">
                                                            <label class="m-1" for="status">Status
                                                                Complaint</label>
                                                        </div>
                                                        <select name="status" class="form-select mt-2 mb-2"
                                                            aria-label="Default select example">
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
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal"
                                                        data-target="#editComplaintModal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <table id="records" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td style="text-align: center">No</td>
                                                <td style="text-align: center">Email</td>
                                                <td style="text-align: center">Site</td>
                                                <td style="text-align: center">Complaint</td>
                                                <td style="text-align: center">Date</td>
                                                <td style="text-align: center">Status</td>
                                                <td style="text-align: center">Actions</td>
                                                <td style="text-align: center">Details</td>
                                            </tr>
                                            @php
                                                $i = 1;
                                            @endphp
                                        <tbody>
                                            @foreach ($informatics as $informatic)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $informatic->id }}</td>
                                                    <td style="vertical-align:middle; text-align:left">
                                                        {{ $informatic->email }}</td>
                                                    <td style="vertical-align:middle; text-align:left">
                                                        {{ $informatic->site }}</td>
                                                    <td style="vertical-align:middle; text-align:left">
                                                        {{ $informatic->complaints }}</td>
                                                    <td style="vertical-align:middle; text-align:left">
                                                        {{ $informatic->created_at }}</td>
                                                    @if ($informatic->status == '0')
                                                        <td style="vertical-align:middle">
                                                            <div class="red-button-1">
                                                                Unprocessed
                                                            </div>
                                                        </td>
                                                    @elseif ($informatic->status == '1')
                                                        <td style="vertical-align:middle">
                                                            <div class="blue-button-1">
                                                                Data is Received
                                                            </div>
                                                        </td>
                                                    @elseif ($informatic->status == '2')
                                                        <td style="vertical-align:middle">
                                                            <div class="yellow-button-1">
                                                                On Going
                                                            </div>
                                                        </td>
                                                    @elseif ($informatic->status == '3')
                                                        <td style="vertical-align:middle">
                                                            <div class="green-button-1">
                                                                Completed
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td style="vertical-align:middle">
                                                        <button class="btn btn-primary edit-complaint"
                                                            data-id="{{ $informatic->id }}">Edit status</button>
                                                    </td>
                                                    </td>
                                                    <td style="vertical-align:middle">
                                                        <form action="{{ route('show_complaint', $informatic) }}"
                                                            method="get">
                                                            <button type="submit" class="btn btn-primary">Show</button>
                                                        </form>
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






    <script>
        $(document).ready(function() {
            $(".edit-complaint").click(function() {
                var complaintId = $(this).data('id');
                var status = $("#status-" + complaintId).text();

                $("#complaint_id").val(complaintId);
                $("#status").val(status);

                $("#editComplaintModal").modal('show');
            });
        });
    </script>



@endsection
