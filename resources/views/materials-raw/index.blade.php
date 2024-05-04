@extends('layouts.app')

@section('template_title')
    Materials Raw
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Materia Prima') }}
                            </span>

                            <form action="{{ route('materials_raws.index') }}" method="GET"
                                class="d-flex align-items-center">
                                <div class="col-auto mr-2">
                                    <input type="text" class="form-control" name="search" placeholder="Buscar...">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                            <div class="">
                                <a href="{{ route('pdf.materials_raw') }}" class="btn btn-danger btn-sm float-right">
                                    <i class="bi bi-file-pdf-fill"></i>
                                </a>
                                <a href="{{ route('export.materials.raw') }}" class="btn btn-success btn-sm float-right">
                                     <i class="bi bi-file-earmark-excel-fill"></i>
                                </a>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('materials_raws.create') }}" class="btn btn-success" 
                                    data-placement="left">
                                    <i class="bi bi-plus-circle-fill"></i>
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
                                                    <a class="btn btn-sm btn-primary {{ $materialsRaw->disable ? 'disabled' : '' }}"
                                                        href="{{ route('materials_raws.show', $materialsRaw->id) }}"></i> <i class="bi bi-eye-fill"></i></a>
                                                    <a class="btn btn-sm btn-success {{ $materialsRaw->disable ? 'disabled' : '' }}"
                                                        href="{{ route('materials_raws.edit', $materialsRaw->id) }}"><i class="bi bi-pencil-square"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Está seguro de que desea {{ $materialsRaw->disable ? 'Habilitar' : 'Deshabilitar' }} a la  persona?')">
                                                   
                                                        {!! $materialsRaw->disable ?  '<i class="bi bi-check-circle-fill"></i>' : '<i class="bi bi-x-circle"></i>'!!}
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
                {!! $materialsRaws->links() !!}
            </div>
        </div>
    </div>
@endsection
