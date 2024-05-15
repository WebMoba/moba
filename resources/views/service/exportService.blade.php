<h1>Listado de sercicios</h1>

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