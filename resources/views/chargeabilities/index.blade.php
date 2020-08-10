@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Chargeabilities Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('chargeabilities.create')}}"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>
        @include('layouts.inc.messages')
        <table id="datatable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Payrolls</th>
                <th>Appointments</th>
                <th>Fund Source</th>
                <th>Head of Office</th>
                <th>Position</th>

                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($chargeabilities as $chargeability)

                <tr>
                    <td>{{$chargeability->id}}</td>
                    <td><a href="{{route('chargeabilities.show',$chargeability->id)}}">{{$chargeability->name}}</a></td>
                    <td class="right">{{number_format($chargeability->amount,2,'.',',')}}</td>
                    <td class="right">{{number_format($chargeability->payrolls->count(),0,'.',',')}}</td>
                    <td class="right">{{number_format($chargeability->appointments->count(),0,'.',',')}}</td>
                    <td>{{$chargeability->fundsource->name}}</td>
                    <td>{{$chargeability->headofoffice}}</td>
                    <td>{{$chargeability->position}}</td>
                    <td>

                        <a class="btn btn-warning" href="{{route('chargeabilities.edit',$chargeability->id)}}"><i class="fas fa-pen"></i> EDIT</a>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>
@endsection

@section('customScripts')

    @include('layouts.js.datables')

    <script>

        $(document).ready(function() {
            $('#datatable').DataTable();
        } );

    </script>
    @endsection
