@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>$employee->fullname()])
@endsection

@section('customCss')

@include('layouts.css.datables')

@endsection

@section('content')
    <div class="container">

        <a class="btn btn-primary" href="{{route('employees.create')}}"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>

        @include('layouts.inc.messages')

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>DB ID</th>
               <th>Name</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Contact No.</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->fullname()}}</td>
                    <td>{{$employee->birthday}}</td>
                    <td>{{$employee->address}}</td>
                    <td>{{$employee->contact}}</td>

                </tr>


            </tbody>
        </table>

        @foreach($employee->deductions as $employeededuction)

            <div class="form-check form-check-inline">
                <input class="form-check-input deductioncheck" id="inlineCheckbox{{$employeededuction->id}}" type="checkbox" value="{{$employeededuction->id}}" @if ($employeededuction->status=="Active") checked @endif>
                <label class="form-check-label" for="inlineCheckbox{{$employeededuction->id}}">{{$employeededuction->deductionitem->name}}</label>
            </div>

        @endforeach

    </div>
@endsection

@section('customScripts')

    @include('layouts.js.datables')

    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>

    <script>

        $(document).ready(function() {

            $('.deductioncheck').click(function(){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({

                    url: '{{url('/employees/updatedeductionstatus')}}',
                    type: 'POST',

                    data: {_token: CSRF_TOKEN, employeededuction_id : $(this).val()},
                    dataType: 'JSON',

                    success: function (data) {

                        location.reload();

                    }
                });

            });

        } );

    </script>

@endsection
