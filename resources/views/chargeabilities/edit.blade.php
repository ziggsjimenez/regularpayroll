@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Create Chargeability'])
@endsection


@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('chargeabilities.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        {!! Form::model($chargeability, ['route' => ['chargeabilities.update', $chargeability->id],'method' => 'put']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Description', ['class' => 'awesome'])!!}
            {!! Form::text('name',null,['class' => 'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('amount', 'Amount', ['class' => 'awesome'])!!}
            {!! Form::number('amount',null,['class' => 'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('fundsource_id', 'Fund Source', ['class' => 'awesome'])!!}
            {!! Form::select('fundsource_id',$fundsources,null,['class' => 'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('headofoffice', 'Head of Office')!!}
            {!! Form::text('headofoffice',null,['class' => 'form-control'.($errors->has('headofoffice') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('position', 'Position')!!}
            {!! Form::text('position',null,['class' => 'form-control'.($errors->has('position') ? ' is-invalid' : '')])!!}
        </div>


        {!!Form::submit('Update',['class'=>'btn btn-primary']) !!}



        {!! Form::close() !!}








    </div>
@endsection


