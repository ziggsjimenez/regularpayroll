@extends('layouts.auth')

@section('customTitle')
    @include('layouts.inc.title',['title'=>'Employees Index'])
@endsection

@section('customCss')

    @include('layouts.css.datables')

@endsection

@section('content')


        <a class="btn btn-primary" href="{{route('employees.create')}}"><i class="fas fa-plus-circle"></i> ADD </a>

        <hr/>

        @include('layouts.inc.messages')

        <table id="datatable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Extname</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Deductions</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $count=1;?>
            @foreach($employees as $employee)
                <tr>
                    <td>{{$count++}}</td>
                    <td>{{$employee->lastname}}</td>
                    <td>{{$employee->firstname}}</td>
                    <td>{{$employee->middlename}}</td>
                    <td>{{$employee->extname}}</td>
                    <td>{{$employee->birthday}}</td>
                    <td>{{$employee->address}}</td>
                    <td>{{$employee->contact}}</td>

                    <td>
                        @foreach($employee->deductions as $employeededuction)

                            <div class="form-check form-check-inline">
                                <input class="form-check-input deductioncheck" id="inlineCheckbox{{$employeededuction->id}}" type="checkbox" value="{{$employeededuction->id}}" @if ($employeededuction->status=="Active") checked @endif>
                                <label class="form-check-label" for="inlineCheckbox{{$employeededuction->id}}">{{$employeededuction->deductionitem->name}}</label>
                            </div>

                        @endforeach
                    </td>

                    <td>

                        <a class="btn btn-warning" href="{{route('employees.edit',$employee->id)}}"><i class="fas fa-pen"></i> EDIT</a>
                        <a class="btn btn-warning" href="{{route('employees.show',$employee->id)}}"><i class="fas fa-search"></i> VIEW</a>

                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>


@endsection

@section('customScripts')

    @include('layouts.js.datables')

    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>

    <script>

        $(document).ready(function() {

            $('#datatable').DataTable();

            $('.alert').alert();

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
