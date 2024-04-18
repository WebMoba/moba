@extends('layouts.app')

@section('template_title')
    Categorias
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
                                {{ __('Categorias') }}
                            </span>

                            <form action="{{ route('categories-products-service.index') }}" method="GET"
                                class="d-flex align-items-center">
                                <div class="col-auto mr-2">
                                    <input type="text" class="form-control " id="search" name="search">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                </div>
                            </form>
                            <div class="float-right">
                                <a href="{{ route('pdf.categories-products-service') }}"
                                    class="btn btn-danger btn-sm float-right">
                                    <i class="fa fa-file-pdf"></i> {{ __('PDF') }}
                                </a>
                                <a href="{{ route('excel.categories-products-service') }}" class="btn btn-success btn-sm float-right">
                                    <i class="fa fa-file-excel"></i> {{ __('Excel') }}
                                </a>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('categories-products-service.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Crear Categoria') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Estado</th>
                                            <th>Cantidad</th>
                                            <th>Popularidad</th>
                                            <th>Tipo</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categoriesProductsServices as $categoriesProductsService)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $categoriesProductsService->name }}</td>
                                                <td>{{ $categoriesProductsService->description }}</td>
                                                <td>{{ $categoriesProductsService->status }}</td>
                                                <td>{{ $categoriesProductsService->quantity }}</td>
                                                <td>{{ $categoriesProductsService->popular }}</td>
                                                <td>{{ $categoriesProductsService->type }}</td>

                                                <td>
                                                    <form
                                                        action="{{ route('categories-products-service.destroy', $categoriesProductsService->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary {{ $categoriesProductsService->disable ? 'disabled' : '' }}"
                                                            href="{{ route('categories-products-service.show', $categoriesProductsService->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                        <a class="btn btn-sm btn-success {{ $categoriesProductsService->disable ? 'disabled' : '' }}"
                                                            href="{{ route('categories-products-service.edit', $categoriesProductsService->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('¿Está seguro de que desea {{ $categoriesProductsService->disable ? 'Habilitar' : 'Deshabilitar' }} la categoria?')">
                                                            <i class="fa fa-fw fa-trash"></i>
                                                            {{ $categoriesProductsService->disable ? 'Habilitar' : 'Deshabilitar' }}
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
                    {!! $categoriesProductsServices->links() !!}
                </div>
            </div>
        </div>
    @endsection

    