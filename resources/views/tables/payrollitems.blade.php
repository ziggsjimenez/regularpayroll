<table class="table table-bordered" style="font-size:80%">
    <thead>
    <tr>
        <th rowspan="2">#</th>
        <th rowspan="2">Name</th>
        <th rowspan="2">Rate (Php)</th>
        <th rowspan="2">No. of days</th>
        <th colspan="{{count($deductionitems)}}">Deductions</th>
        <th colspan="{{count($refundtypes)}}">Refunds</th>
        <th rowspan="2">Action</th>
    </tr>
    <tr>
        @foreach($deductionitems as $deductionitem)

            <th>{{$deductionitem->name}}</th>

        @endforeach


        @foreach($refundtypes as $refundtype)

            <th>{{$refundtype->title}}</th>

        @endforeach
    </tr>
    </thead>
    <tbody>

    <?php $counter=1; ?>
    @foreach($payroll->payrollitems as $payrollitem)
        @php
            $fullname = "<span class=\"number\">".$payrollitem->employee->lastname."</span>".', '.$payrollitem->employee->firstname.' '.$payrollitem->employee->middlename.' '.$payrollitem->employee->extname;
        @endphp

        <tr>
            <td><a href="{{route('payrollitems.show',$payrollitem->id)}}">{{$counter++}}</a></td>
            <td>{!! $fullname !!}</td>
            <td class="right">{{number_format($payrollitem->rate,2,'.',',')}}</td>
            <td class="right">
                <input class="dayscontent" payrollitem_id="{{$payrollitem->id}}" style="width:80px;" type="text" value="{{$payrollitem->days}}" >
            </td>

            @foreach($deductionitems as $deductionitem)

                @foreach($payrollitem->employee->deductions as $employeededuction)

                    @if($employeededuction->deductionitem_id == $deductionitem->id)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input deductioncheck" id="inlineCheckbox{{$employeededuction->id}}" type="checkbox" value="{{$employeededuction->id}}" @if ($employeededuction->status=="Active") checked @endif>
                            <label class="form-check-label" for="inlineCheckbox{{$employeededuction->id}}">{{$employeededuction->deductionitem->name}}</label>
                        </div>
                        <br/>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input deductionamount" employeedeductionid = "{{$employeededuction->id}}" id="amountinput{{$employeededuction->id}}"  maxlength="6" size="6" type="text" @if ($employeededuction->status=="Active") enabled value="{{$employeededuction->amount}}"  @else disabled @endif>
                        </div>

                    </td>
                    @endif
                @endforeach

            @endforeach


            @foreach($refundtypes as $refundtype)
                        <td>

                            @if($payrollitem->refunds->where('refundtype_id','=',$refundtype->id)->first()['amount']!=null)

                                <input class="refundamount" refundtype_id = "{{$refundtype->id}}" payrollitem_id="{{$payrollitem->id}}" style="width:50px;" type="text" value="{{$payrollitem->refunds->where('refundtype_id','=',$refundtype->id)->first()['amount']}}" >

                            @else

                                <input class="refundamount" refundtype_id = "{{$refundtype->id}}" payrollitem_id="{{$payrollitem->id}}" style="width:50px;" type="text" >

                            @endif

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