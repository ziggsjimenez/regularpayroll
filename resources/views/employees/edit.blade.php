@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Edit -'.$emp->lastname])
@endsection


@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('employees.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>


        {!! Form::model($emp, ['route' => ['employees.update', $emp->id],'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('lastname', 'Lastname')!!}
            {!! Form::text('lastname',null,['class' => 'form-control'.($errors->has('lastname') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('firstname', 'Firstname')!!}
            {!! Form::text('firstname',null,['class' => 'form-control'.($errors->has('firstname') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('middlename', 'Middlename')!!}
            {!! Form::text('middlename',null,['class' => 'form-control'.($errors->has('middlename') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('extname', 'Extname')!!}
            {!! Form::text('extname',null,['class' => 'form-control'.($errors->has('extname') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('birthday', 'Birthday')!!}
            {!! Form::date('birthday',null,['class' => 'form-control'.($errors->has('birthday') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Address')!!}
            {!! Form::text('address',null,['class' => 'form-control'.($errors->has('address') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('contact', 'Contact No.')!!}
            {!! Form::text('contact',null,['class' => 'form-control'.($errors->has('contact') ? ' is-invalid' : '')])!!}
        </div>


        {!!Form::submit('Update',['class'=>'btn btn-primary']) !!}



        {!! Form::close() !!}


    </div>
@endsection


