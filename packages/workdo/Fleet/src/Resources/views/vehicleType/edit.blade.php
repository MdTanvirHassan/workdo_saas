{{Form::model($vehicleType,array('route' => array('vehicleType.update', $vehicleType->id), 'method' => 'PUT' ,'class'=>'needs-validation','novalidate')) }}

<div class="modal-body">
    <div class="row">
        <div class="form-group col-12">
            {{ Form::label('name', __('Vehicle Type Name'),['class'=>'form-label']) }}<x-required></x-required>
            {{ Form::text('name', null, array('class' => 'form-control' ,'placeholder'=> __('Enter Vehicle Type Name') ,'required'=>'required')) }}
        </div>
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="{{__('Cancel')}}" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="{{__('Update')}}" class="btn  btn-primary">
</div>

{{Form::close()}}
