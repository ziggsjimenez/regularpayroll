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

        {!! Form::model($deductionitem, ['route' => ['deductionitems.update', $deductionitem->id],'method' => 'put']) !!}

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
            @for ($i = 1; $i <= 24; $i++)



                @if($deductionitem->f.($i)==1)
                {!! Form::checkbox('f'.$i,1,true)!!}
                    @else
                {!! Form::checkbox('f'.$i,1)!!}
                @endif


                {!! Form::label('f'.$i, 'F'.$i)!!}

            @endfor
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
