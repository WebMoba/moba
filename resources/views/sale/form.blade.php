<div class="box box-info padding-1">
    <div class="box-body">
       
        <div class="form-group">
            {{ Form::label('Nombre de la Venta') }}
            {{ Form::text('name', $sale->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Fecha') }}
            {{ Form::date('date', $sale->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Fecha', 'min' => now()->format('Y-m-d')]) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Id Persona') }}
            {{ Form::text('people_id', $sale->people_id, ['class' => 'form-control' . ($errors->has('people_id') ? ' is-invalid' : ''), 'placeholder' => 'Id Persona']) }}
            {!! $errors->first('people_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Id cotización') }}
            {{ Form::text('quotes_id', $sale->quotes_id, ['class' => 'form-control' . ($errors->has('quotes_id') ? ' is-invalid' : ''), 'placeholder' => 'Id cotización']) }}
            {!! $errors->first('quotes_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>



        
       

    </div>

</div>