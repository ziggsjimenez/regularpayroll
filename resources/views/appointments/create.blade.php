@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Create Appointment'])
@endsection


@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('appointments.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        {!! Form::open(['route' => 'appointments.store','class'=>'form']) !!}

        <div class="form-group">
            {!! Form::label('description', 'Description')!!}
            {!! Form::text('description',null,['class' => 'form-control'.($errors->has('description') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('chargeability_id', 'Chargeability')!!}
            {!! Form::select('chargeability_id',$chargeabilities,null,['class' => 'form-control'.($errors->has('chargeability_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('status_id', 'Status')!!}
            {!! Form::select('status_id',$statuses,1,['class' => 'form-control'.($errors->has('status_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>


        {!!Form::submit('Add',['class'=>'btn btn-primary']) !!}



        {!! Form::close() !!}


    </div>
@endsection


