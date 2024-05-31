<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PDF Template</title>
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
        <h1 style="text-align: right;">Listado de categorias</h1>
        <p style="text-align: right;">Fecha: {{ now()->format('Y-m-d') }}</p>
    
        <table>
            <thead>
                <tr>
                    <th>No</th>
    
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Cantidad</th>
                    <th>Popularidad</th>
                    <th>Tipo</th>
    
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                @foreach ($categoriesProductsService as $categoriesProductsServices)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $categoriesProductsServices->name }}</td>
                        <td>{{ $categoriesProductsServices->description }}</td>
                        <td>{{ $categoriesProductsServices->status }}</td>
                        <td>{{ $categoriesProductsServices->quantity }}</td>
                        <td>{{ $categoriesProductsServices->popular }}</td>
                        <td>{{ $categoriesProductsServices->type }}</td>
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
