
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



<table style="padding-bottom: 10px">

    <tr>
        <td class="center office bolder">{{$payrollemployee->appemployee->office->name}}</td>
    </tr>

    <tr>
        <td class="center"><span class="empname">{{$payrollemployee->fullname()}}</span> <br/>Name of Employee: </td>

    </tr>

</table>


<table>

    <tr>
        <td>Amount accrued for the period</td>
    </tr>
    <tr>
        <td style="padding-left:20px">{{$payroll->datefrom->format('M j, Y')}} - {{$payroll->dateto->format('M j, Y')}}</td>
        <td class="right">{{number_format($payrollemployee->payrollitem($payroll->id)->days,0,'.',',')}}</td>
    </tr>
    <tr>
        <td style="padding-left:20px">Daily Rate</td>

        <td class="right">{{number_format($payrollemployee->payrollitem($payroll->id)->rate,2,'.',',')}}</td>
    </tr>
    <tr>
        <td class="bolder" style="padding-left:20px">TOTAL AMOUNT DUE</td>

        <td class="deductiontotal">{{number_format($payrollemployee->payrollitem($payroll->id)->totalamountdue(),2,'.',',')}}</td>
    </tr>

    <tr>
        <td class="title">DEDUCTIONS</td>
    </tr>
    @foreach($payrollemployee->payrollitem($payroll->id)->deductions as $deduction)

        <tr>
            <td class="item">{{$deduction->deductionitem->name}}</td>
            <td class="right deductionitem">{{number_format($deduction->amount,2,'.',',')}}</td>

        </tr>

    @endforeach

    <tr>
        <td class="title">TOTAL DEDUCTIONS</td>

        <td class="amounttotal">{{number_format($payrollemployee->payrollitem($payroll->id)->totaldeductions(),2,'.',',')}}</td>
    </tr>

    <tr style="background-color: yellow">
        <td class="title">NET TAKE HOME PAY</td>

        <td class="amounttotal">{{number_format($payrollemployee->payrollitem($payroll->id)->nettakehomepay(),2,'.',',')}}</td>
    </tr>
</table>
