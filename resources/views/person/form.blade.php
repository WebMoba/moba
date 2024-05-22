<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<small class="text-right">Los campos indicados con <span style="color: red;">*</span> son obligatorios</small>
<div class="box box-info padding-1">

    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Rol', null, ['class' => 'required']) }}
            {{ Form::select('rol', ['Administrador' => 'Administrador', 'Cliente' => 'Cliente', 'Proveedor' => 'Proveedor'], $person->rol, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un rol']) }}
            {!! $errors->first('rol', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Tipo Identificacion', null, ['class' => 'required']) }}
            {{ Form::select('identification_type', ['cedula' => 'Cedula', 'cedula Extranjeria' => 'Cedula Extranjeria', 'NIT' => 'NIT'], $person->identification_type ?? null, ['class' => 'form-control' . ($errors->has('identification_type') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un tipo de identificación']) }}
            {!! $errors->first('identification_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Identificacion', null, ['class' => 'required']) }}
            {{ Form::text('id_card', $person->id_card, ['class' => 'form-control' . ($errors->has('id_card') ? ' is-invalid' : ''), 'placeholder' => 'Identificacion', 'maxlength' => '10']) }}
            {!! $errors->first('id_card', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre', null, ['class' => 'required']) }}
            {{ Form::select('user_name', $usersName, $person->users_id, ['class' => 'form-control' . ($errors->has('user_name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('user_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Direccion') }}
            {{ Form::text('addres', $person->addres ?: 'N/A', ['class' => 'form-control' . ($errors->has('addres') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('addres', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group" style="display: none">
            {{ Form::text('number_phones_id', $numberPhoneId, ['class' => 'form-control', 'readonly' => true]) }}
            <!-- Mostrar el ID del número de teléfono -->
        </div>

        <div class="form-group">
            {{ Form::label('phone_number', 'Número de Celular', ['class' => 'required']) }}
            {{ Form::text('phone_number', isset($numberPhone) ? $numberPhone->number : '', ['class' => 'form-control', 'placeholder' => 'Número de teléfono', 'maxlength' => '10']) }}
        </div>

        <div class="form-group">
            {{ Form::label('Grupo de Trabajo') }}
            {{ Form::select('team_works_id', $teamWorks, $person->team_works_id, ['class' => 'form-control' . ($errors->has('team_works_id') ? ' is-invalid' : ''), 'placeholder' => '']) }}
            {!! $errors->first('team_works_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Departamento', null, ['class' => 'required']) }}
            {{ Form::select('region', $regions, $person->region_id, ['id' => 'regions_select', 'class' => 'form-control' . ($errors->has('region') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
            {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Ciudad', null, ['class' => 'required']) }}
            {{ Form::select('towns_id', $towns, $person->towns_id, ['id' => 'towns_select', 'class' => 'form-control' . ($errors->has('towns_id') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad']) }}
            {!! $errors->first('towns_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Usuario', null, ['class' => 'required']) }}
            {{ Form::select('users_id', $users, $person->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Correo Electronico']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    
    <div class="box-footer mt20 my-2">
        @if ($editing)
        <button type="submit" class="btn btn-success" id="editButton" data-bs-toggle="tooltip" title="Editar">
        <i class="bi bi-pencil-square"></i>
        </button>
        @else
        <button type="submit" class="btn btn-success" id="createButton" data-bs-toggle="tooltip" title="Crear">
        <i class="bi bi-plus-circle"></i>
        </button>
        @endif
        <a class="btn btn-primary" href="{{ route('person.index') }}"><i class="bi bi-arrow-left-circle"></i><span class="tooltiptext">Volver</span></a>
    </div>

</div>
@extends('layouts.alerts')

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
                    data: {
                        regions_id: regionId
                    },
                    success: function(towns) {
                        console.log(towns);
                        // Limpiar las opciones actuales del campo de selección de ciudades
                        $('#towns_select').empty();
                        // Agregar las nuevas opciones de ciudades basadas en la respuesta AJAX
                        $.each(towns, function(key, value) {
                            $('#towns_select').append('<option value="' + key +
                                '">' + value + '</option>');
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


<style>
    .required::after {
        content: "*";
        color: red;
        margin-left: 4px;
    }

    .text-right {
        float: right;
        margin-top: -8px;
        /* Ajusta según sea necesario para alinear verticalmente con el formulario */
    }
</style>
