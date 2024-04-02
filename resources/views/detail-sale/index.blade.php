@extends('layouts.app')

@section('template_title')
    Detail Sale
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detalle venta') }}
                            </span>

                            <form action= "{{ route('detail-sale.index' )}}" method="GET" class="d-flex align-items-center;">
                                <div class="col-auto">
                                <input type="text" class="form-control" id="search" name="search" placeholder="Buscar por Nombre">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                </div>
                            </form>

                             <div class="float-right">
                                <a href="{{ route('detail-sale.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Cantidad</th>
										<th>Precio Unidad</th>
										<th>Subtotal</th>
										<th>Descuento</th>
										<th>Total</th>
										<th>Id Venta</th>
										<th>Id Producto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detailSale as $detailSales)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $detailSales->quantity }}</td>
											<td>{{ $detailSales->price_unit }}</td>
											<td>{{ $detailSales->subtotal }}</td>
											<td>{{ $detailSales->discount }}</td>
											<td>{{ $detailSales->total }}</td>
											<td>{{ $detailSales->sales_id }}</td>
											<td>{{ $detailSales->products_id }}</td>

                                            <td>
                                                <form action="{{ route('detail-sale.destroy',$detailSales->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detail-sale.show',$detailSales->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detail-sale.edit',$detailSales->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                    
                                </tbody>
                            </table>
                        </div>
                    </div>


                    
                </div>
                {!! $detailSale->links() !!}
            </div>
        </div>
    </div>
@endsection
