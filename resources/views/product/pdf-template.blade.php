<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}" type="text/css">
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

    <div class="content">   
        <h1 style="text-align: right;">Listado de Productos</h1>
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
                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            @if ($product->image_exists)
                                <img src="{{ $product->image_url }}" alt="Imagen de {{ $product->name }}" style="width: 100px; height: auto;">
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

</body>

</html>
