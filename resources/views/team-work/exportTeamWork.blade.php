<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Especialidad</th>
            <th>Trabajo asignado</th>
            <th>Fecha asignada</th>
            <th>Proyecto</th>
        </tr>
    </thead>
    <tbody>
        <!-- @php $i = 0; @endphp -->
        @foreach ($teamwork as $teamWork)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $teamWork->specialty }}</td>
                <td>{{ $teamWork->assigned_work }}</td>
                <td>{{ $teamWork->assigned_date }}</td>
                <td>{{ $teamWork->project->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>