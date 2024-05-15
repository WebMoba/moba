
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
				<th>Fecha de inicio</th>
				<th>Fecha de finalización</th>
				<th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <!-- @php $i = 0; @endphp -->
            @foreach ($project as $projects)
                <tr>
                    <td>{{ ++$i }}</td>               
					<td>{{ $projects->name }}</td>
					<td>{{ $projects->description }}</td>
					<td>{{ $projects->date_start }}</td>
					<td>{{ $projects->date_end }}</td>
					<td>{{ $projects->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
