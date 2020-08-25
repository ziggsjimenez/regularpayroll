@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Deduction Categories'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')


    <a class="btn btn-primary" href="{{route('deductionmodecategories.create')}}"><i class="fas fa-plus-circle"></i> ADD </a>

    <hr/>
    @include('layouts.inc.messages')
    <table id="datatable">
        <thead>
        <tr>
            <th rowspan="2">#</th>
            <th rowspan="2">Name</th>
            <th rowspan="2">Deduction Items</th>
            <th rowspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dedcats as $dedcat)

            <tr>

                <td>{{$dedcat->id}}</td>
                <td>{{$dedcat->name}}</td>
                <td><a href="{{route('deductionmodecategories.show',$dedcat->id)}}">{{$dedcat->deductionitems->count()}}</a></td>
                <td>
                    <a class="btn btn-warning" href="{{route('deductionmodecategories.edit',$dedcat->id)}}"><i class="fas fa-pen"></i> EDIT</a>
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
