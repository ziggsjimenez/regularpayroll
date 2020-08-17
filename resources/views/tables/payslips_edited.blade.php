
<table>
    <tr>
        <td style="width: 85px"><img style="width: 80px;" src="{{asset('public/storage/seal1917.png')}}"></td>
        <td style="padding-left:10px">
            Republic of the Philippines<br/>
            Province of Bukidnon <br/>
            Municipality of Manolo Fortich <br/>
        </td>
    </tr>

</table>



<table style="padding-bottom: 5px">

    <tr>
        <td class="center office bolder">{{$payrollitem->employee->appemployee->office->name}}</td>
    </tr>

    <tr>
        <td class="center"><span class="empname">{{$payrollitem->employee->fullname()}}</span> <br/>Name of Employee: </td>

    </tr>

</table>


<table>

    <tr>
        <td>
            PRN: {{$payrollitem->payroll->refnum}}
        </td>
    </tr>

    <tr>
        <td>Amount accrued for the period</td>
    </tr>
    <tr>
        <td style="padding-left:20px">{{$payroll->datefrom->format('M j, Y')}} - {{$payroll->dateto->format('M j, Y')}}</td>
        <td class="right">{{number_format($payrollitem->days,0,'.',',')}}</td>
    </tr>
    <tr>
        <td style="padding-left:20px">Daily Rate</td>

        <td class="right">{{number_format($payrollitem->rate,2,'.',',')}}</td>
    </tr>
    <tr>
        <td class="bolder" style="padding-left:20px">TOTAL AMOUNT DUE</td>

        <td class="deductiontotal">{{number_format($payrollitem->totalamountdue(),2,'.',',')}}</td>
    </tr>

    <tr>
        <td class="title">LESS: DEDUCTIONS</td>
    </tr>

@foreach($deductionitems as $deductionitem)
        <tr>
            <td class="item">{{$deductionitem->name}}</td>
                <td>
                    @foreach($payrollitem->deductions as $deduction)
                        @if($deductionitem->id==$deduction->deductionitem_id)
                            {{ $deduction->amount }}
                        @endif
                    @endforeach
                </td>
        </tr>
@endforeach

    <tr>
        <td class="title">TOTAL DEDUCTIONS</td>

        <td class="amounttotal">{{number_format($payrollitem->totaldeductions(),2,'.',',')}}</td>
    </tr>

    <tr>
        <td class="title">ADD: REFUND</td>
    </tr>


    @foreach($payrollitem->refunds as $refund)

        <tr>
            <td class="item">{{$refund->refundtype->title}}</td>
            <td class="right deductionitem">{{number_format($refund->amount,2,'.',',')}}</td>

        </tr>

    @endforeach

    <tr>
        <td class="title">TOTAL REFUND</td>

        <td class="amounttotal">{{number_format($payrollitem->totalrefunds(),2,'.',',')}}</td>
    </tr>




    <tr style="background-color: yellow">
        <td class="title">NET TAKE HOME PAY</td>

        <td class="amounttotal">{{number_format($payrollitem->nettakehomepay(),2,'.',',')}}</td>
    </tr>
</table>

<table>
    <tr>
        <td style="width:50%;">
            Payroll Incharge: <br/>
            <img width="100px" src="{{asset('/public/storage/MI_27072020_080953.png')}}"/>
        </td>
        <td style="width:50%; vertical-align: top;">Payslip received by: </td>
    </tr>
</table>
