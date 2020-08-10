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
            <div class="modal-body mx-3">

                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="office_id" name="office_id" class="form-control validate">

                    {!! Form::select('office_id',$offices,null,['class' => 'form-control'.($errors->has('status_id') ? ' is-invalid' : ''),'placeholder'=>'Select...'])!!}

                    <label data-error="wrong" data-success="right" for="rate">Office</label>
                </div>


                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="rate" name="rate" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="rate">Rate per day(Php)</label>
                </div>

                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="position" name="position" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="position">Position</label>
                </div>

                <input type="hidden" name="appointment_id" id="appointment_id"/>
                <input type="hidden" name="employee_id" id="employee_id"/>



            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="btnsend" class="btn btn-unique">Submit <i class="fas fa-check-circle ml-1"></i></button>
            </div>
        </div>
    </div>
</div>