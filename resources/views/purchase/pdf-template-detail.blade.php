<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Compra</title>
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

    <div class="card-body">
        <div style="text-align: right; margin-bottom: 20px;">
            <h3>Compra</h3>
            <p>Fecha: {{ date(now()->format('Y-m-d')) }}</p>
        </div>
        @if ($purchase->detailPurchases->count())
        <table class="table">
            <tbody>
                <tr>
                    <th>Nombre del proveedor:</th>
                    <td>{{ $purchase->user->name }}</td>
                </tr>
                <tr>
                    <th>Documento del proveedor:</th>
                    <td>{{ $purchase->person->id_card }}</td>
                </tr>
                <tr>
                    <th>Total de la compra:</th>
                    <td>{{ $purchase->total }}</td>
                </tr>
                <tr>
                    <th>Fecha realización de la compra:</th>
                    <td>{{ $purchase->date }}</td>
                </tr>
                <tr>
                    <th>Detalles de la compra:</th>
                    <td>
                        <ul>
                            @foreach ($purchase->detailPurchases as $detail)
                                <li>
                                    @foreach ($details as $index => $detail)
                                    <strong>Detalle:</strong> {{ $index + 1 }}<br>
                                    @endforeach
                                    <strong>Cantidad:</strong> {{ $detail->quantity }}<br>
                                    <strong>Precio unitario:</strong> {{ $detail->price_unit }}<br>
                                    <strong>Subtotal:</strong> {{ $detail->subtotal }}<br>
                                    <strong>Descuento:</strong> {{ $detail->discount }}<br>
                                    <strong>Total:</strong> {{ $detail->total }}<br>
                                    <strong>Nombre de la materia prima:</strong> {{ $detail->materialsRaw->name }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        @else
        <p>No se encontraron detalles asociados a esta compra.</p>
        @endif
    </div>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
