@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Edit - '.$payroll->description])
@endsection


@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{URL::previous()}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>
        <a class="btn btn-primary" href="{{route('payrolls.show',$payroll->id)}}"><i class="fas fa-search"></i> VIEW</a>
        <a class="btn btn-primary" href="{{route('payrolls.index')}}"><i class="fas fa-indent"></i> INDEX </a>

        <hr/>

        @include('layouts.inc.messages')

        {!! Form::model($payroll, ['route' => ['payrolls.update', $payroll->id],'method' => 'put']) !!}

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
            {!! Form::select('status_id',$statuses,null,['class' => 'form-control'.($errors->has('status_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('datefrom', 'From (mm/dd/yyyy)')!!}
            {!! Form::date('datefrom',$payroll->datefrom,['class' => 'form-control'.($errors->has('datefrom') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('dateto', 'To (mm/dd/yyyy)')!!}
            {!! Form::date('dateto',$payroll->dateto,['class' => 'form-control'.($errors->has('dateto') ? ' is-invalid' : '')])!!}
        </div>


        {!!Form::submit('Update',['id'=>'btnadd','class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
@endsection



@section('customScripts')

    @include('layouts.js.datables')

    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('public/js/sweetalert.min.js')}}"></script>

    <script>

        $(document).ready(function() {

            $( "#btnadd" ).click(function() {

                var start = new Date(Date.parse($('#datefrom').val()));
                var end = new Date(Date.parse($('#dateto').val()));

// end - start returns difference in milliseconds
                var diff = end-start;

// get days
                var days = diff/1000/60/60/24;

//                alert(days + "start: "+ start + "end: "+ end + "diff: "+ diff);

                if(days<0){
                    alert("Invalid Date Range.");
                    return false;
                }
            });

        } );

    </script>
@endsection



