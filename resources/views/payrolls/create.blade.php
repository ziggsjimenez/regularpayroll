@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Create Payroll'])
@endsection

@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('payrolls.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>

        <hr/>

        {!! Form::open(['route' => 'payrolls.store','class'=>'form']) !!}

        <div class="form-group">
            {!! Form::label('description', 'Description')!!}
            {!! Form::text('description',null,['class' => 'form-control'.($errors->has('description') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('office_id', 'Office')!!}
            {!! Form::select('office_id',$offices,null,['class' => 'form-control'.($errors->has('office_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('deductionmode_id', 'Deduction Mode')!!}
            {!! Form::select('deductionmode_id',$deductionmodes,null,['class' => 'form-control'.($errors->has('deductionmode_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('status_id', 'Status')!!}
            {!! Form::select('status_id',$statuses,1,['class' => 'form-control'.($errors->has('status_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('datefrom', 'From (mm/dd/yyyy)')!!}
            {!! Form::date('datefrom',null,['class' => 'form-control'.($errors->has('datefrom') ? ' is-invalid' : '')])!!}
        </div>

        <div class="form-group">
            {!! Form::label('dateto', 'To (mm/dd/yyyy)')!!}
            {!! Form::date('dateto',null,['class' => 'form-control'.($errors->has('dateto') ? ' is-invalid' : '')])!!}
        </div>

        {!!Form::submit('Add',['id'=>'btnadd','class'=>'btn btn-primary']) !!}

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

//                alert(days);


                var start = new Date(Date.parse($('#datefrom').val()));
                var end = new Date(Date.parse($('#dateto').val()));
//                var end = $('#dateto').val();

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


