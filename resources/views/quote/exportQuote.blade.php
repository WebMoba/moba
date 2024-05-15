<div style="text-align: right; margin-bottom: 20px;">
    <h3>Listado de Cotizaciones</h3>
    <p>Fecha: {{ date(now()->format('Y-m-d')) }}</p>
</div>
<table>
<thead>
    <tr>
        <th>Id</th>
        <th>Fecha de expedición</th>
        <th>Descripción</th>
        <th>Total</th>
        <th>Descuento</th>
        <th>Estado</th>
        <th>Persona</th>
    </tr>
</thead>
<tbody>
    <!-- @php $i = 0; @endphp -->
    @foreach ($quote as $quotes)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $quotes->date_issuance }}</td>
            <td>{{ $quotes->description }}</td>
            <td>{{ $quotes->total }}</td>
            <td>{{ $quotes->discount }}</td>
            <td>{{ $quotes->status }}</td>
            <td>{{ $quotes->people_id }}</td>
            
        </tr>
    @endforeach
</tbody>
</table>