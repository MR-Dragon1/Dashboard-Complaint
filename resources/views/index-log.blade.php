@extends('layouts.master')

@section('content')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 37px">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="container-fluid">
                                <h4 class="mb-3" style="text-align: center; color:black; margin:20px 0px">Log Activity's
                                </h4>
                                <div class="loader"></div>
                                <div class="row">
                                    <table id="records" class="table table-striped">
                                        <thead>
                                            <tr style="text-align:center">
                                                <td style="text-align: center">No</td>
                                                <td style="text-align: center">Ip address</td>
                                                <td style="text-align: center">Method</td>
                                                <td style="text-align: center">Table Activity</td>
                                                <td style="text-align: center">Id Table Activity</td>
                                                <td style="text-align: center">Id User Activity</td>
                                                <td style="text-align: center">Data Activity</td>
                                                <td style="text-align: center">Submited At</td>
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
                                                            {{ $log->properties }}</td>
                                                    @endif

                                                    <td style="vertical-align:middle">{{ $log->updated_at }}</td>
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
