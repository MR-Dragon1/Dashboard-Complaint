@extends('layouts.master')

@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 37px">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="container-fluid">
                                <h4 class="mb-3" style="text-align: center; color:black; margin:11px 0px">Log Activity's
                                </h4>
                                <div class="loader"></div>
                                <div class="row">
                                    <table id="records" class="table table-striped">
                                        <thead class="table-dark">
                                            <tr style="text-align:center">
                                                <td style="text-align: center">No</td>
                                                <td style="text-align: center">IP address</td>
                                                <td style="text-align: center">Method</td>
                                                <td style="text-align: center">Table Activity</td>
                                                <td style="text-align: center">ID Table Activity</td>
                                                <td style="text-align: center">ID User Activity</td>
                                                <td style="text-align: center">Data Activity</td>
                                                <td style="text-align: center">Submited Data</td>
                                                <td style="text-align: center">Action</td>
                                            </tr>
                                        <tbody>
                                            @foreach ($logs as $log)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $log->id }}</td>
                                                    <td style="vertical-align:middle">{{ $log->log_name }}</td>
                                                    <td style="vertical-align:middle">
                                                        @if ($log->description == 'Login')
                                                            <div class="btn btn-outline-success log-method">
                                                                {{ $log->description }}</div>
                                                        @elseif($log->description == 'Logout')
                                                            <div class="btn btn-outline-danger log-method">
                                                                {{ $log->description }}</div>
                                                        @elseif($log->description == 'deleted')
                                                            <div class="btn btn-outline-danger log-method">
                                                                {{ $log->description }}</div>
                                                        @else
                                                            <div class="btn btn-outline-primary log-method">
                                                                {{ $log->description }}</div>
                                                        @endif

                                                    </td>
                                                    @if ($log->subject_type == null)
                                                        <td style="vertical-align:middle">App\Models\Users</td>
                                                    @else
                                                        <td style="vertical-align:middle">{{ $log->subject_type }}</td>
                                                    @endif
                                                    <td style="vertical-align:middle">Table to id -
                                                        {{ $log->subject_id }}</td>

                                                    @if ($log->causer_id == null)
                                                        <td style="vertical-align:middle">Guest</td>
                                                    @else
                                                        <td style="vertical-align:middle">User by id - {{ $log->causer_id }}
                                                        </td>
                                                    @endif

                                                    @if ($log->description == 'Login')
                                                        <td style="vertical-align:middle; text-align:left">
                                                            User Logs in</td>
                                                    @elseif($log->description == 'Logout')
                                                        <td style="vertical-align:middle; text-align:left">
                                                            User Logs out</td>
                                                    @else
                                                        <td style="vertical-align:middle; text-align:left">
                                                            {{ Illuminate\Support\Str::limit($log->properties, 30) }}</td>
                                                    @endif

                                                    <td style="vertical-align:middle">{{ $log->updated_at }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#editModal{{ $log->id }}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>

                                                        <!-- Modal edit -->
                                                        <div class="modal fade" id="editModal{{ $log->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Details
                                                                            Log's</h5>

                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div style="text-align: left">
                                                                            <label for="email" style="color: black;"
                                                                                class="m-1">IP Address</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="email"
                                                                            aria-label="default input example"
                                                                            value="{{ $log->log_name }}" readonly>
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Method</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="text"
                                                                            aria-label="default input example"
                                                                            value="{{ $log->description }}" readonly>
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Table Activity</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="text"
                                                                            aria-label="default input example"
                                                                            value="{{ $log->subject_id }}" readonly>
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">ID User Activity</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="text"
                                                                            aria-label="default input example"
                                                                            value="{{ $log->causer_id }}" readonly>
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Data Activity</label>
                                                                        </div>
                                                                        @if ($log->description == 'Login')
                                                                            <textarea class="form-control form-control-sm mt-1 mb-1" id="floatingTextarea" style="height: 65px;" readonly>User Logs in</textarea>
                                                                        @elseif($log->description == 'Login')
                                                                            <textarea class="form-control form-control-sm mt-1 mb-1" id="floatingTextarea" style="height: 65px;" readonly>User Logs out</textarea>
                                                                        @else
                                                                            <textarea class="form-control form-control-sm mt-1 mb-1" id="floatingTextarea" style="height: 65px;" readonly>{{ $log->properties }}</textarea>
                                                                        @endif
                                                                        <div style="text-align: left">
                                                                            <label for="site" style="color: black"
                                                                                class="m-1">Submited at</label>
                                                                        </div>
                                                                        <input
                                                                            class="form-control form-control-sm mt-1 mb-1"
                                                                            type="text"
                                                                            aria-label="default input example"
                                                                            value="{{ $log->created_at }}" readonly>
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
@endsection
