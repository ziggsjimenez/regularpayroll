@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Chargeabilities Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')

    <h1>{{$chargeability->name}}</h1>

        <a class="btn btn-primary" href="{{route('chargeabilities.index')}}"><i class="fas fa-arrow-circle-left"></i> BACK </a>

        <hr/>
        @include('layouts.inc.messages')
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Fund Source</th>
                <th>Head of Office</th>
                <th>Position</th>

                <th>Action</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{$chargeability->id}}</td>
                    <td>{{$chargeability->name}}</td>
                    <td class="right">{{number_format($chargeability->amount,2,'.',',')}}</td>
                    <td>{{$chargeability->fundsource->name}}</td>
                    <td>{{$chargeability->headofoffice}}</td>
                    <td>{{$chargeability->position}}</td>
                    <td>

                        <a class="btn btn-warning" href="{{route('chargeabilities.edit',$chargeability->id)}}"><i class="fas fa-pen"></i> EDIT</a>

                    </td>
                </tr>

            </tbody>
        </table>

    <h2>Payrolls</h2>

    @include('tables.payroll',['payrolls'=>$chargeability->payrolls])

    <h2>Appointments</h2>

    @include('tables.appointments',['appointments'=>$chargeability->appointments])


@endsection

@section('customScripts')

    @include('layouts.js.datables')

    <script>

        $(document).ready(function() {
            $('#datatable').DataTable();
            $('#appdatatable').DataTable();
        } );

    </script>
@endsection

