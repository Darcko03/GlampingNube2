<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Seleccione el domo') }}
            {!! Form::select('dome_id', $domes, null, ['class' => 'form-control']) !!}
            {!! $errors->first('dome_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Seleccione la caracteristica') }}
            {!! Form::select('characteristic_id', $characteristics, null, ['class' => 'form-control']) !!}
            {!! $errors->first('characteristic_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>
