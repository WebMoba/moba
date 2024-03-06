@extends('layouts.app')

@section('template_title')
    Materials Raw
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="col-sm-12">
                    <form class="d-flex my-2" action="{{ route('materials_raws.index') }}" method="GET">
                        <div class="mr-2">
                            <input type="text" class="form-control" name="search"
                                placeholder="Buscar por nombre o cantidad">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                    </form>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Materia Prima') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('materials_raws.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear nuevo') }}
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
                                        <th>Cantidad existente</th>
                                        <th>Tipo de unidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materialsRaws as $materialsRaw)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $materialsRaw->name }}</td>
                                            <td>{{ $materialsRaw->existing_quantity }}</td>
                                            <td>{{ $materialsRaw->unit->unit_type }}</td>

                                            <td>
                                                <form action="{{ route('materials_raws.destroy', $materialsRaw->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('materials_raws.show', $materialsRaw->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        onclick="return confirm('¿Está seguro de editar este registro?');"
                                                        href="{{ route('materials_raws.edit', $materialsRaw->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Está seguro de eliminar esta materia prima? Ten en cuenta que esto eliminará todos los registros asociados');"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $materialsRaws->links() !!}
            </div>
        </div>
    </div>
@endsection
