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
                                                <td style="text-align: center">Submited At</td>
                                            </tr>
                                        <tbody>
                                            @foreach ($spams as $spam)
                                                <tr style="text-align: center;">
                                                    <td style="vertical-align:middle">{{ $spam->id }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->ip_address }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->email }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->site }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->complaints }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->expectation }}</td>
                                                    <td style="vertical-align:middle">{{ $spam->created_at }}</td>
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
