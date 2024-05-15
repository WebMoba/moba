
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Cantidad existente</th>
                    <th>Tipo de unidad</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0; @endphp
                @foreach ($materials_raws as $materialsRaw)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td> {{ $materialsRaw->name }}</td>
                        <td> {{ $materialsRaw->existing_quantity }}</td>
                        <td>{{ $materialsRaw->unit->unit_type }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>