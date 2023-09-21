<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('permission_id') }}
            {!! Form::select('permission_id', $Permissions, null, ['class' => 'form-control']) !!}
            {!! $errors->first('permission_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('role_id') }}
            {!! Form::select('role_id', $Roles, null, ['class' => 'form-control']) !!}
            {!! $errors->first('role_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>