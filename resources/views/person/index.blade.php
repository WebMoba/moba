@extends('layouts.app')

@section('template_title')
    Persona
@endsection

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Personas'])

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Personas') }}
                            </span>

                            <form action="{{ route('buscarPeople') }}" method="GET" class="d-flex align-items-center">
                                <div class="col-auto mr-2">
                                    <input type="text" class="form-control" name="findId" placeholder="Buscar...">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="bi bi-search"></i><span class="tooltiptext">Buscar</span></button>
                                </div>
                            </form>
                            <div class="float-right" style="display: flex;">
                                <a href="{{ route('pdf.person') }}" class="btn btn-danger btn-sm float-right">
                                    <i class="bi bi-file-pdf-fill"></i><span class="tooltiptext">Pdf</span>
                                </a>

                                <a href="{{ route('excel.person') }}" class="btn btn-success btn-sm float-right">
                                    <i class="bi bi-file-earmark-excel-fill"></i><span class="tooltiptext">Excel</span>
                                </a>

                            </div>
                            
                            <div class="float-right">
                                <a href="{{ route('person.create') }}" class="btn btn-success" data-placement="left">
                                    <i class="bi bi-plus-circle-fill"></i><span class="tooltiptext">Crear</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if (!empty($mensaje))
                        <div class="alert alert-warning">
                            <p>{{ $mensaje }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
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
                                    @foreach ($people as $person)
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
                                            <td>
                                                
                                                    <form class="frData"
                                                        action="{{ route('person.destroy', $person->id) }}"
                                                        method="POST" data-disable="{{ $person->disable }}">
                                                        <a class="btn btn-sm btn-primary {{ $person->disable ? 'disabled' : '' }}"
                                                            href="{{ route('person.show', $person->id) }}"><i
                                                                class="bi bi-eye-fill"></i><span class="tooltiptext">Mostrar</span></a>

                                                        <a class="btn btn-sm btn-success {{ $person->disable ? 'disabled' : '' }}"
                                                            href="{{ route('person.edit', $person->id) }}"><i
                                                                class="bi bi-pencil-square"></i><span class="tooltiptext">Editar</span></a>

                                                        @csrf
                                                        @method('DELETE')

                                                        @php
                                                            $user = $person->user;
                                                        @endphp

                                                        @if ($user && $user->email === 'agenciamoba@gmail.com')
                                                            <button type="button" class="btn btn-danger btn-sm" disabled>
                                                                {!! $person->disable ? '<i class="bi bi-check-circle-fill"></i>' : '<i class="bi bi-x-circle"></i>' !!}
                                                            </button>
                                                            
                                                        @else
                                                            <button type="submit" class="btn btn-danger btn-sm">

                                                                {!! $person->disable ? '<i class="bi bi-check-circle-fill"></i>' : '<i class="bi bi-x-circle"></i>' !!}
                                                            </button>
                                                        @endif
                                                    </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><br>
                {!! $people->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.alerts')
