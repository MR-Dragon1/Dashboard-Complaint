@extends('layouts.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="">
                    <div class="breadcome-list-first">
                        <div class="row" style="text-align: center">
                            <div class="container-fluid">
                                <h4 class="mb-3" style="text-align: center; color:black; margin:11px 0px">Code Agent Lists
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
                                                                    style="text-align: center; color:black; margin:11px 0px">
                                                                    Add Code Agent
                                                                </h5>
                                                                <div class="row">
                                                                    <form action="{{ route('store-code') }}" method="post">
                                                                        @csrf
                                                                        <div style="text-align: left">
                                                                            <label for="code" style="color: black;"
                                                                                class="m-1">Code Agent
                                                                            </label>
                                                                        </div>
                                                                        <input style="text-transform:uppercase"
                                                                            class="form-control mt-2 mb-2 code-input"
                                                                            type="text" placeholder="Web code ?"
                                                                            aria-label="default input example"
                                                                            name="code" id="code" required>
                                                                        <div style="text-align: left">
                                                                            <label for="code" style="color: black;"
                                                                                class="m-1">Website Name
                                                                            </label>
                                                                        </div>
                                                                        <input style="text-transform:uppercase"
                                                                            class="form-control mt-2 mb-2 code-input"
                                                                            type="text"
                                                                            placeholder="What's your website name?"
                                                                            aria-label="default input example"
                                                                            name="name" id="name" required>
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

                                <div class="row" style="text-align: center">
                                    <table id="records" class="table table-striped" style="font-size: 15px">
                                        <thead class="table-dark">
                                            <tr style="text-align:center">
                                                <td style="text-align: center">No</td>
                                                <td style="text-align: center">Code</td>
                                                <td style="text-align: center">Website Name</td>
                                                <td style="text-align: center">Submited Data</td>
                                                <td style="text-align: center">Action</td>
                                            </tr>
                                        <tbody>
                                            @foreach ($codes as $code)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $loop->iteration }}</td>
                                                    <td style="vertical-align:middle; text-align:center">{{ $code->code }}
                                                    </td>
                                                    <td style="vertical-align:middle; text-align:left">{{ $code->name }}
                                                    </td>
                                                    <td style="vertical-align:middle; text-align:center">
                                                        {{ $code->created_at }}</td>
                                                    <td style="vertical-align:middle;">
                                                        <form action="{{ route('delete-code', $code) }}" class="m-0 p-0"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" style="padding:6px 8px"
                                                                class="btn btn-outline-danger btn-sm delete"><i
                                                                    class="fa-solid fa-minus"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-5 mx-auto">
                                <button class="primary" onclick="window.dialog.showModal();">Add Code</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin: 18px 0px"></div>
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
