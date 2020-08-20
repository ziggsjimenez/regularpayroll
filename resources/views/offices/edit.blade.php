@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Edit - '.$office->name])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('offices.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        {!! Form::model($office, ['route' => ['offices.update', $office->id],'method' => 'put']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name')!!}
            {!! Form::text('name',null,['class' => 'form-control'.($errors->has('name') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('head', 'Head of Office')!!}
            {!! Form::text('head',null,['class' => 'form-control'.($errors->has('head') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('position', 'Position')!!}
            {!! Form::text('position',null,['class' => 'form-control'.($errors->has('position') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('code', 'Code')!!}
            {!! Form::text('code',null,['class' => 'form-control'.($errors->has('code') ? ' is-invalid' : '')])!!}
        </div>


        {!!Form::submit('Edit',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}


    </div>
@endsection

@section('customScripts')

    @include('layouts.js.datables')

    <script>


    </script>
@endsection
