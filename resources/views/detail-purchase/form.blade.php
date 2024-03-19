<div class="box box-info padding-1" id="formulario-original">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Nombre de materia prima comprada') }}
            {{ Form::select('materials_raws_id', $materialsRaws, $detailPurchase->materials_raws_id, ['class' => 'form-control' . ($errors->has('materials_raws_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una materia prima']) }}
            {!! $errors->first('materials_raws_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad') }}
            {{ Form::text('quantity', $detailPurchase->quantity, ['id' => 'quantity', 'class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Precio unitario') }}
            {{ Form::text('price_unit', $detailPurchase->price_unit, ['id' => 'price_unit', 'class' => 'form-control' . ($errors->has('price_unit') ? ' is-invalid' : ''), 'placeholder' => 'Price Unit']) }}
            {!! $errors->first('price_unit', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Subtotal') }}
            {{ Form::text('subtotal', $detailPurchase->subtotal, ['id' => 'subtotal', 'class' => 'form-control' . ($errors->has('subtotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal', 'readonly' => true, 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
            {!! $errors->first('subtotal', '<div class="invalid-feedback">:message</div>') !!}
            <small class="text-muted">El valor de este campo es generado automaticamente. No es editable.</small>
        </div>
        <div class="form-group">
            {{ Form::label('Porcentaje de descuento') }}
            {{ Form::text('discount', $detailPurchase->discount, ['id' => 'discount', 'class' => 'form-control' . ($errors->has('discount') ? ' is-invalid' : ''), 'placeholder' => 'Discount']) }}
            {!! $errors->first('discount', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Total') }}
            {{ Form::text('total', $detailPurchase->total, ['id' => 'total', 'class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total', 'readonly' => true, 'style' => 'background-color: #f8f9fa; cursor: not-allowed;']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
            <small class="text-muted">El valor de este campo es generado automaticamente. No es editable.</small>
        </div>
        <div class="form-group">
            @if (isset($creating))
                {{ Form::text('detail_purchase[purchases_id]', $purchaseName, ['class' => 'form-control', 'hidden']) }}
            @else
                {{ Form::select('detail_purchase[purchases_id]', $purchases, $detailPurchase->purchases_id, ['class' => 'form-control' . ($errors->has('detail_purchase.purchases_id') ? ' is-invalid' : '')]) }}
            @endif
            {!! $errors->first('detail_purchase.purchases_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>

    <button type="button" class="btn btn-primary" onclick="clonarFormulario()">Nuevo detalle</button>

    
</div>

<script>
    function clonarFormulario() {
        // Clonar el formulario original
        var formularioOriginal = document.getElementById('formulario-original');
        var formularioClonado = formularioOriginal.cloneNode(true);

        // Limpia los campos clonados (si es necesario)
        var campos = formularioClonado.querySelectorAll('input[type="text"]');
        campos.forEach(function(campo) {
            campo.value = '';
        });

        // Inserta el formulario clonado después del formulario original
        formularioOriginal.parentNode.insertBefore(formularioClonado, formularioOriginal.nextSibling);
    }


    document.addEventListener('DOMContentLoaded', function() {
        const quantityField = document.getElementById('quantity');
        const priceUnitField = document.getElementById('price_unit');
        const discountField = document.getElementById('discount');
        const subtotalField = document.getElementById('subtotal');
        const totalField = document.getElementById('total');

        //calcula subtotal y total
        function calculateSubtotalAndTotal() {
            const quantity = parseFloat(quantityField.value) || 0;
            const priceUnit = parseFloat(priceUnitField.value) || 0;
            const discount = parseFloat(discountField.value) || 0;

            const subtotal = quantity * priceUnit;
            const total = subtotal - (subtotal * (discount / 100));

            // Muestra los valores en los campos
            subtotalField.value = subtotal.toFixed(2);
            totalField.value = total.toFixed(2);
        }

        // Asocia la función al evento de cambio en los campos relevantes
        quantityField.addEventListener('input', calculateSubtotalAndTotal);
        priceUnitField.addEventListener('input', calculateSubtotalAndTotal);
        discountField.addEventListener('input', calculateSubtotalAndTotal);
    });
</script>
