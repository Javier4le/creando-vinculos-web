<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('unidad_vecinal') }}
            {{ Form::text('unidad_vecinal', $juntaVecinos->unidad_vecinal, ['class' => 'form-control' . ($errors->has('unidad_vecinal') ? ' is-invalid' : ''), 'placeholder' => 'Unidad Vecinal']) }}
            {!! $errors->first('unidad_vecinal', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('sector') }}
            {{ Form::text('sector', $juntaVecinos->sector, ['class' => 'form-control' . ($errors->has('sector') ? ' is-invalid' : ''), 'placeholder' => 'Sector']) }}
            {!! $errors->first('sector', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('representante') }}
            {{ Form::text('representante', $juntaVecinos->representante, ['class' => 'form-control' . ($errors->has('representante') ? ' is-invalid' : ''), 'placeholder' => 'Representante']) }}
            {!! $errors->first('representante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $juntaVecinos->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horario') }}
            {{ Form::text('horario', $juntaVecinos->horario, ['class' => 'form-control' . ($errors->has('horario') ? ' is-invalid' : ''), 'placeholder' => 'Horario']) }}
            {!! $errors->first('horario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $juntaVecinos->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}

            <div>
                @include('layouts.partials.map')
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
