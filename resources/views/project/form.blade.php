<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Fechas</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .required::after {
            content: "*";
            color: red;
            margin-left: 4px;
        }
        .text-right {
            float: right;
            margin-top: -8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <small class="text-right">Los campos indicados con <span style="color: red;">*</span> son obligatorios</small>

        <div class="box box-info padding-1">
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('Nombre', null, ['class' => 'required']) }}
                    {{ Form::text('name', $project->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('Descripción', null, ['class' => 'required']) }}
                    {{ Form::text('description', $project->description, ['id' => 'Descripción', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) }}
                    {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group col-md-3">
                    {{ Form::label('Fecha de inicio', null, ['class' => 'required']) }}
                    {{ Form::date('date_start', optional($project->date_start)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_start') ? ' is-invalid' : ''), 'required', 'id' => 'date_start', 'min' => now()->format('Y-m-d')]) }}
                    {!! $errors->first('date_start', '<div class="invalid-feedback">:message</div>') !!}   
                </div>

                <div class="form-group col-md-3">
                    {{ Form::label('Fecha de finalización', null, ['class' => 'required']) }}
                    {{ Form::date('date_end', optional($project->date_end)->format('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_end') ? ' is-invalid' : ''), 'required', 'id' => 'date_end', 'min' => optional($project->date_start)->format('Y-m-d') ?: now()->format('Y-m-d')]) }}
                    {!! $errors->first('date_end', '<div class="invalid-feedback">:message</div>') !!}
                </div>

                <div class="form-group">
                    {{ Form::label('Estado', null, ['class' => 'required']) }}
                    {{ Form::select('status', ['en curso' => 'En Curso', 'finalizado' => 'Finalizado', 'pausado' => 'Pausado', 'pendiente' => 'Pendiente'], isset($project->status) ? $project->status : old('status'), ['id' => 'Estado', 'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'required' => 'required']) }}
                    {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <br>
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
                <a class="btn btn-primary" href="{{ route('projects.index') }}"><i class="bi bi-arrow-left-circle"></i><span class="tooltiptext">Volver</span></a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateStartInput = document.getElementById('date_start');
            const dateEndInput = document.getElementById('date_end');
            const maxDate = new Date();
            maxDate.setFullYear(maxDate.getFullYear() + 3);
            const maxDateString = maxDate.toISOString().split('T')[0];

            dateStartInput.setAttribute('max', maxDateString);
            dateEndInput.setAttribute('max', maxDateString);

            const validateDates = () => {
                const dateStart = new Date(dateStartInput.value);
                const dateEnd = new Date(dateEndInput.value);
                const today = new Date();
                today.setHours(0, 0, 0, 0); // Remove time part for comparison

                /*if (dateStart < today) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Fecha inválida',
                        text: 'La fecha de inicio no puede ser anterior a hoy.',
                    });
                    dateStartInput.value = '';
                    return false;
                }*/

                if (dateEnd < dateStart) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Fecha inválida',
                        text: 'La fecha de finalización no puede ser anterior a la fecha de inicio.',
                    });
                    dateEndInput.value = '';
                    return false;
                }

                return true;
            };

            dateStartInput.addEventListener('change', validateDates);
            dateEndInput.addEventListener('change', validateDates);

            const form = document.querySelector('form');
            form.addEventListener('submit', (event) => {
                if (!validateDates()) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
