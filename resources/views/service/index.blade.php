@extends('layouts.app')

@section('template_title')
    Servicio
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
                                {{ __('Servicio') }}
                            </span>
                            <a href="{{ route('pdf.service') }}" class="btn btn-info btn-sm float-right">
                                <i class="fa fa-file-pdf"></i> {{ __('Generar PDF') }}
                            </a>
                            <form action="{{ route('service.index') }}" method="GET" class="d-flex align-items-center">
                                <div class="col-auto">
                                    <input type="text" class="form-control " id="search" name="search">

                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                            </form>
                            <div class="float-right">
                                <a href="{{ route('service.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Servicio') }}
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

                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Fecha de inicio</th>
                                        <th>Fecha de finalizacion</th>
                                        <th>Imagen</th>
                                        <th>Categoria</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->description }}</td>
                                            <td>{{ $service->date_start }}</td>
                                            <td>{{ $service->date_end }}</td>
                                            <td><img src="{{ asset('storage/' . $service->image) }}" width='150'
                                                    height="150"></td>
                                            <td>{{ $service->categoriesProductsService->name }}</td>

                                            <td>
                                                <form action="{{ route('service.destroy',  $service->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary {{  $service->disable ? 'disabled' : '' }}"
                                                        href="{{ route('service.show',  $service->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success {{  $service->disable ? 'disabled' : '' }}"
                                                        href="{{ route('service.edit',  $service->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Está seguro de que desea {{  $service->disable ? 'Habilitar' : 'Deshabilitar' }}el servicio?')">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                        {{  $service->disable ? 'Habilitar' : 'Deshabilitar' }}
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
                {!! $services->links() !!}
            </div>
        </div>
    </div>
@endsection
