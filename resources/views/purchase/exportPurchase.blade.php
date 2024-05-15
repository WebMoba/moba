<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nombre de compra</th>
            <th>Fecha de compra</th>
            <th>Documento del proveedor</th>
            <th>Dirección del proveedor</th>
            <th>Materia prima comprada</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Subtotal</th>
            <th>% Descuento</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 0; @endphp
        @foreach ($purchases as $purchase)
            @php
                $detailPurchase = $purchase->detailPurchases()->first();
            @endphp

            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $purchase->name }}</td>
                <td>{{ $purchase->date }}</td>
                <td>{{ $purchase->person->id_card ?: 'N/A' }} </td>
                <td>{{ $purchase->person->addres ?: 'N/A' }}</td>
                <td>{{ $detailPurchase ? $detailPurchase->materialsRaw->name : 'N/A' }}</td>
                <td>{{ $detailPurchase ? $detailPurchase->quantity : 'N/A' }}</td>
                <td>{{ $detailPurchase ? $detailPurchase->price_unit : 'N/A' }}</td>
                <td>{{ $detailPurchase ? $detailPurchase->subtotal : 'N/A' }}</td>
                <td>{{ $detailPurchase ? $detailPurchase->discount : 'N/A' }}</td>
                <td>{{ $detailPurchase ? $detailPurchase->total : 'N/A' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>