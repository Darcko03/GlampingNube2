<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $dome->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::select('state', ['0' => 'Activo', '1' => 'Inactivo'], $dome->state, ['class' => 'form-control' . ($errors->has('state') ? ' is-invalid' : '')]) }}
            {!! $errors->first('state', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('price', $dome->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'precio']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Ubicacion') }}
            {{ Form::text('location', $dome->location, ['class' => 'form-control' . ($errors->has('location') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion']) }}
            {!! $errors->first('location', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('description', $dome->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Capacidad') }}
            {{ Form::text('capacity', $dome->capacity, ['class' => 'form-control' . ($errors->has('capacity') ? ' is-invalid' : ''), 'placeholder' => 'Capacidad']) }}
            {!! $errors->first('capacity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <h6><b>Selecciona características:</b></h6>
    {{--<div class="form-check">
        @foreach($characteristics as $characteristic)
        <input type="checkbox" name="characteristics[]" value="{{ $characteristic->id }}" id="characteristic_{{ $characteristic->id }}">
        <label for="characteristic_{{ $characteristic->id }}">{{ $characteristic->name }}</label><br>
        @endforeach--}}
        <div class="form-check">
            @foreach($characteristics as $characteristic)
            <input type="checkbox" name="characteristics[]" value="{{ $characteristic->id }}" id="characteristic_{{ $characteristic->id }}"
                   {{ in_array($characteristic->id, $dome->characteristics->pluck('id')->toArray()) ? 'checked' : '' }}>
            <label for="characteristic_{{ $characteristic->id }}">{{ $characteristic->name }}</label><br>
            @endforeach
        </div>
    </div>
        

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>