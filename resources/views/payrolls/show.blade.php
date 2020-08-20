@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Payroll - '.$payroll->refnum])
@endsection

@section('content')

    <a class="btn btn-primary" href="{{route('payrolls.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>
    <a class="btn btn-warning" href="{{route('payrolls.edit',$payroll->id)}}"><i class="fas fa-pen"></i> EDIT</a>

    <hr/>

    <table class="table table-bordered" style="font-size:80%">
        <thead>
        <tr>
            <th>#</th>
            <th>Reference Number</th>
            <th>Description</th>
            <th>Office</th>
            <th>Employees</th>
            <th>Deduction Mode</th>
            <th>Status</th>
            <th>From</th>
            <th>To</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$payroll->id}}</td>
            <td>{{$payroll->refnum}}</td>
            <td>{{$payroll->description}}</td>
            <td>{{$payroll->office->name}}</td>
            <td>{{$payroll->office->employees->count()}}</td>
            <td>{{$payroll->deductionmode->name}}</td>
            <td>{{$payroll->status->name}}</td>
            <td>{{$payroll->datefrom}}</td>
            <td>{{$payroll->dateto}}</td>
        </tr>
        </tbody>
    </table>

    @include('layouts.inc.messages')

    <div id="payrollitems"></div>

@endsection



@section('customScripts')

    @include('layouts.js.datables')

    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('public/js/sweetalert.min.js')}}"></script>

    <script>

        $(document).ready(function() {

            function loadappemployeetable(){

                var payroll = '{{$payroll->id}}';

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    /* the route pointing to the post function */
                    url: '{{url('/payrolls/loadappemployee')}}',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN,payroll:payroll},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */

                    success: function (data) {
                        $("#payrollitems").html(data);
                    }
                });


            }

            loadappemployeetable();


            $('#employeetable').DataTable();


            $(document).on('click', '.addbtn', function(){

                $("#payroll_id").val($(this).attr('payroll'));
                $("#employee_id").val($(this).attr('employee'));
                $("#myModal").modal();
            });

            $( "#btnsend" ).click(function() {

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $("#myModal").modal('hide');

                $.ajax({

                    url: '{{url('/payrolls/addemployee')}}',
                    type: 'POST',

                    data: {_token: CSRF_TOKEN, days:$("#days").val(),payroll:$("#payroll_id").val(),employee:$("#employee_id").val()},
                    dataType: 'JSON',

                    success: function (data) {

                        if((data['error'])){
                            alert(data['error']);
                        }

                        if((data['msg'])){
                            console.log(data['msg']);
                        }

                        loadappemployeetable();

                    }
                });


            });

        } );

    </script>
@endsection
