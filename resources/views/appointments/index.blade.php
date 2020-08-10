@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Appointments Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('appointments.create')}}"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>
        @include('layouts.inc.messages')
        <table id="datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Chargeability</th>
                <th>Status</th>

                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($appointments as $appointment)

                <tr>
                    <td>{{$appointment->id}}</td>
                    <td>{{$appointment->description}}</td>
                    <td>{{$appointment->chargeability->name}}</td>
                    <td>{{$appointment->status->name}}</td>
                    <td>

                        <a class="btn btn-warning" href="{{route('appointments.edit',$appointment->id)}}"><i class="fas fa-pen"></i> EDIT</a>
                        <a class="btn btn-success" href="{{route('appointments.show',$appointment->id)}}"><i class="fas fa-search"></i> VIEW</a>

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
