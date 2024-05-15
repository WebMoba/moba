<!-- resources/views/exportPersons.blade.php -->
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Rol</th>
            <th>Tipo Identificacion</th>
            <th>Identificacion</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Equipo de trabajo</th>
            <th>Numero Celular</th>
            <th>Departamento</th>
            <th>Ciudad</th>
            <th>Usuario</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 0; @endphp
        @foreach ($persons as $person)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $person->rol }}</td>
                <td>{{ $person->identification_type }}</td>
                <td>{{ $person->id_card }}</td>
                <td>{{ $person->user ? $person->user->name : 'N/A' }}</td>
                <td>{{ $person->addres }}</td>
                <td>{{ $person->teamWork ? $person->teamWork->assigned_work : 'N/A' }}</td>
                <td>{{ $person->numberPhone ? $person->numberPhone->number : 'N/A' }}</td>
                <td>{{ $person->region ? $person->region->name : 'N/A' }}</td>
                <td>{{ $person->town ? $person->town->name : 'N/A' }}</td>
                <td>{{ $person->user ? $person->user->email : 'N/A' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
