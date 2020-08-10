<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OBR - {{$payroll->description}}</title>


    <script src="{{asset('public/fontawesome/js/all.js')}}"></script>

    <link href="{{ asset('public/fontawesome/css/all.css') }}" rel="stylesheet">

    <style>


        body {
            font-family: Arial;

        }

        .center {
            text-align: center;
        }


        table {
            width: 7.5in;
        }

        tr, td {
            width: 100%;
        }


        .bolder {
            font-weight: bolder;
        }


        .withborder{
            border: 1px solid black;
        }

        table,tr,td{
            border-collapse: collapse;
        }

        .label{
            width: 15%;
        }
        .signature{
            width:35%;
        }


        @media print {
            body
            {
                margin: .25in .5in .25in .5in;
            }
        }

        .obr{
            font-weight: bolder;
            font-size:30px;
            padding: 30px;

        }

        .payee{
            text-decoration: underline;
            font-weight: bolder;
        }

        .nonpayee{
            text-decoration: underline ;
        }

        .particulars{

            padding: 1.75in 0in 1.75in 0in;
        }

        .footertable{
            padding: .25in 0in .25in 0in;
        }

    </style>

</head>
<body>


<table style="padding-bottom: 20px">
    <tr>
        <td style="width: 85px"><img style="width: 80px;" src="{{asset('public/storage/seal1917.png')}}"></td>
        <td class="center" style="padding-left:10px">
            Republic of the Philippines<br/>
            Province of Bukidnon <br/>
            Municipality of Manolo Fortich <br/>
        </td>
    </tr>
</table>

<table style="padding-bottom: 20px">
    <tr>
        <td class="obr" style="width: 60%">OBLIGATION REQUEST</td>
        <td>No: <br/>
        Date: </td>
    </tr>
</table>

<table>
        <tr><td style="width:20%">Payee: </td> <td class="payee">{{$payroll->chargeability->name}}</td> </tr>
        <tr><td style="width:20%">Office: </td><td> </td> </tr>
        <tr><td style="width:20%">Address </td><td class="nonpayee"> Manolo Fortich, Bukidnon</td></tr>
</table>

<table style="margin-top: 30px">
    <thead>
    <tr>
        <th class="withborder center" style="width:10%">Responsiblity Center</th>
        <th class="withborder center" style="width:40%">Particulars</th>
        <th class="withborder center" style="width:10%">F.P.P.</th>
        <th class="withborder center" style="width:20%">Account Code</th>
        <th class="withborder center" style="width:20%">Amount</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="withborder center" style="width:10%"></td>
        <td class="withborder center particulars" style="width:40%"> Wages for the period of {{$payroll->datefrom->format('F d')}} - {{$payroll->dateto->format('F d, Y')}}</td>
        <td class="withborder center" style="width:10%"></td>
        <td class="withborder center" style="width:20%"></td>
        <td class="withborder center" style="width:20%">{{number_format($payroll->totalamount(),2,'.',',')}}</td>
    </tr>

    <tr>
        <td class="withborder center" colspan="4"> TOTAL </td>
        <td class="withborder center" style="width:20%">{{number_format($payroll->totalamount(),2,'.',',')}}</td>
    </tr>
    </tbody>
</table>


<table>
    <tr><td class="withborder center" style="width:5%">A</td>
        <td class="withborder" style="width: 40%"> CERTIFIED </td>
        <td class="withborder center" style="width:5%">B</td>
        <td class="withborder" style="width: 40%"> CERTIFIED </td>
    </tr>
</table>

<table>
    <tr>
        <td class="withborder" style="width: 50%;padding-top: 20px;padding-bottom: 20px"><i class="far fa-check-square fa-2x"></i> Charges to appropriation/allotment, lawful and under my direct supervision.<br/>
            <i class="far fa-check-square fa-2x"></i>Supporting documents valid, proper and legal.</td>
        <td class="withborder" style="width: 50%;padding-top: 20px;padding-bottom: 20px"><i class="far fa-check-square fa-2x"></i>Existence of available appropriation:</td>
    </tr>
</table>



<table class="withborder">
    <tr>
        <td style="padding-top: 50px" class="label">Signature:</td>
        <td class="signature"></td>
        <td class="label"></td>
        <td class="signature"> </td>
    </tr>
    <tr>
        <td class="label">Printed Name: </td>
        <td class="center bolder signature">{{$payroll->chargeability->headofoffice}}</td>
        <td class="label">Printed Name: </td>
        <td class="center bolder signature">GRAHAM F. DELCO</td>
    </tr>
    <tr>
        <td class="label">Position: </td>
        <td class="center bolder signature">{{$payroll->chargeability->position}}</td>
        <td class="label">Position: </td>
        <td class="center bolder signature">OIC - Municipal Budget Officer</td>
    </tr>
    <tr>
        <td class="label">Date: </td>
        <td class="center bolder signature"></td>
        <td class="label">Date: </td>
        <td class="center bolder signature"></td>
    </tr>

</table>


</body>
</html>




