
<div class="box box-info padding-1">

    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Identificacion') }}
            {{ Form::text('id_card', $person->id_card, ['class' => 'form-control' . ($errors->has('id_card') ? ' is-invalid' : ''), 'placeholder' => 'Identificacion']) }}
            {!! $errors->first('id_card', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Direccion') }}
            {{ Form::text('addres', $person->addres ?: 'N/A', ['class' => 'form-control' . ($errors->has('addres') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('addres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Grupo de Trabajo') }}
            {{ Form::select('team_works_id', $teamWorks, $person->team_works_id, ['class' => 'form-control' . ($errors->has('team_works_id') ? ' is-invalid' : ''), 'placeholder' => 'Grupo de trabajo']) }}
            {!! $errors->first('team_works_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Numero Celular') }}
            {{ Form::select('number_phones_id',$numberPhones, $person->number_phones_id, ['class' => 'form-control' . ($errors->has('number_phones_id') ? ' is-invalid' : ''), 'placeholder' => 'Numero Celular']) }}
            {!! $errors->first('number_phones_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Ciudad') }}
            {{ Form::select('towns_id', $towns, $person->towns_id, ['class' => 'form-control' . ($errors->has('towns_id') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad']) }}
            {!! $errors->first('towns_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Usuario') }}
            {{ Form::select('users_id', $users, $person->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <br><button type="submit" class="btn btn-primary" onclick="return confirm('¿Está seguro de que desea editar a la persona?')" >{{ __('Crear') }}</button>
    </div>
</div>
