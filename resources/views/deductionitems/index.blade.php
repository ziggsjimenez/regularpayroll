@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Deduction Items Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')


        <a class="btn btn-primary" href="{{route('deductionitems.create')}}"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>
        @include('layouts.inc.messages')
        <table id="datatable">
            <thead>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Name</th>
                <th rowspan="2">Deduction Mode</th>
                <th rowspan="2">Deduction Mode Category</th>
{{--                <th colspan="24">Frequency</th>--}}
                <th rowspan="2">Status</th>
                <th rowspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($deductionitems as $deductionitem)

                <tr>

                    <td>{{$deductionitem->id}}</td>
                    <td>{{$deductionitem->name}}</td>
                    <td>{{$deductionitem->deductionmode->name}}</td>
                    <td>{{$deductionitem->deductionmodecategory->name}}</td>
                    <td>{{$deductionitem->status}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('deductionitems.edit',$deductionitem->id)}}"><i class="fas fa-pen"></i> EDIT</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>


@endsection

@section('customScripts')

    @include('layouts.js.datables')

    <script>

        $(document).ready(function() {
            $('#datatable').DataTable();
        } );

    </script>
@endsection
