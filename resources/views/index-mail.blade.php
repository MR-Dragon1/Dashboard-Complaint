@extends('layouts.master')
@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="container-fluid">
                                <h4 class="mb-3" style="text-align: center; color:black; margin:11px 0px">General
                                    Complaints
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


                                <div class="row" style="text-align: center;margin:20px 0px">
                                    <div class="col">
                                        <div class="checkbox-wrapper-13">
                                            <input id="filterHaveCode" value="haveCode" type="checkbox">
                                            <label for="filterHaveCode">[ Data have at code agent list ]</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="checkbox-wrapper-13">
                                            <input id="filterNoCode" value="noCode" type="checkbox">
                                            <label for="filterNoCode">[ Data not have at code agent list ]</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2 mt-2">
                                    <div class="col">
                                        <code style="font-family: revert-layer; font-weight:bold">Amount of Data: <span
                                                id="dataCount"></span></code>
                                    </div>
                                    <div class="col" style="text-align: right"><button type="button"
                                            class="btn btn-outline-primary" onClick="window.location.reload();">
                                            <i class="fa-solid fa-envelope"></i> Complaint unprocessed <span
                                                id="badgeCounter" class="badge text-bg-danger"></span>
                                        </button>
                                    </div>

                                </div>


                                <div class="row" style="text-align: center;">
                                    <table id="records" class="table table-striped">
                                        <thead class="table-dark">
                                            <tr>
                                                <td style="text-align: center">No</td>
                                                <td style="text-align: center">Code Agent</td>
                                                <td style="text-align: center">Email</td>
                                                <td style="text-align: center">ID Ticket</td>
                                                <td style="text-align: center">Site</td>
                                                <td style="text-align: center">Status</td>
                                                <td style="text-align: center">Submited Data</td>
                                                <td style="text-align: center">Updated Data</td>
                                                <td style="text-align: center">Action</td>
                                            </tr>
                                            @php
                                                $i = 1;
                                            @endphp
                                        <tbody>
                                            @foreach ($complaints as $complaint)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $loop->iteration }}</td>
                                                    <td
                                                        style="vertical-align:middle;text-align:left;text-transform:uppercase">
                                                        {{ $complaint->code }}</td>
                                                    <td style="vertical-align:middle; text-align:left">
                                                        {{ $complaint->email }}</td>
                                                    <td style="vertical-align:middle; text-align:left">
                                                        {{ $complaint->ticket }}
                                                    </td>
                                                    <td style="vertical-align:middle;text-align:left">
                                                        {{ $complaint->site }}</td>

                                                    @if ($complaint->status == '0')
                                                        <td style="vertical-align:middle; width:9%">
                                                            <div class="red-button-1">
                                                                Unprocessed
                                                            </div>
                                                        </td>
                                                    @elseif ($complaint->status == '1')
                                                        <td style="vertical-align:middle; width:9%">
                                                            <div class="blue-button-1">
                                                                Data Transferred
                                                            </div>
                                                        </td>
                                                    @elseif ($complaint->status == '2')
                                                        <td style="vertical-align:middle; width:9%">
                                                            <div class="yellow-button-1">
                                                                On Going
                                                            </div>
                                                        </td>
                                                    @elseif ($complaint->status == '3')
                                                        <td style="vertical-align:middle; width:9%">
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
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#editModal{{ $complaint->id }}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>

                                                        <!-- Modal edit -->
                                                        <div class="modal fade" id="editModal{{ $complaint->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog  modal-dialog-centered modal-xl"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Details
                                                                            Complaint</h5>

                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col"
                                                                                    style="border-right: solid #ffffffcc 1px; width:50%">
                                                                                    <div id="carouselExampleControls"
                                                                                        class="carousel slide"
                                                                                        data-ride="carousel">
                                                                                        <div class="carousel-inner"
                                                                                            style="background: none">
                                                                                            @php
                                                                                                $first = true;
                                                                                            @endphp
                                                                                            @foreach ($complaint->images as $index => $image)
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
                                                                                        @if (count($complaint->images) > 1)
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
                                                                                        <label for="site"
                                                                                            style="color: black"
                                                                                            class="m-1">Code
                                                                                            Agent</label>
                                                                                    </div>
                                                                                    <input
                                                                                        class="form-control form-control-sm mt-1 mb-1"
                                                                                        type="text"
                                                                                        aria-label="default input example"
                                                                                        value="{{ $complaint->code }}"
                                                                                        readonly>
                                                                                    <div style="text-align: left">
                                                                                        <label for="site"
                                                                                            style="color: black"
                                                                                            class="m-1">Email</label>
                                                                                    </div>
                                                                                    <input
                                                                                        class="form-control form-control-sm mt-1 mb-1"
                                                                                        type="text"
                                                                                        aria-label="default input example"
                                                                                        value="{{ $complaint->email }}"
                                                                                        readonly>
                                                                                    <div style="text-align: left">
                                                                                        <label for="site"
                                                                                            style="color: black"
                                                                                            class="m-1">ID
                                                                                            Ticket</label>
                                                                                    </div>
                                                                                    <input
                                                                                        class="form-control form-control-sm mt-1 mb-1"
                                                                                        type="text"
                                                                                        aria-label="default input example"
                                                                                        value="{{ $complaint->ticket }}"
                                                                                        readonly>

                                                                                    <div style="text-align: left">
                                                                                        <label for="name"
                                                                                            style="color: black"
                                                                                            class="m-1">Website
                                                                                            Name</label>
                                                                                    </div>
                                                                                    <input
                                                                                        class="form-control form-control-sm mt-1 mb-1"
                                                                                        type="text"
                                                                                        aria-label="default input example"
                                                                                        value="{{ $complaint->name }}"
                                                                                        readonly>
                                                                                    <div style="text-align: left">
                                                                                        <label for="site"
                                                                                            style="color: black"
                                                                                            class="m-1">Site Web</label>
                                                                                    </div>
                                                                                    <input
                                                                                        class="form-control form-control-sm mt-1 mb-1"
                                                                                        type="text"
                                                                                        aria-label="default input example"
                                                                                        value="{{ $complaint->site }}"
                                                                                        readonly>

                                                                                    <div style="text-align: left">
                                                                                        <label for="site"
                                                                                            style="color: black"
                                                                                            class="m-1">Complaint</label>
                                                                                    </div>
                                                                                    <textarea class="form-control form-control-sm mt-1 mb-1" id="floatingTextarea" readonly>{{ $complaint->complaints }}</textarea>
                                                                                    <div style="text-align: left">
                                                                                        <label for="site"
                                                                                            style="color: black"
                                                                                            class="m-1">Expectation</label>
                                                                                    </div>
                                                                                    <textarea class="form-control form-control-sm mt-1 mb-1" id="floatingTextarea" readonly>{{ $complaint->expectation }}</textarea>
                                                                                    <div style="text-align: left">
                                                                                        <label for="status"
                                                                                            style="color: black"
                                                                                            class="m-1">Status</label>
                                                                                    </div>

                                                                                    @if ($complaint->status == '0')
                                                                                        <input
                                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                                            type="text"
                                                                                            aria-label="default input example"
                                                                                            value="Unprocessed" readonly>
                                                                                    @elseif($complaint->status == '1')
                                                                                        <input
                                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                                            type="text"
                                                                                            aria-label="default input example"
                                                                                            value="Data is being transferred"
                                                                                            readonly>
                                                                                    @elseif($complaint->status == '2')
                                                                                        <input
                                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                                            type="text"
                                                                                            aria-label="default input example"
                                                                                            value="Data being worked on"
                                                                                            readonly>
                                                                                    @elseif($complaint->status == '3')
                                                                                        <input
                                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                                            type="text"
                                                                                            aria-label="default input example"
                                                                                            value="The complaint has been resolved"
                                                                                            readonly>
                                                                                    @endif
                                                                                    <div style="text-align: left">
                                                                                        <label for="site"
                                                                                            style="color: black"
                                                                                            class="m-1">Submited
                                                                                            at</label>
                                                                                    </div>
                                                                                    <input
                                                                                        class="form-control form-control-sm mt-1 mb-1"
                                                                                        type="text"
                                                                                        aria-label="default input example"
                                                                                        value="{{ $complaint->created_at }}"
                                                                                        readonly>
                                                                                </div>
                                                                                <div class="col"
                                                                                    style="border-left: solid #d7d5d5cc 1px;width:50%">
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
                                                                                        <select name="status"
                                                                                            id="status"
                                                                                            class="form-select mt-1 mb-1"
                                                                                            aria-label="Default select example">
                                                                                            <option value="" disabled
                                                                                                selected>
                                                                                                Select your option
                                                                                            </option>
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
                                                                                        <div class="form-check m-1 mt-2 mb-2"
                                                                                            id="radioContainer"
                                                                                            class="radioContainer"
                                                                                            style="text-align:left; margin-top:2px">
                                                                                            <div class="info-transfer">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="content-comment">
                                                                                            <h6 class="mt-1">Comments
                                                                                            </h6>
                                                                                            @foreach ($complaint->comments as $comment)
                                                                                                @if ($comment->roles == 1 && $comment->message != null)
                                                                                                    <div
                                                                                                        class="container text-center">
                                                                                                        <div
                                                                                                            class="row align-items-center">
                                                                                                            <div class="col"
                                                                                                                style="margin-top: 5px">
                                                                                                                <div>
                                                                                                                    <div class="m-1"
                                                                                                                        style="text-align:left">
                                                                                                                        <b
                                                                                                                            style="font-size: 12px">{{ $comment->person }}
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
                                                                                                            <div
                                                                                                                class="col">

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @elseif($comment->roles == 2 && $comment->message != null)
                                                                                                    <div
                                                                                                        class="container text-center">
                                                                                                        <div
                                                                                                            class="row align-items-center">
                                                                                                            <div class="col"
                                                                                                                style="margin-top: 5px">
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
                                                                                                            <div
                                                                                                                class="col mt-1">
                                                                                                                <div class="m-1"
                                                                                                                    style="text-align: right">
                                                                                                                    <b
                                                                                                                        style="font-size: 12px">{{ $comment->person }}
                                                                                                                        |
                                                                                                                        Admin
                                                                                                                        Support</b>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="chat-team">
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
                                                                                        <div class="form-group"
                                                                                            style="margin-top:15px">
                                                                                            <div class="form-group">
                                                                                                <input name="message"
                                                                                                    id="message"
                                                                                                    placeholder="Add your comments ?"
                                                                                                    class="form-control-2"
                                                                                                    aria-label="default input example"
                                                                                                    style="box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 2px;">
                                                                                            </div>
                                                                                            @if (Auth::check() && Auth::user()->roles == 2)
                                                                                                <input type="number"
                                                                                                    name="roles"
                                                                                                    id="roles"
                                                                                                    value="2" hidden>
                                                                                            @else
                                                                                                <input type="number"
                                                                                                    name="roles"
                                                                                                    id="roles"
                                                                                                    value="1" hidden>
                                                                                            @endif
                                                                                        </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div style=text-align:end>
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            @if (Auth::check())
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Save
                                                                                    changes</button>
                                                                            @endif
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
    {{-- <audio src="/ping.mp3" type="audio/mp3" id="myAudio"></audio> --}}
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('select[name="status"]').on('change', function() {
                var selectedValue = $(this).val();
                if (selectedValue === '1') {
                    $(this).closest('form').find('.info-transfer').html(
                        '<input class="form-check-input" type="checkbox" value="1" id="page" name="page" checked/> <label class="form-check-label" style = " margin-top:2px" for = "page" > Team IT </label>'
                    );
                } else {
                    $(this).closest('form').find('.info-transfer').html('');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#records').DataTable();

            // Fungsi untuk menerapkan filter berdasarkan checkbox yang dicentang dan menghitung jumlah data yang terfilter
            function applyFilters() {
                var filterValues = [];
                $('input[type=checkbox]:checked').each(function() {
                    filterValues.push($(this).val());
                });

                if (filterValues.length > 0) {
                    var codesArray = {!! json_encode($codes) !!}
                    var codesString = codesArray.join('|');

                    if (filterValues.includes('haveCode')) {
                        table.columns(1).search('^(' + codesString + ')$', true, false).draw();
                    } else if (filterValues.includes('noCode')) {
                        table.columns(1).search('^(?!' + codesString + ').*$', true, false).draw();
                    }
                } else {
                    table.columns(1).search('').draw(); // Jika tidak ada checkbox yang dipilih, hapus semua filter
                }

                updateFilteredDataCount(); // Memanggil fungsi untuk mengupdate jumlah data yang terfilter
            }

            // Fungsi untuk mengupdate jumlah data yang terfilter
            function updateFilteredDataCount() {
                var info = table.page.info();
                $('#dataCount').html(info.recordsDisplay);
            }

            // Menangani perubahan pada checkbox
            $('input[type=checkbox]').on('change', function() {
                applyFilters();
            });

            // Memanggil fungsi saat tabel pertama kali dimuat
            updateFilteredDataCount();
        });
    </script>
    {{-- New Content Stream --}}
    <script>
        function playSound(url) {
            const audio = new Audio('/ping.mp3');
            audio.type = 'audio/mp3';
            audio.play();
        }

        let notificationCount = 0;
        const sse = new EventSource('/notification')
        sse.onmessage = function(e) {
            const counter = e.data
            if (counter != 0 && counter != notificationCount) {
                playSound()
                // data nya >0
                notificationCount = counter;
                $('#badgeCounter').text(notificationCount)

                if ($('#badgeCounter').hasClass('d-none')) {
                    $('#badgeCounter').removeClass('d-none')
                }
            } else if (counter == 0) {
                // data nya 0
                notificationCount = 0;
                if (!$('#badgeCounter').hasClass('d-none')) {
                    $('#badgeCounter').addClass('d-none')
                }
            }
        }
    </script>
@endsection
