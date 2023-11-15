<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $cliente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('crédito') }}
            {{ Form::text('credito', $cliente->credito, ['class' => 'form-control' . ($errors->has('credito') ? ' is-invalid' : ''), 'placeholder' => 'Crédito']) }}
            {!! $errors->first('credito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('deuda') }}
            {{ Form::text('deuda', $cliente->deuda, ['class' => 'form-control' . ($errors->has('deuda') ? ' is-invalid' : ''), 'placeholder' => 'Deuda']) }}
            {!! $errors->first('deuda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado', 'Estado') }}
            {{ Form::select('estado', ['SINALOA' => 'Sinaloa', 'SONORA' => 'Sonora', 'DURANGO' => 'Durango', 'BC' => 'Baja California'], $cliente->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : '')]) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('vigencia', 'Vigencia') }}
            {{ Form::text('vigencia', $cliente->vigencia ?? 'A', ['class' => 'form-control' . ($errors->has('vigencia') ? ' is-invalid' : ''), 'placeholder' => 'Vigencia', 'readonly' => 'readonly']) }}
            {!! $errors->first('vigencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer text-center">
        <br>
        <button type="submit" class="btn btn-warning">{{ __('Enviar') }}</button>
    </div>
</div>