<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Tipo de unidad', null, ['class' => 'required']) }}
            {{ Form::select('unit_type', ['unidad' => 'Unidad', 'docena' => 'Docena', 'centena' => 'Centena', 'mil' => 'Mil', 'mm' => 'MM', 'cm' => 'CM', 'm' => 'M', 'cm2' => 'CM2', 'm2' => 'M2',], $unit->unit_type, ['class' => 'form-control' . ($errors->has('unit_type') ? ' is-invalid' : ''), 'id' => 'unit_type']) }}
            {!! $errors->first('unit_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"
            @if ($mode == 'Editar') onclick="return confirm('¿Está seguro de que desea {{ $mode }} esta unidad?')" @endif>{{ $mode }}</button>
    </div>
</div>
<style>
    .required::after {
    content: "*";
    color: red;
    margin-left: 4px;
}
</style>