@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Preview'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

    <style>
        table, tr,td,th{
        border: solid 1px black;
        }

        .noborder{
            border: none;
        }

        .center{
            text-align:center;
        }

        .bolder{
            font-weight: bolder;
        }

        #header{
            width:100%;
        }

        .joborder{
            width: 30%;
            font-size:17px;
            font-weight: bolder;
        }

        @media print{@page {size: landscape}}

    </style>

@endsection

@section('content')


    <a class="btn btn-primary" href="{{route('payrolls.show',$payroll->id)}}"><i class="fas fa-arrow-alt-circle-left"></i> BACK</a>


    <hr/>




    <table class="noborder" id="header">
        <thead>
        <tr class="noborder">
            <th colspan="3" class="noborder center">     <br/>Republic of the Philippines<br/>
                Province of Bukidnon<br/>
                <strong>MUNICIPALITY OF MANOLO FORTICH</strong><br/>

                <h2>TIMEBOOK AND PAYROLL</h2>
                <br/></th>
        </tr>
        </thead>
        <tbody>
        <tr class="noborder">
            <td class="noborder joborder">JOB ORDER</td>
            <td class="noborder"style="width: 40%;">{{$payroll->description}}</td>
            <td class="noborder"style="width: 30%;">For the Period: {{$payroll->datefrom->format('F d, Y')}} - {{$payroll->dateto->format('F d, Y')}}</td>
        </tr>
        </tbody>
    </table>




    <?php

    $todate= strtotime($payroll->dateto);
    $fromdate= strtotime($payroll->datefrom);
    $calculate_seconds = $todate- $fromdate; // Number of seconds between the two dates
    $days = floor($calculate_seconds / (24 * 60 * 60 )); // convert to days
   $days = $days + 1;

            ?>

    <table class="table-bordered">
        <thead>
        <tr>
            <th class="center"rowspan="2">#</th>
            <th class="center"rowspan="2">Name</th>
            <th class="center"rowspan="2">Designation</th>
            <th class="center" colspan="{{$days}}">TIMEROLL</th>
            <th class="center"rowspan="2">No. of days</th>
            <th class="center"rowspan="2">Rate (Php)</th>
            <th class="center"rowspan="2">TOTAL AMOUNT</th>
            <th class="center"colspan="{{count($deductionitems)}}">DEDUCTIONS</th>
            <th class="center"rowspan="2">TOTAL DEDUCTIONS</th>
            <th colspan="{{count($refundtypes)}}">Refunds</th>
            <th class="center"rowspan="2">NET AMOUNT</th>
        </tr>

        <tr>
            <?php $date = $payroll->datefrom; $count=1 ?>
            @for ($i = 1; $i <= $days; $i++)
                <th class="center" @if ($date->format('D')=='Sat' || $date->format('D')=='Sun' ) style="background-color: grey"@endif>

                    {{$date->format('M d')}}

                </th>
                <?php
                $date = $payroll->datefrom;
                $date = $date->addDays($i);
                ?>
            @endfor

            @foreach($deductionitems as $deductionitem)
                <th class="center">{{$deductionitem->name}}</th>
            @endforeach
        </tr>

        </thead>

        {{--table body --}}
        <tbody>

        <?php $totalamount=0; $grandtotaldeduction = 0; $totalnetamount = 0; $countemp=1;?>

        @foreach($payroll->payrollitems as $payrollitem)

            <tr>

                <td>{{$countemp++}}</td>
                <td>{{$payrollitem->employee->fullname()}}</td>

                <td>{{$payrollitem->employee->appemployee->position}}</td>

                <?php $date = $payroll->datefrom; $count=1 ?>

                @for ($i = 1; $i <= $days; $i++)

                    <td class="center daymark" @if ($date->format('D')=='Sat' || $date->format('D')=='Sun' ) style="background-color: grey"@endif>

                        @if ($date->format('D')=='Sat' || $date->format('D')=='Sun' )

                        @else
                            @if($count<=$payrollitem->days)
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

                <?php $subtotalamount = $payrollitem->rate*$payrollitem->days; $subtotaldeduction=0; $totaldeduction=0;  ?>

                <td class="right">{{number_format($payrollitem->days,2,'.',',')}}</td>

                <td class="right">{{number_format($payrollitem->rate,2,'.',',')}}</td>

                <td class="right">{{number_format($subtotalamount,2,'.',',')}}</td>

                @foreach($deductionitems as $deductionitem)

                    @php $subtotaldeduction=$payrollitem->deductions->where('deductionitem_id','=',$deductionitem->id)->first()['amount'];@endphp

                    <td class="right">{{$subtotaldeduction}}</td>

                    <?php $totaldeduction+=$subtotaldeduction; ?>

                @endforeach

                <td class="right">{{number_format($totaldeduction,2,'.',',')}}</td>

                <td class="right">{{number_format(($subtotalamount)-$totaldeduction,2,'.',',')}}</td>

                {{--refunds --}}

                @foreach($refundtypes as $refundtype)
                    <td>

                        @if($payrollitem->refunds->where('refundtype_id','=',$refundtype->id)->first()['amount']!=null)

                            <input class="refundamount" refundtype_id = "{{$refundtype->id}}" payrollitem_id="{{$payrollitem->id}}" style="width:50px;" type="text" value="{{$payrollitem->refunds->where('refundtype_id','=',$refundtype->id)->first()['amount']}}" >

                        @else

                            <input class="refundamount" refundtype_id = "{{$refundtype->id}}" payrollitem_id="{{$payrollitem->id}}" style="width:50px;" type="text" >

                        @endif

                    </td>
                @endforeach

                {{--end of refunds--}}

                <?php $totalamount+=$subtotalamount;
                $grandtotaldeduction+=$totaldeduction; ?>

            </tr>
        @endforeach



        <tr>
            <td></td>
            <td></td>
            <td></td>
            @for ($i = 1; $i <= $days; $i++)
                <td>
                </td>
            @endfor
            <td class="right"></td>
            <td class="right"></td>
            <td class="right bolder">{{number_format($totalamount,2,'.',',')}}</td>
            @foreach($deductionitems as $deductionitem)
                <td class="right bolder">{{number_format($payroll->totaldeduction($deductionitem->id),2,'.',',')}}</td>
            @endforeach
            <td class="right bolder">{{number_format($grandtotaldeduction,2,'.',',')}}</td>
            <td class="right bolder">{{number_format($totalamount-$grandtotaldeduction,2,'.',',')}}</td>
        </tr>

        </tbody>
    </table>

    @include('payrolls.print.footer')

@endsection

@section('customScripts')

<script>
    $(document).ready(function() {

        $( ".daymark" ).click(function() {


            if ($(this).html()=="")
                $(this).html('<i class="fas fa-times"></i>');
            else
                $(this).html("");

        });

    } );
</script>
@endsection
