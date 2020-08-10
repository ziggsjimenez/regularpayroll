<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Rate (Php)</th>
        <th>No. of days</th>
        {{--<th>Deductions</th>--}}

        @foreach($deductionitems as $deductionitem)

            <th>{{$deductionitem->name}}</th>

            @endforeach

        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php $counter=1; ?>
    @foreach($payroll->payrollitems as $payrollitem)
        <tr>
            <td><a href="{{route('payrollitems.show',$payrollitem->id)}}">{{$counter++}}</a></td>
            <td>{{$payrollitem->employee->fullname()}}</td>
            <td class="right">{{number_format($payrollitem->rate,2,'.',',')}}</td>
            <td class="right">

                {{--{{number_format($payrollitem->days,2,'.',',')}}--}}
                <input class="dayscontent" payrollitem_id="{{$payrollitem->id}}" style="width:80px;" type="text" value="{{$payrollitem->days}}" >

            </td>


                @foreach($payrollitem->employee->deductions as $employeededuction)
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input deductioncheck" id="inlineCheckbox{{$employeededuction->id}}" type="checkbox" value="{{$employeededuction->id}}" @if ($employeededuction->status=="Active") checked @endif>
                        {{--<label class="form-check-label" for="inlineCheckbox{{$employeededuction->id}}">{{$employeededuction->deductionitem->name}}</label>--}}
                    </div>
                        <br/>

                        <div class="form-check form-check-inline">
                        <input class="form-check-input deductionamount" employeedeductionid = "{{$employeededuction->id}}" id="amountinput{{$employeededuction->id}}"  maxlength="6" size="6" type="text" @if ($employeededuction->status=="Active") enabled value="{{$employeededuction->amount}}"  @else disabled @endif>
                        </div>

                </td>
                @endforeach


            <td><button payrollitem="{{$payrollitem->id}}"class="delbtn btn btn-warning">DEL</button></td>
        </tr>
    @endforeach
    </tbody>
</table>

<script>

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


    $( ".delbtn" ).click(function() {


        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            url: '{{url('/payrolls/deleteappemployee')}}',
            type: 'POST',

            data: {_token: CSRF_TOKEN,payrollitem:$(this).attr('payrollitem')},
            dataType: 'JSON',


            success: function (data) {
                $("#payrollitems").html(data);
            }
        });
    });

    $('.deductioncheck').click(function(){

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({

            url: '{{url('/employees/updatedeductionstatus')}}',
            type: 'POST',

            data: {_token: CSRF_TOKEN, employeededuction_id : $(this).val()},
            dataType: 'JSON',

            success: function (data) {
                loadappemployeetable();
//                location.reload();

            }
        });

    });


    $('.deductionamount')
        .bind('keyup', function() {

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({

                url: '{{url('/payrolls/updatedeductionamount')}}',
                type: 'POST',

                data: {_token: CSRF_TOKEN,employeedeductionid:$(this).attr('employeedeductionid'),amount:$(this).val()},
                dataType: 'JSON',

                success: function (data) {

                    console.log(data);
//                    $("#payrollitems").html(data);
                }
            });


        })

    $('.dayscontent')
        .bind('keyup', function() {

//            alert();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({

                url: '{{route('payrollitems.updatenumdays')}}',
                type: 'POST',

                data: {_token: CSRF_TOKEN,payrollitem_id:$(this).attr('payrollitem_id'),days:$(this).val()},
                dataType: 'JSON',

                success: function (data) {

                    console.log(data);
//                    $("#payrollitems").html(data);
                }
            });


        })

</script>