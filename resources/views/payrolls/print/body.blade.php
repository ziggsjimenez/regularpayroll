<?php

$todate= strtotime($payroll->dateto);
$fromdate= strtotime($payroll->datefrom);
$calculate_seconds = $todate- $fromdate; // Number of seconds between the two dates
$days = floor($calculate_seconds / (24 * 60 * 60 )); // convert to days
$days = $days + 1;

?>

<table style="border: solid 1px black">
    <thead>
    <tr style="border: solid 1px black">
        <th class="center"rowspan="2" style="border: solid 1px black">#</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:150px;">Name</th>
        <th class="center"rowspan="2" style="border: solid 1px black">Designation</th>
        <th class="center" colspan="{{$days}}" style="border: solid 1px black">TIMEROLL</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:15px;">No. of days</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:25px;">Rate (Php)</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:50px;">TOTAL AMOUNT</th>
        <th class="center"colspan="{{count($deductionitems)}}" style="border: solid 1px black">DEDUCTIONS</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:50px;">TOTAL DEDUCTIONS</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:80px;">NET AMOUNT</th>
        <th class="center"rowspan="2" style="border: solid 1px black">#</th>
        <th class="center"rowspan="2" style="border: solid 1px black;width:150px;">SIGNATURE</th>
    </tr>

    <tr style="border: solid 1px black">
        <?php $date = $payroll->datefrom; $count=1 ?>
        @for ($i = 1; $i <= $days; $i++)
            <th style="border: solid 1px black" class="center" @if ($date->format('D')=='Sat' || $date->format('D')=='Sun' ) style="background-color: grey"@endif>

                {{$date->format('d')}}

            </th>
            <?php
            $date = $payroll->datefrom;
            $date = $date->addDays($i);
            ?>
        @endfor

        @foreach($deductionitems as $deductionitem)
            <th style="border: solid 1px black" class="center">{{$deductionitem->name}}</th>
        @endforeach
    </tr>

    </thead>

    {{--table body --}}
    <tbody>

    <?php $totalamount=0; $grandtotaldeduction = 0; $totalnetamount = 0; $countemp=1;?>

    {{--@foreach($payroll->payrollemployees as $payrollitem)--}}
        @foreach($payroll->payrollitems as $payrollitem)

        <tr style="border: solid 1px black">

            <td style="border: solid 1px black">{{$countemp}}</td>
            <td style="border: solid 1px black">{{$payrollitem->employee->fullname()}}</td>

            <td style="border: solid 1px black">{{$payrollitem->appemployee->designation}}</td>

            <?php $date = $payroll->datefrom; $count=1 ?>

            @for ($i = 1; $i <= $days; $i++)

                <td  class="daymark center" style="border: solid 1px black" @if ($date->format('D')=='Sat' || $date->format('D')=='Sun' ) style="background-color: grey"@endif>

                    @if ($date->format('D')=='Sat' || $date->format('D')=='Sun' )

                    @else
                        @if($count<=$payrollitem->payrollitem($payroll->id)->days)
                            {{--<button class="daymark"><i class="fas fa-times"></i></button>--}}
                            <i class="fas fa-times"></i>
                        @endif
                        @php $count++; @endphp
                    @endif

                </td>
                <?php

                $date = $payroll->datefrom;

                $date = $date->addDays($i);

                ?>

            @endfor

            <?php $subtotalamount = $payrollitem->payrollitem($payroll->id)->rate*$payrollitem->payrollitem($payroll->id)->days; $subtotaldeduction=0; $totaldeduction=0;  ?>

            <td  style="border: solid 1px black" class="center">{{number_format($payrollitem->payrollitem($payroll->id)->days,0,'.',',')}}</td>

            <td style="border: solid 1px black" class="right">{{number_format($payrollitem->payrollitem($payroll->id)->rate,2,'.',',')}}</td>

            <td style="border: solid 1px black" class="right">{{number_format($subtotalamount,2,'.',',')}}</td>

            @foreach($deductionitems as $deductionitem)

                @php $subtotaldeduction=$payrollitem->payrollitem($payroll->id)->deductions->where('deductionitem_id','=',$deductionitem->id)->first()['amount'];@endphp

                <td style="border: solid 1px black" class="right">{{$subtotaldeduction}}</td>

                <?php $totaldeduction+=$subtotaldeduction; ?>

            @endforeach

            <td style="border: solid 1px black" class="right">

                {{number_format($totaldeduction,2,'.',',')}}

            </td>

            <td style="border: solid 1px black" class="right">{{number_format(($subtotalamount)-$totaldeduction,2,'.',',')}}</td>
            <td style="border: solid 1px black">{{$countemp++}}</td>
            <td></td>

            <?php $totalamount+=$subtotalamount;
            $grandtotaldeduction+=$totaldeduction; ?>

        </tr>
    @endforeach

    <tr style="border: solid 1px black" >
        <td colspan="{{$days+5}}" class="center bolder" style="border: solid 1px black" >TOTAL</td>

        {{--@for ($i = 1; $i <= $days; $i++)--}}
        {{--<td style="border: solid 1px black" >--}}
        {{--</td>--}}
        {{--@endfor--}}

        <td style="border: solid 1px black"  class="right bolder">{{number_format($totalamount,2,'.',',')}}</td>
        @foreach($deductionitems as $deductionitem)

            @if($payroll->totaldeduction($deductionitem->id)==0)
                <td style="border: solid 1px black"  class="right bolder">-</td>
            @else
                <td style="border: solid 1px black"  class="right bolder">{{number_format($payroll->totaldeduction($deductionitem->id),2,'.',',')}}</td>
            @endif

            {{--<td style="border: solid 1px black"  class="right bolder">{{number_format($payroll->totaldeduction($deductionitem->id),2,'.',',')}}</td>--}}
        @endforeach
        <td style="border: solid 1px black"  class="right bolder">{{number_format($grandtotaldeduction,2,'.',',')}}</td>
        <td style="border: solid 1px black"  class="right bolder">{{number_format($totalamount-$grandtotaldeduction,2,'.',',')}}</td>
        <td style="border: solid 1px black"  class="right bolder"></td>
        <td style="border: solid 1px black"  class="right bolder"></td>
    </tr>

    </tbody>
</table>