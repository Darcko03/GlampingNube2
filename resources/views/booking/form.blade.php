<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="customer">Cliente</label>
            <select name="customer" id="customer" class="form-control">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user">Usuario que reserva:</label>
            <select name="user" id="user" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="dome">Domo a reservar</label>
            <select name="dome" id="dome" class="form-control">
                @foreach ($domes as $dome)
                    @if ($dome->state === 0)
                        <option value="{{ $dome->id }}" data-price="{{ $dome->price }}">{{ $dome->name }}</option>
                    @else
                        <option value="{{ $dome->id }}" disabled data-price="{{ $dome->price }}">{{ $dome->name }} (No disponible)</option>
                    @endif
                @endforeach
            </select>
        </div>
        <input type="hidden" name="dome_price" id="dome_price" value="{{ $dome->price }}">

        <div class="form-group">
    {{ Form::label('Fecha inicio') }}
    {{ Form::date('start_date', $booking->start_date, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'min' => now()->format('Y-m-d'), 'id' => 'start_date']) }}
    {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('Fecha Fin') }}
    {{ Form::date('end_date', $booking->end_date, ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'min' => now()->format('Y-m-d'), 'id' => 'end_date']) }}
    {!! $errors->first('end_date', '<div class="invalid-feedback">:message</div>') !!}
</div>

        <div class="form-check">
            {{ Form::label('Servicios') }}<br>
            @foreach($services as $service)
                @php
                    $isChecked = in_array($service->id, $booking->services->pluck('id')->toArray());
                @endphp
                @if ($service->state === 0)
                    <input type="checkbox" name="services[]" value="{{ $service->id }}" id="service_{{ $service->id }}"
                           data-price="{{ $service->price }}"
                           {{ $isChecked ? 'checked' : '' }}>
                    <label for="service_{{ $service->id }}">{{ $service->name }}</label><br>
                @else
                    <input type="checkbox" name="services[]" value="{{ $service->id }}" id="service_{{ $service->id }}" disabled>
                    <label for="service_{{ $service->id }}">{{ $service->name }} (No disponible)</label><br>
                @endif
            @endforeach
        </div>

        <div class="form-group">
            {{ Form::label('subtotal') }}
            {{ Form::text('subtotal', null, ['class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => 'Subtotal', 'id' => 'subtotal']) }}
        </div>

        <div class="form-group">
            <label for="offer">Descuento:</label>
            <select name="offer" id="offer" class="form-control">
                @foreach ($offers as $offer)
                    <option value="{{ $offer->discount }}">{{ $offer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('tax') }}
            {{ Form::text('tax', null, ['class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => 'Tax', 'id' => 'tax']) }}
            {!! $errors->first('tax', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total') }}
            {{ Form::text('total', null, ['class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => 'Total', 'id' => 'total']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado de pago') }}
            {{ Form::select('state', ['0' => 'Pendiente', '1' => 'Pagado'], $booking->state, ['class' => 'form-control' . ($errors->has('state') ? ' is-invalid' : '')]) }}
            {!! $errors->first('state', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>

