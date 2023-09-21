<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $customer->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Apellido') }}
            {{ Form::text('last_name', $customer->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $customer->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Numero de telefono') }}
            {{ Form::text('phone_number', $customer->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Numero de telefono']) }}
            {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cumpleaños') }}
            {{ Form::date('birthdate', $customer->birthdate, ['class' => 'form-control' . ($errors->has('birthdate') ? ' is-invalid' : ''), 'placeholder' => 'Cumpleaños']) }}
            {!! $errors->first('birthdate', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Ciudad') }}
            {{ Form::text('city', $customer->city, ['class' => 'form-control' . ($errors->has('city') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad']) }}
            {!! $errors->first('city', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Direccion') }}
            {{ Form::text('address', $customer->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>