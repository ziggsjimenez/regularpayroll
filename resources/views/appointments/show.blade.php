@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Appointments Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

    <style>
        form .error {
            color: #ff0000;
        }
    </style>

@endsection

@section('content')


        <a class="btn btn-primary" href="{{route('appointments.index')}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>
        <a class="btn btn-warning" href="{{route('appointments.edit',$appointment->id)}}"><i class="fas fa-pen"></i> EDIT</a>

        <hr/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Chargeability</th>
                <th>Status</th>
                <th>From</th>
                <th>To</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$appointment->id}}</td>
                    <td>{{$appointment->description}}</td>
                    <td>{{$appointment->chargeability->name}}</td>
                    <td>{{$appointment->status->name}}</td>
                    <td>{{$appointment->datefrom}}</td>
                    <td>{{$appointment->dateto}}</td>
                </tr>
            </tbody>
        </table>

        @include('layouts.inc.messages')

        <div class="row">

            <div class="col-3">

                <div class="card">
                    <div class="card-header">
                        EMPLOYEES
                    </div>
                    <div class="card-body">
                        <table id="employeetable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count=1;?>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$employee->fullname()}}</td>
                                    <td>
                                        {{--                                <a class="btn btn-primary" appointment='{{$appointment->id}}' employee='$employee->id'href="{{url('/appointments/'.$appointment->id.'/'.$employee->id.'/addemployee')}}"><i class="fas fa-plus-circle"></i>ADD</a>--}}
                                        {{--                                <button class="addbtn btn btn-primary" appointment='{{$appointment->id}}' employee='{{$employee->id}}'><i class="fas fa-plus-circle"></i>ADD</button>--}}

                                        <button class="addbtn btn btn-primary" appointment='{{$appointment->id}}' employee='{{$employee->id}}'>Add</button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>


                @include('appointments.modal.addemployee')

            </div>

            <div class="col">

                <div class="card">
                    <div class="card-header">
                        APPOINTMENT EMPLOYEES
                    </div>
                    <div class="card-body">
                        <div id="appemployees"></div>
                    </div>
                </div>



            </div>
        </div>






@endsection

@section('customScripts')

    @include('layouts.js.datables')

    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('public/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/js/jquery-validation/dist/jquery.validate.js')}}"></script>

    <script>

        $(document).ready(function() {


            $(function() {

                // Initialize form validation on the registration form.
                // It has the name attribute "registration"
                $("form[name='modalform']").validate({
                    // Specify validation rules
                    rules: {
                        // The key name on the left side is the name attribute
                        // of an input field. Validation rules are defined
                        // on the right side
                        office_id: "required",
                        designation: "required",
                        monthlyrate: "required",
                        salarygrade: "required",
                        datefrom: "required",
                        dateto: "required",
                    },
                    // Specify validation error messages
                    messages: {
                        office_id: "Office should not be blank. ",
                        designation: "Designation is required. ",
                        monthlyrate: "Monthly rate is required. ",
                        salarygrade: "Salary grade is required. ",
                        datefrom: "Start Date is required. ",
                        dateto: "End Date is required. ",
                    },
                    // Make sure the form is submitted to the destination defined
                    // in the "action" attribute of the form when valid
                    submitHandler: function(form) {
//                        form.submit();

                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({

                            url: '{{url('/appointments/addemployee')}}',
                            type: 'POST',

                            data: {_token: CSRF_TOKEN, appointment_id:$('#appointment_id').val(),employee_id:$('#employee_id').val(),office_id:$('#office_id').val(),salarygrade:$('#salarygrade').val(),monthlyrate:$('#monthlyrate').val(),designation:$('#designation').val(),datefrom:$('#datefrom').val(),dateto:$('#dateto').val(),status:$('#status').val(),remarks:$('#remarks').val()},
                            dataType: 'JSON',

                            success: function (data) {
                                    $("#myModal").modal('hide');
//                                    loadappemployeetable();
                                 $("#appemployees").html(data['view']);
                                 alert(data['msg']);
                            }
                        });


                    }
                });
            });


            function loadappemployeetable(){

                var appointment = '{{$appointment->id}}';

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    /* the route pointing to the post function */
                    url: '{{url('/appointments/loadappemployee')}}',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN,appointment:appointment},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */

                    success: function (data) {

                        $("#appemployees").html(data);


                    }
                });


            }

            loadappemployeetable();


            $('#employeetable').DataTable();


            $( ".addbtn" ).click(function() {
                $("#appointment_id").val($(this).attr('appointment'));
                $("#employee_id").val($(this).attr('employee'));
                $("#myModal").modal();
            });

            {{--$( "#btnsend" ).click(function() {--}}

                {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}

                    {{--$.ajax({--}}

                        {{--url: '{{url('/appointments/addemployee')}}',--}}
                        {{--type: 'POST',--}}

                        {{--data: {_token: CSRF_TOKEN, appointment_id:$('#appointment_id').val(),employee_id:$('#employee_id').val(),office_id:$('#office_id').val(),salarygrade:$('#salarygrade').val(),monthlyrate:$('#monthlyrate').val(),designation:$('#designation').val(),datefrom:$('#datefrom').val(),dateto:$('#dateto').val(),status:$('#status').val(),remarks:$('#remarks').val()},--}}
                        {{--dataType: 'JSON',--}}

                        {{--success: function (data) {--}}
                            {{--$("#appemployees").html(data);--}}
                        {{--}--}}
                    {{--});--}}


            {{--});--}}





        });

    </script>
@endsection
