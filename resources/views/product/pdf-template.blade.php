<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Productos</title>
</head>

<body>
    <div class="moba">
        <div class="logo1">
            <img src="{{ asset('logos/LogoMoba.png') }}" alt="Logo de MOBA">
        </div>
        <div class="info">
            <h1>Moba</h1>
            <h2>agenciamoba@gmail.com</h2>
            <h3>Cl. 15a No.7A - 30, Sogamoso, Boyacá</h3>
            <h4>3112437979</h4>
        </div>
        <div class="logo2">
            <img src="{{ asset('logos/LogotuArte.png') }}" alt="Logo de Tu Arte">
        </div>
    </div>

    <div class="content">
        <h1>Listado de Productos</h1>
        <p style="text-align: right;">Fecha: {{ now()->format('Y-m-d') }}</p>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                @foreach ($products as $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            @if ($product->image_exists)
                                <img src="{{ $product->image_url }}" alt="Imagen de {{ $product->name }}">
                            @else
                                <p>Imagen no disponible</p>
                            @endif
                        </td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->unit->unit_type }}</td>
                        <td>{{ $product->categoriesProductsService->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <footer class="footer">
        <p>&copy; {{ date('Y') }} MOBA. Todos los derechos reservados.</p>
    </footer>


    <style>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
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
