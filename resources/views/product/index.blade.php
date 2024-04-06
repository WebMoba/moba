@extends('layouts.app')

@section('template_title')
    Product
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger text-center">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Productos') }}
                            </span>

                            <form action="{{ route('product.index') }}" method="GET" class="d-flex align-items-center">
                                <div class="col-auto mr-2">
                                    <input type="text" class="form-control" id="search" name="search"
                                        placeholder="Buscar por Nombre">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                </div>
                            </form>
                            <a href="{{ route('pdf.product') }}" class="btn btn-info btn-sm float-right">
                                <i class="fa fa-file-pdf"></i> {{ __('Generar PDF') }}
                            </a>
                            <div class="float-right">
                                <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Producto') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
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
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td><img src="{{ asset('storage/' . $product->image) }}" width="150"
                                                    height="150"></td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->unit->unit_type }}</td>
                                            <td>{{ $product->categoriesProductsService->name }}</td>
                                            <td>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary {{ $product->disable ? 'disabled' : '' }}"
                                                        href="{{ route('product.show', $product->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success {{ $product->disable ? 'disabled' : '' }}"
                                                        href="{{ route('product.edit', $product->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Está seguro de que desea {{ $product->disable ? 'Habilitar' : 'Deshabilitar' }} el producto?')">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                        {{ $product->disable ? 'Habilitar' : 'Deshabilitar' }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection
