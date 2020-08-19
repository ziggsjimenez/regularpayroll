@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Offices Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('offices.create')}}"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>
        @include('layouts.inc.messages')
        <table id="datatable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Head of Office</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($offices as $office)

                <tr>
                    <td>{{$office->id}}</td>
                    <td>{{$office->name}}</td>
                    <td>{{$office->headofoffice}}</td>
                    <td>{{$office->position}}</td>
                    <td>

                        <a class="btn btn-warning" href="{{route('offices.edit',$office->id)}}"><i class="fas fa-pen"></i> EDIT</a>

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
