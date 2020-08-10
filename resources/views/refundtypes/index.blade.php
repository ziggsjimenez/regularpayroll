@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Refund Types Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('refundtypes.create')}}"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>
        @include('layouts.inc.messages')
        <table id="datatable">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($refundtypes as $refundtype)

                <tr>
                    <td>{{$refundtype->id}}</td>
                    <td>{{$refundtype->title}}</td>
                    <td>{{$refundtype->status}}</td>

                    <td>

                        <a class="btn btn-warning" href="{{route('refundtypes.edit',$refundtype->id)}}"><i class="fas fa-pen"></i> EDIT</a>
                        <a class="btn btn-success" href="{{route('refundtypes.show',$refundtype->id)}}"><i class="fas fa-search"></i> VIEW</a>

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
