<?php

$todate = strtotime($payroll->dateto);
$fromdate = strtotime($payroll->datefrom);
$calculate_seconds = $todate - $fromdate; // Number of seconds between the two dates
$days = floor($calculate_seconds / (24 * 60 * 60)); // convert to days
$days = $days + 1;

?>

<table style="border: solid 1px black">
    <thead>
    <tr style="border: solid 1px black">
        <th class="center" rowspan="2" style="border: solid 1px black">#</th>
        <th class="center" rowspan="2" style="border: solid 1px black;width:150px;">Name</th>
        <th class="center" rowspan="2" style="border: solid 1px black">Designation</th>
        <th class="center" colspan="{{$days}}" style="border: solid 1px black">TIMEROLL</th>
        <th class="center" rowspan="2" style="border: solid 1px black;width:15px;">No. of days</th>
        <th class="center" rowspan="2" style="border: solid 1px black;width:25px;">Rate (Php)</th>
        <th class="center" rowspan="2" style="border: solid 1px black;width:50px;">TOTAL AMOUNT</th>
        <th class="center" colspan="{{count($deductionitems)}}" style="border: solid 1px black">DEDUCTIONS</th>
        <th class="center" rowspan="2" style="border: solid 1px black;width:50px;">TOTAL DEDUCTIONS</th>
        <th class="center" colspan="{{count($refundtypes)}}" style="border: solid 1px black;">REFUNDS</th>
        <th class="center" rowspan="2" style="border: solid 1px black;width:50px;">TOTAL REFUND</th>
        <th class="center" rowspan="2" style="border: solid 1px black;width:80px;">NET AMOUNT</th>
        <th class="center" rowspan="2" style="border: solid 1px black">#</th>
    </tr>

    <tr style="border: solid 1px black">
        <?php $date = $payroll->datefrom; $count = 1 ?>
        @for ($i = 1; $i <= $days; $i++)
            <th style="border: solid 1px black" class="center"
                @if ($date->format('D')=='Sat' || $date->format('D')=='Sun' ) style="background-color: grey"@endif>

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

        {{-- REFUND --}}

        @foreach($refundtypes as $refundtype)
            <th style="border:solid 1px black" class="center">{{$refundtype->title}}</th>
        @endforeach

    </tr>

    </thead>

    {{--table body --}}
    <tbody>

    <?php $totalamount = 0; $grandtotaldeduction = 0; $totalnetamount = 0; $countemp = 1; $grandtotalrefund = 0;?>

    @foreach($payroll->payrollitems->sortByDesc('rate') as $payrollitem)

        @php

            $fullname = "<span class=\"number\">".$payrollitem->employee->lastname."</span>".', '.$payrollitem->employee->firstname.' '.$payrollitem->employee->middlename.' '.$payrollitem->employee->extname;

        @endphp

        <tr style="border: solid 1px black">
            <td style="border: solid 1px black">{{$countemp}}</td>
            <td style="border: solid 1px black">{!! $fullname !!}</td>

            <td style="border: solid 1px black">{{$payrollitem->employee->appemployee->designation}}</td>

            <?php $date = $payroll->datefrom; $count = 1 ?>

            @for ($i = 1; $i <= $days; $i++)

                <td class="daymark center" style="border: solid 1px black"
                    @if ($date->format('D')=='Sat' || $date->format('D')=='Sun' ) style="background-color: grey"@endif>

                    @if ($date->format('D')=='Sat' || $date->format('D')=='Sun' )

                    @else
                        @if($count<=$payrollitem->days)
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

            <?php $subtotalamount = $payrollitem->rate * $payrollitem->days; $subtotaldeduction = 0; $totaldeduction = 0;  ?>

            <td style="border: solid 1px black"
                class="center number">{{number_format($payrollitem->days,0,'.',',')}}</td>

            <td style="border: solid 1px black"
                class="right number">{{number_format($payrollitem->rate,2,'.',',')}}</td>

            <td style="border: solid 1px black" class="right number">{{number_format($subtotalamount,2,'.',',')}}</td>

            @foreach($deductionitems as $deductionitem)

                @php $subtotaldeduction=$payrollitem->getdeductionamount($deductionitem->id);@endphp

                <td style="border: solid 1px black" class="right number">@if($subtotaldeduction==0)
                        - @else {{$subtotaldeduction}} @endif</td>

                <?php $totaldeduction += $subtotaldeduction; ?>

            @endforeach

            <td style="border: solid 1px black" class="right number">

                {{number_format($totaldeduction,2,'.',',')}}

            </td>

            {{--REFUNDS--}}

            <?php $totalrefund = 0; $subtotaldeduction = 0; ?>
            @foreach($refundtypes as $refundtype)
                <td style="border: solid 1px black" class="right number">

                    <?php $temp=0; ?>

                    @if($payrollitem->getRefundAmount($payrollitem->id,$refundtype->id)!=null)

                        @if($payrollitem->getRefundAmount($payrollitem->id,$refundtype->id)->amount==0)
                            -
                        @else
                            {{$payrollitem->getRefundAmount($payrollitem->id,$refundtype->id)->amount}}
                        @endif

                        <?php $subtotalrefund = $payrollitem->getRefundAmount($payrollitem->id, $refundtype->id)->amount; ?>

                    @else
                        -
                        <?php $subtotalrefund=0; ?>
                    @endif

                </td>
                <?php $totalrefund += $subtotalrefund; ?>
            @endforeach

            <td style="border:solid 1px black" class="right number">

                @if($payrollitem->refunds->sum('amount')==0)
                    -
                @else
                    {{number_format($payrollitem->refunds->sum('amount'),2,'.',',')}}
                @endif

            </td>

            {{-- end of refunds --}}

            <td style="border: solid 1px black"
                class="right number">{{number_format($subtotalamount-$totaldeduction+$payrollitem->refunds->sum('amount'),2,'.',',')}}</td>
            <td style="border: solid 1px black">{{$countemp++}}</td>

            <?php $totalamount += $subtotalamount;
            $grandtotaldeduction += $totaldeduction;
            $grandtotalrefund += $totalrefund;
            ?>

        </tr>
    @endforeach

    <tr style="border: solid 1px black">
        <td colspan="{{$days+5}}" class="center bolder" style="border: solid 1px black">TOTAL</td>

        {{--@for ($i = 1; $i <= $days; $i++)--}}
        {{--<td style="border: solid 1px black" >--}}
        {{--</td>--}}
        {{--@endfor--}}

        <td style="border: solid 1px black" class="right bolder number">{{number_format($totalamount,2,'.',',')}}</td>
        @foreach($deductionitems as $deductionitem)

            @if($payroll->totaldeduction($deductionitem->id)==0)
                <td style="border: solid 1px black" class="right bolder">-</td>
            @else
                <td style="border: solid 1px black"
                    class="right bolder number">{{number_format($payroll->totaldeduction($deductionitem->id),2,'.',',')}}</td>
            @endif

            {{--<td style="border: solid 1px black"  class="right bolder">{{number_format($payroll->totaldeduction($deductionitem->id),2,'.',',')}}</td>--}}
        @endforeach


        <td style="border: solid 1px black"
            class="right bolder number">{{number_format($grandtotaldeduction,2,'.',',')}}</td>

        @foreach($refundtypes as $refundtype)

            <td style="border: solid 1px black" class="right bolder number">
                @if(number_format($payroll->getTotalRefund($refundtype->id)==0))
                    -
                @else
                    {{number_format($payroll->getTotalRefund($refundtype->id),2,'.',',')}}
                @endif


            </td>

        @endforeach

        <td style="border: solid 1px black"
            class="right bolder number">


            @if($payroll->getGrandTotalRefund()==0)
                -
            @else
                {{number_format($payroll->getGrandTotalRefund(),2,'.',',')}}
            @endif
        </td>

        <td style="border: solid 1px black"
            class="right bolder number">{{number_format($totalamount-$grandtotaldeduction+$payroll->getGrandTotalRefund(),2,'.',',')}}</td>
        <td style="border: solid 1px black" class="right bolder"></td>

    </tr>

    </tbody>
</table>
