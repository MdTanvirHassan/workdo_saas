{{ Form::model($attendance, ['route' => ['attendance.update', $attendance->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate']) }}
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('employee_id', __('Employee'), ['class' => 'form-label']) }}<x-required></x-required>
                {{ Form::select('employee_id', $employees, null, ['class' => 'form-control ', 'required' => 'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('date', __('Date'), ['class' => 'form-label']) }}<x-required></x-required>
                {{ Form::date('date', null, ['class' => 'form-control ', 'required' => 'required', 'placeholder' => __('Select Date')]) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('clock_in', __('Clock In'), ['class' => 'form-label']) }}<x-required></x-required>
                {{ Form::time('clock_in', null, ['class' => 'form-control timepicker', 'required' => 'required']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('clock_out', __('Clock Out'), ['class' => 'form-label']) }}<x-required></x-required>
                {{ Form::time('clock_out', null, ['class' => 'form-control timepicker', 'required' => 'required']) }}
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
    {{ Form::submit(__('Update'), ['class' => 'btn  btn-primary']) }}
</div>
{{ Form::close() }}
