<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('id_card') }}
            {{ Form::text('id_card', $person->id_card, ['class' => 'form-control' . ($errors->has('id_card') ? ' is-invalid' : ''), 'placeholder' => 'Id Card']) }}
            {!! $errors->first('id_card', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('addres') }}
            {{ Form::text('addres', $person->addres, ['class' => 'form-control' . ($errors->has('addres') ? ' is-invalid' : ''), 'placeholder' => 'Addres']) }}
            {!! $errors->first('addres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('team_works_id') }}
            {{ Form::select('team_works_id', $teamWorks, $person->team_works_id, ['class' => 'form-control' . ($errors->has('team_works_id') ? ' is-invalid' : ''), 'placeholder' => 'Team Works Id']) }}
            {!! $errors->first('team_works_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('number_phones_id') }}
            {{ Form::select('number_phones_id',$numberPhones, $person->number_phones_id, ['class' => 'form-control' . ($errors->has('number_phones_id') ? ' is-invalid' : ''), 'placeholder' => 'Number Phones Id']) }}
            {!! $errors->first('number_phones_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('towns_id') }}
            {{ Form::select('towns_id', $towns, $person->towns_id, ['class' => 'form-control' . ($errors->has('towns_id') ? ' is-invalid' : ''), 'placeholder' => 'Towns Id']) }}
            {!! $errors->first('towns_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('users_id') }}
            {{ Form::select('users_id', $users, $person->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
