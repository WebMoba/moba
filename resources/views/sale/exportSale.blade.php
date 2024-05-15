<div style="text-align: right; margin-bottom: 20px;">
    <h3>listado de ventas</h3>
    <p>Fecha: {{ date(now()->format('Y-m-d')) }}</p>
</div>
<table>
<thead>
    <tr>
        <th>Id</th>
        <th>Nombre Cliente</th>
        <th>Id Cliente</th>
        <th>Fecha venta</th>                                            
        <th>Fecha de Cotización</th>

    </tr>
</thead>
<tbody>
    <!-- @php $i = 0; @endphp -->
    @foreach ($sales as $sale)
       
        <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $sale->person->name }}</td>
                <td>{{ $sale->person->id_card }}</td>
                <td>{{ $sale->date }}</td>                  
        </tr>
    @endforeach
</tbody>
</table>