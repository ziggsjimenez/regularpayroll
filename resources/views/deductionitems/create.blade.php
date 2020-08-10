@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Deduction Items Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('deductionitems.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        {!! Form::open(['route' => 'deductionitems.store','class'=>'form']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name')!!}
            {!! Form::text('name',null,['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('deductionmode_id', 'Deduction Mode')!!}
            {!! Form::select('deductionmode_id',$deductionmodes,1,['class' => 'form-control'.($errors->has('deductionmode_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('defaultamount', 'Defaultamount')!!}
            {!! Form::number('defaultamount',null,['class' => 'form-control'.($errors->has('defaultamount') ? ' is-invalid' : ''),'placeholder'=>'Php 0.00'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status')!!}
            {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class' => 'form-control'.($errors->has('status') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::checkbox('f1',1)!!}
            {!! Form::label('f1', 'F1')!!}

            {!! Form::checkbox('f2',1)!!}
            {!! Form::label('f2', 'F2')!!}

            {!! Form::checkbox('f3',1)!!}
            {!! Form::label('f13', 'F3')!!}

            {!! Form::checkbox('f4',1)!!}
            {!! Form::label('f14', 'F4')!!}

            {!! Form::checkbox('f5',1)!!}
            {!! Form::label('f5', 'F5')!!}

            {!! Form::checkbox('f6',1)!!}
            {!! Form::label('f6', 'F6')!!}

            {!! Form::checkbox('f7',1)!!}
            {!! Form::label('f7', 'F7')!!}

            {!! Form::checkbox('f8',1)!!}
            {!! Form::label('f8', 'F8')!!}

            {!! Form::checkbox('f9',1)!!}
            {!! Form::label('f9', 'F9')!!}

            {!! Form::checkbox('f10',1)!!}
            {!! Form::label('f10', 'F10')!!}

            {!! Form::checkbox('f11',1)!!}
            {!! Form::label('f11', 'F11')!!}

            {!! Form::checkbox('f12',1)!!}
            {!! Form::label('f12', 'F12')!!}

            {!! Form::checkbox('f13',1)!!}
            {!! Form::label('f13', 'F13')!!}

            {!! Form::checkbox('f14',1)!!}
            {!! Form::label('f14', 'F14')!!}

            {!! Form::checkbox('f15',1)!!}
            {!! Form::label('f15', 'F15')!!}

            {!! Form::checkbox('f16',1)!!}
            {!! Form::label('f16', 'F16')!!}

            {!! Form::checkbox('f17',1)!!}
            {!! Form::label('f177', 'F17')!!}

            {!! Form::checkbox('f18',1)!!}
            {!! Form::label('f18', 'F18')!!}

            {!! Form::checkbox('f19',1)!!}
            {!! Form::label('f19', 'F19')!!}

            {!! Form::checkbox('f20',1)!!}
            {!! Form::label('f20', 'F20')!!}

            {!! Form::checkbox('f21',1)!!}
            {!! Form::label('f21', 'F21')!!}

            {!! Form::checkbox('f22',1)!!}
            {!! Form::label('f22', 'F22')!!}

            {!! Form::checkbox('f23',1)!!}
            {!! Form::label('23', 'F23')!!}

            {!! Form::checkbox('f24',1)!!}
            {!! Form::label('f24', 'F24')!!}

        </div>

        {!!Form::submit('Add',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}


    </div>
@endsection

@section('customScripts')

    @include('layouts.js.datables')

    <script>


    </script>
@endsection
