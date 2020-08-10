
@if(isset($error))
    <div class="alert alert-danger">
        {{$error}}
    </div>
@endif




<table class="table table-bordered">
    <thead>
    <tr>
        <th>Name</th>
        <th>Daily Rate (Php)</th>
        <th>Designation</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Deductions</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($appointment->appemployees as $appemployee)
        <tr>
            <td>{{$appemployee->employee->fullname()}}</td>
            <td class="right">{{number_format($appemployee->dailyrate(),2,'.',',')}}</td>
            <td class="right">{{$appemployee->designation}}</td>
            <td class="right">{{$appemployee->datefrom}}</td>
            <td class="right">{{$appemployee->dateto}}</td>
            <td>

                @foreach($appemployee->employee->deductions as $employeededuction)

                    <div class="form-check form-check-inline">
                        <input class="form-check-input deductioncheck" id="inlineCheckbox{{$employeededuction->id}}" type="checkbox" value="{{$employeededuction->id}}" @if ($employeededuction->status=="Active") checked @endif>
                        <label class="form-check-label" for="inlineCheckbox{{$employeededuction->id}}">{{$employeededuction->deductionitem->name}}</label>
                    </div>

                @endforeach

            </td>
            <td><button appemployee="{{$appemployee->id}}"class="delbtn btn btn-warning">DEL</button></td>
        </tr>
    @endforeach
    </tbody>
</table>

<script>

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


    $('.form-check-input.deductioncheck').click(function(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            url: '{{url('/employees/updatedeductionstatus')}}',
            type: 'POST',

            data: {_token: CSRF_TOKEN, employeededuction_id : $(this).val()},
            dataType: 'JSON',

            success: function (data) {

                loadappemployeetable();

            }
        });



    });


    $( ".delbtn" ).click(function() {


        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '{{url('/appointments/deleteappemployee')}}',
            type: 'POST',
            data: {_token: CSRF_TOKEN,appemployee:$(this).attr('appemployee')},
            dataType: 'JSON',

            success: function (data) {
                $("#appemployees").html(data);
            }
        });

    });
</script>