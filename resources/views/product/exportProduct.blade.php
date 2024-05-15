
    <h1>Listado de Productos</h1>

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
                @php
                    $imagePath = public_path('storage/' . $product->image);
                    $imageData = base64_encode(file_get_contents($imagePath));
                    $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
                    $imageBase64 = 'data:image/' . $imageExtension . ';base64,' . $imageData;
                @endphp
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{ $imageBase64 }}" width="150" height="150"></td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->unit->unit_type }}</td>
                    <td>{{ $product->categoriesProductsService->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>