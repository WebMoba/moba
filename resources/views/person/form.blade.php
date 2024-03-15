
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="box box-info padding-1">

    <div class="box-body">

    <div class="form-group" style="display: none">
            {{ Form::label('Numero Celular') }}
            {{ Form::text('number_phones_id', request('numberPhoneId'), ['class' => 'form-control', 'readonly' => true]) }} <!-- Mostrar el ID del número de teléfono -->
        </div>
        
        <div class="form-group">
            {{ Form::label('Numero de Celular') }}
        <input type="text" class="form-control" value="{{ request('phoneNumber') }}" readonly> <!-- Mostrar el número de teléfono -->
        </div>
            <a href="{{ route('number-phone.index') }}" class="btn btn-primary mt-2">Seleccionar Celular</a>
        </div>
        <div class="form-group">
            {{ Form::label('Rol') }}
            {{ Form::select('rol', ['Administrador' => 'Administrador', 'Cliente' => 'Cliente', 'Proveedor' => 'Proveedor'], $person->rol, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un rol']) }}
            {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tipo Identificacion') }}
            {{ Form::select('identification_type', ['cedula' => 'Cedula', 'cedula Extranjeria' => 'Cedula Extranjeria', 'NIT' => 'NIT'], $person->identification_type ?? null, ['class' => 'form-control' . ($errors->has('identification_type') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un tipo de identificación']) }}
            {!! $errors->first('identification_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Identificacion') }}
            {{ Form::text('id_card', $person->id_card, ['class' => 'form-control' . ($errors->has('id_card') ? ' is-invalid' : ''), 'placeholder' => 'Identificacion']) }}
            {!! $errors->first('id_card', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
        {{ Form::label('Nombre') }}
        {{ Form::select('user_name', $usersName, $person->user_id, ['class' => 'form-control' . ($errors->has('user_name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('user_name', '<div class="invalid-feedback">:message</div>') !!}
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
    {{ Form::label('Departamento') }}
    {{ Form::select('region', $regions, $person->region, ['id' => 'regions_select', 'class' => 'form-control' . ($errors->has('region') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
    {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
</div>
        
    <div class="form-group">
        {{ Form::label('Ciudad') }}
        {{ Form::select('towns_id', $towns, $person->towns_id, ['id' => 'towns_select', 'class' => 'form-control' . ($errors->has('towns_id') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad']) }}
        {!! $errors->first('towns_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>


        <div class="form-group">
            {{ Form::label('Usuario') }}
            {{ Form::select('users_id', $users, $person->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <br><button type="submit" class="btn btn-primary" onclick="return confirm('¿Está seguro de que desea crear a la persona?')">{{ __('Crear') }}</button>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Manejar el cambio en la selección de departamentos
        $('#regions_select').change(function() {
            var regionId = $(this).val(); // Obtener el ID del departamento seleccionado
            if (regionId) {
                // Realizar una solicitud AJAX para obtener las ciudades asociadas a ese departamento
                $.ajax({
                    type: "GET",
                    url: "{{ route('get_towns_by_region') }}",
                    data: { regions_id: regionId },
                    success: function(towns) {
                        console.log(towns);
                        // Limpiar las opciones actuales del campo de selección de ciudades
                        $('#towns_select').empty();
                        // Agregar las nuevas opciones de ciudades basadas en la respuesta AJAX
                        $.each(towns, function(key, value) {
                            $('#towns_select').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                // Si no se selecciona ningún departamento, vaciar las opciones del campo de selección de ciudades
                $('#towns_select').empty();
            }
        });
    });
</script>