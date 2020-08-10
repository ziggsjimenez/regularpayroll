<a class="btn btn-primary" href="{{route('payrolls.create')}}"><i class="fas fa-plus-circle"></i> ADD </a>

<hr/>

<table id="datatable" class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Reference Number</th>
        <th>Description</th>
        <th>Chargeability</th>
        <th>Status</th>
        <th>From</th>
        <th>To</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php $count=1; ?>
    @foreach($payrolls as $payroll)

        <tr>
            <td>{{$count++}}</td>
            <td>{{$payroll->refnum}}</td>
            <td style="width: 300px;">{{$payroll->description}}</td>
            <td style="width: 300px;">{{$payroll->chargeability->name}}</td>
            <td>{{$payroll->status->name}}</td>
            <td>{{$payroll->datefrom->format('M d, Y')}}</td>
            <td>{{$payroll->dateto->format('M d, Y')}}</td>
            <td>
                <form style="display:inline-block" class="form form-inline" action="{{route('payrolls.copypayroll')}}" method="post" >
                    @csrf
                    <input name="payroll_id" type="hidden" value="{{$payroll->id}}"/>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-copy"></i> COPY </button>

                </form>



                <a class="btn btn-warning" href="{{route('payrolls.edit',$payroll->id)}}"><i class="fas fa-pen"></i> EDIT</a>
                <a class="btn btn-success" href="{{route('payrolls.show',$payroll->id)}}"><i class="fas fa-search"></i> VIEW</a>

                @if($payroll->status_id!=2)

                    <form style="display:inline-block"  class="form form-inline" action="{{route('payrolls.destroy',['payroll'=>$payroll->id])}}" method="post" >
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i> DELETE</button>
                    </form>

                @endif



            </td>
        </tr>
    @endforeach

    </tbody>
</table>