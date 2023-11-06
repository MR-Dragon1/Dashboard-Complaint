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
                                <h3 class="mb-3" style="text-align: center; color:black; margin:20px 0px">General Complaints
                                </h3>

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
                                                                        <label for="site" style="color: black"
                                                                            class="m-1">Situs</label>
                                                                        <select id="site" name="site"
                                                                            class="form-select mt-2 mb-2"
                                                                            aria-label="Default select example">
                                                                            @foreach ($sites as $site)
                                                                                <option value="{{ $site->name_sites }}">
                                                                                    {{ $site->name_sites }}</option>
                                                                            @endforeach
                                                                        </select>
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
                                <div class="modal" id="editComplaintModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form id="editComplaintForm" action="{{ route('update-complaint') }}"
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
                                                            aria-label="Default select example" onchange="showRadio()">
                                                            <option value="0">
                                                                Unprocessed
                                                            </option>
                                                            <option value="1">
                                                                Data Transferred
                                                            </option>
                                                            <option value="2">
                                                                On Going
                                                            </option>
                                                            <option value="3">
                                                                Completed
                                                            </option>
                                                        </select>
                                                    </div>


                                                    <div class="form-check m-1 mt-2 mb-2" id="radioContainer"
                                                        style="display: none;">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            name="page" checked>
                                                        <label class="form-check-label" for="page">
                                                            Team IT
                                                        </label>
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
                                                @if (Auth::check())
                                                    <td style="text-align: center">Actions</td>
                                                @endif
                                                <td style="text-align: center">Details</td>
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
                                                        {{ $complaint->complaints }}</td>
                                                    <td style="vertical-align:middle; text-align:left">
                                                        {{ $complaint->created_at }}</td>
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
                                                    @if (Auth::check())
                                                        <td style="vertical-align:middle">
                                                            <button class="btn btn-primary edit-complaint"
                                                                data-id="{{ $complaint->id }}">Edit status</button>
                                                        </td>
                                                    @endif
                                                    <td style="vertical-align:middle">
                                                        <form action="{{ route('show_complaint', $complaint) }}"
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
                            @if (!Auth::check())
                                <button class="primary" onclick="window.dialog.showModal();">Add Complaint</button>
                            @endif
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
                var page = $("#page-" + complaintId).text();

                $("#complaint_id").val(complaintId);
                $("#status").val(status);
                $("#page").val(page);

                $("#editComplaintModal").modal('show');
            });
        });

        function showRadio() {
            var statusSelect = document.getElementById("status");
            var radioContainer = document.getElementById("radioContainer");

            if (statusSelect.value === "1") {
                radioContainer.style.display = "block";
            } else {
                radioContainer.style.display = "none";
            }
        }
    </script>




@endsection
