<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Servicios</title>
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
        
        <h1 style="text-align: right;">Listado de Servicios</h1>
        <p style="text-align: right;">Fecha: {{ now()->format('Y-m-d') }}</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
    
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de finalizacion</th>
                    <th>Imagen</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                @foreach ($services as $service)
                    @php
                        $imagePath = public_path('storage/' . $service->image);
                        $imageData = base64_encode(file_get_contents($imagePath));
                        $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
                        $imageBase64 = 'data:image/' . $imageExtension . ';base64,' . $imageData;
                    @endphp
                    <tr>
                        <td>{{ ++$i }}</td>
    
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->date_start }}</td>
                        <td>{{ $service->date_end }}</td>
                        <td><img src="{{ $imageBase64 }}" width="150" height="150"></td>
                        <td>{{ $service->categoriesProductsService->name }}</td>
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
