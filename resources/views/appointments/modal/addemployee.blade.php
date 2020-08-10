<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Appointment - Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="modalform" id="modalform">
            <div class="modal-body mx-3">


                <div class="md-form">
                    <label data-error="wrong" data-success="right" for="office_id">Office</label>
                    {!! Form::select('office_id',$offices,null,['id'=>'office_id','name'=>'office_id','class' => 'form-control'.($errors->has('office_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}

                </div>

                <div class="md-form">
                    <label data-error="wrong" data-success="right" for="designation">Designation</label>

                    <input type="text" id="designation" name="designation" class="form-control validate">
                </div>

                <div class="md-form">
                    <label data-error="wrong" data-success="right" for="monthlyrate">Monthly Rate</label>
                    <input type="number" id="monthlyrate" name="monthlyrate" class="form-control validate">
                </div>

                <div class="md-form">
                    <label data-error="wrong" data-success="right" for="salarygrade">Salary Grade</label>
                    <input type="number" id="salarygrade" name="salarygrade" class="form-control validate">
                </div>

                <div class="md-form">
                    <label data-error="wrong" data-success="right" for="datefrom">Start Date</label>
                    <input type="date" id="datefrom" name="datefrom" class="form-control validate">

                </div>

                <div class="md-form">
                    <label data-error="wrong" data-success="right" for="dateto">End Date</label>
                    <input type="date" id="dateto" name="dateto" class="form-control validate">

                </div>

                <div class="md-form">
                    <label data-error="wrong" data-success="right" for="status">Status</label>
                    <input type="text" id="status" name="status" class="form-control validate">

                </div>

                <div class="md-form">
                    <label data-error="wrong" data-success="right" for="remarks">Remarks</label>
                    <input type="text" id="remarks" name="remarks" class="form-control validate">

                </div>

                <input type="hidden" name="appointment_id" id="appointment_id"/>
                <input type="hidden" name="employee_id" id="employee_id"/>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="btnsend" class="btn btn-primary">Add <i class="fas fa-check-circle ml-1"></i></button>
            </div>
            </form>

        </div>
    </div>
</div>