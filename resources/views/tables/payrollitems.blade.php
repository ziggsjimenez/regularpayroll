@php $count=1; @endphp

<table class="table table-bordered" style="font-size:80%">
    <thead>
    <tr>
        <th rowspan="3">#</th>
        <th rowspan="3">DB id</th>
        <th rowspan="3">Name</th>
        <th colspan="{{count($deductionitems)}}">Deduction Items - {{count($deductionitems)}}</th>
        <th rowspan="3">Action</th>
    </tr>


    <tr>
    @foreach($deductionmodecategories as $deductionmodecategory)

        <th colspan="{{count($deductionmodecategory->deductionitems)}}">{{$deductionmodecategory->name}} - {{count($deductionmodecategory->deductionitems)}}</th>

        @endforeach
    </tr>

    <tr>
        @foreach($deductionmodecategories as $deductionmodecategory)

            @foreach($deductionmodecategory->deductionitems as $deductionitem)
                <th>{{$deductionitem->name}}</th>
            @endforeach

        @endforeach
    </tr>


    </thead>

    <tbody>

    @foreach($payroll->office->employees as $employee)

        <tr>
            <td>{{$count++}}</td>
            <td>{{$employee->id}}</td>
            <td>{{$employee->fullname()}}</td>


            @foreach($deductionitems as $deductionitem)

                @foreach($employee->deductions as $employeededuction)

                    @if($employeededuction->deductionitem_id == $deductionitem->id)
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
                    @endif
                @endforeach
            @endforeach

            <td>Edit Del</td>

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

    $('.refundcheck').click(function(){

        alert($('.refundcheck').val());

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

    $('.refundamount')
        .bind('keyup', function() {



            var payrollitem_id = $(this).attr('payrollitem_id');
            var refundtype_id = $(this).attr('refundtype_id');
            var amount = $(this).val();


            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({

                url: '{{url('/payrolls/updaterefundamount')}}',
                type: 'POST',

                data: {_token: CSRF_TOKEN,payrollitem_id:payrollitem_id,refundtype_id:refundtype_id,amount:amount},
                dataType: 'JSON',

                success: function (data) {

                    console.log(data);

                }
            });

        })

</script>
