@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Edit Deduction Item'])
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
            {!! Form::select('deductionmode_id',$deductionmodes,null,['class' => 'form-control'.($errors->has('deductionmode_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('deductionmodecategory_id', 'Deduction Mode Category')!!}
            {!! Form::select('deductionmodecategory_id',$deductionmodecategories,null,['class' => 'form-control'.($errors->has('deductionmodecategory_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status')!!}
            {!! Form::select('status',['Active'=>'Active','Inactive'=>'Inactive'],null,['class' => 'form-control'.($errors->has('status') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
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

