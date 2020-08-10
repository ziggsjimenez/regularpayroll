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
                <th rowspan="2">Default Amount</th>
                <th colspan="24">Frequency</th>
                <th rowspan="2">Status</th>
                <th rowspan="2">Action</th>
            </tr>
            <tr>
                @for ($i = 1; $i <= 24; $i++)
                    <th>{{$i}}</th>
                @endfor
            </tr>
            </thead>
            <tbody>
            @foreach($deductionitems as $deductionitem)

                <tr>

                    <td>{{$deductionitem->id}}</td>
                    <td>{{$deductionitem->name}}</td>
                    <td>{{$deductionitem->deductionmode->name}}</td>
                    <td>{{$deductionitem->defaultamount}}</td>
                    <td>{{$deductionitem->f1}}</td>
                    <td>{{$deductionitem->f2}}</td>
                    <td>{{$deductionitem->f3}}</td>
                    <td>{{$deductionitem->f4}}</td>
                    <td>{{$deductionitem->f5}}</td>
                    <td>{{$deductionitem->f6}}</td>
                    <td>{{$deductionitem->f7}}</td>
                    <td>{{$deductionitem->f8}}</td>
                    <td>{{$deductionitem->f9}}</td>
                    <td>{{$deductionitem->f10}}</td>
                    <td>{{$deductionitem->f11}}</td>
                    <td>{{$deductionitem->f12}}</td>
                    <td>{{$deductionitem->f13}}</td>
                    <td>{{$deductionitem->f14}}</td>
                    <td>{{$deductionitem->f15}}</td>
                    <td>{{$deductionitem->f16}}</td>
                    <td>{{$deductionitem->f17}}</td>
                    <td>{{$deductionitem->f18}}</td>
                    <td>{{$deductionitem->f19}}</td>
                    <td>{{$deductionitem->f20}}</td>
                    <td>{{$deductionitem->f21}}</td>
                    <td>{{$deductionitem->f22}}</td>
                    <td>{{$deductionitem->f23}}</td>
                    <td>{{$deductionitem->f24}}</td>
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
