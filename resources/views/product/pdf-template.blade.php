s<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Productos</title>
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
                @php $i = 0; @endphp
                @foreach ($product as $products)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $products->name }}</td>
                        <td>
                            @if ($products->image_exists)
                                <img src="{{ $product->image_url }}" alt="Imagen de {{ $product->name }}">
                            @else
                                <p>Imagen no disponible</p>
                            @endif
                        </td>
                        <td>{{ $products->quantity }}</td>
                        <td>{{ $products->price }}</td>
                        <td>{{ $products->unit->unit_type }}</td>
                        <td>{{ $products->categoriesProductsService->name }}</td>
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
