<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PDF Template</title>
    <!-- Estilos CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
        }

        h1,
        h3 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table-container {
            overflow-x: auto;
        }
    </style>

</head>

<body>

    <header>
        <div style="text-align: left; margin-bottom: 20px;">
            <img src="data:image/jpeg;base64,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"
                alt="Logo de la Empresa" height="50">
        </div>
        <div style="text-align: right; margin-bottom: 20px;">
            <h3>Listado de Compras</h3>
            <p>Fecha: {{ date(now()->format('Y-m-d')) }}</p>
        </div>
    </header>


    <div class="table-container">
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
    </div>

    <footer>
        <div style="text-align: center; margin-top: 20px; border-top: 1px solid #ddd; padding-top: 10px;">
            <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>
