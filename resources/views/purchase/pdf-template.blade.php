<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Compras</title>
    <link rel="stylesheet" href="{{public_path('css/pdf.css')}}" type="text/css">
</head>
<body>
  
    <div class="moba">
        <div class="logo1">
            <img src="{{ public_path('logos/LogoMoba.png') }}" alt="Logo de MOBA">
        </div>
        <div class="info">
            <h1>Moba</h1>
            <h2>agenciamoba@gmail.com</h2>
            <h3>Cl. 15a No.7A - 30, Sogamoso, Boyacá</h3>
            <h4>3112437979</h4>
        </div>
    </div>


    <div class="table-container">
        
        <div style="text-align: right; margin-bottom: 20px;">
            <h3>Listado de Compras</h3>
            <p>Fecha: {{ date(now()->format('Y-m-d')) }}</p>
        </div>

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

    <footer class="footer">
        <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
    </footer>

    
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
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table-container {
            overflow-x: auto;
        }
        
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            position: relative;
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .moba {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .logo1,
        .logo2 {
            flex: 0 0 auto;
            width: 25%;
        }

        .info {
            flex: 1;
            text-align: center;
        }

        .info h1 {
            margin-top: 0;
        }

        .info h2, .info h3, .info h4 {
            margin-bottom: 5px;
        }

        .content {
            margin: 20px;
            padding-bottom: 60px; /* Espacio para el footer */
        }


        img {
            max-width: 150px;
            max-height: 150px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: white;
        }

    </style>
</body>

</html>
