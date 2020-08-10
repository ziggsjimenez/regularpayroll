<table id="employeetable">
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
                <a class="btn btn-primary" href="{{url('/appointments/'.$appointment_id.'/'.$employee->id.'/addemployee')}}"><i class="fas fa-plus-circle"></i>ADD</a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>