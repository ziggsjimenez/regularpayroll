<!DOCTYPE html>
<html>

<head>
    <title>PRINT - {{$payroll->description}}</title>

    <script src="{{asset('public/js/app.js')}}"></script>

    <script src="{{asset('public/fontawesome/js/all.js')}}"></script>



    <link href="{{ asset('public/fontawesome/css/all.css') }}" rel="stylesheet">

    <style>

        /* Styles go here */

        .page-header, .page-header-space {
            height: 130px;
        }

        .page-footer, .page-footer-space {
            height: 230px;

        }

        .page-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 1px solid black; /* for demo */
            background: white; /* for demo */
        }

        .page-header {
            position: fixed;
            top: 0mm;
            width: 100%;
            border-bottom: 1px solid black; /* for demo */
            background: white; /* for demo */
        }

        .page {
            page-break-after: always;
        }

        @page {
            margin: 20mm
        }

        @media print {
            thead {display: table-header-group;}
            tfoot {display: table-footer-group;}

            button {display: none;}

            body {margin: 20px;}
        }

        table, tr, td {
            border-collapse: collapse;
        }

        td{

            font-family: Arial;
            font-size: 10px;
            text-align: left;
            text-transform: uppercase;
            height: 15px;
        }

        withborder {
            border: solid 1px black;
        }

        .center{
            text-align: center;
        }

        .right{
            text-align: right;
        }

        .bolder{
            font-weight: bolder;
        }
        .page-footer{

            font-size: 10px;
        }

        img{
            position:absolute;
            width:80px;
            top:15px;
            left:150px;
        }

        .number{

            font-size:14px;
        }

    </style>
</head>



<body>



<div class="page-header">
    <img src="{{asset('public/storage/seal1917.png')}}">

    <div class="center">
        @include('payrolls.print.header')

    </div>
    <br/>

</div>

<div class="page-footer">
    @include('payrolls.print.footer')
</div>

<table>

    <thead>
    <tr>
        <td>
            <!--place holder for the fixed-position header-->
            <div class="page-header-space"></div>
        </td>
    </tr>
    </thead>

    <tbody>
    <tr>
        <td>
            <!--*** CONTENT GOES HERE ***-->


            <div class="page">

@include('payrolls.print.body_orig')




            </div>

        </td>
    </tr>
    </tbody>

    <tfoot>
    <tr>
        <td>
            <!--place holder for the fixed-position footer-->
            <div class="page-footer-space"></div>
        </td>
    </tr>
    </tfoot>

</table>
<script src="{{asset('public/js/jquery.js')}}"></script>
<script>
    $(document).ready(function() {

        $( ".daymark" ).click(function() {

            if ($(this).html()=="")
                $(this).html('<i class="fas fa-times"></i>');
            else
                $(this).html("");

        });

        $( "#btntest" ).click(function() {


            if ($(this).html()=="")
                $(this).html('<i class="fas fa-times"></i>');
            else
                $(this).html("");

        });

    } );
</script>

</body>

</html>
