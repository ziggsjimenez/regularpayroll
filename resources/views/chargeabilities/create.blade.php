@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Create Chargeability'])
@endsection


@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('chargeabilities.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        {!! Form::open(['route' => 'chargeabilities.store','class'=>'form']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Description')!!}
            {!! Form::text('name',null,['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('amount', 'Amount')!!}
            {!! Form::number('amount',null,['class' => 'form-control'.($errors->has('amount') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('fundsource_id', 'Fund Source')!!}
            {!! Form::select('fundsource_id',$fundsources,null,['class' => 'form-control'.($errors->has('fundsource_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('headofoffice', 'Head of Office')!!}
            {!! Form::text('headofoffice',null,['class' => 'form-control'.($errors->has('headofoffice') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('position', 'Position')!!}
            {!! Form::text('position',null,['class' => 'form-control'.($errors->has('position') ? ' is-invalid' : '')])!!}
        </div>


        {!!Form::submit('Add',['class'=>'btn btn-primary']) !!}



        {!! Form::close() !!}








    </div>
@endsection


