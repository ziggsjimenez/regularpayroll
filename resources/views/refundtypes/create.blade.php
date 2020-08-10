@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Create Refund Type'])
@endsection


@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('refundtypes.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        {!! Form::open(['route' => 'refundtypes.store','class'=>'form']) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title')!!}
            {!! Form::text('title',null,['class' => 'form-control'.($errors->has('title') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status')!!}
            {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class' => 'form-control'.($errors->has('status') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>


        {!!Form::submit('Add',['class'=>'btn btn-primary']) !!}



        {!! Form::close() !!}


    </div>
@endsection


