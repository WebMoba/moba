@extends('layouts.app')

@section('template_title')
    Event
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                            <span id="card_title">
                                {{ __('Eventos') }}
                            </span>

                        <form action="{{ route('buscar') }}" method="GET">
                        <input type="text" name="termino" placeholder="Buscar....">
                        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                        </form>

                             <div class="float-right">
                                <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Lugar</th>
										<th>Titulo</th>
										<th>Descripcion</th>
										<th>Fecha Inicio</th>
										<th>Fecha Final</th>
										<th>Rango Importancia</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $event->place }}</td>
											<td>{{ $event->title }}</td>
											<td>{{ $event->description }}</td>
											<td>{{ $event->date_start }}</td>
											<td>{{ $event->date_end }}</td>
											<td>{{ $event->importance_range }}</td>

                                            <td>
                                                <form action="{{ route('events.destroy',$event->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('events.show',$event->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('events.edit',$event->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar el evento?')"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><br>
                <div class="float-right">
                <a href="{{ route('pdf.event', ['findId' => request()->get('findId')]) }}" class="btn btn-info btn-sm float-right">
                 <i class="fa fa-file-pdf"></i> {{ __('Generar PDF') }}
                </a>
                            </div>
                {!! $events->links() !!}
            </div>
        </div>
    </div>
@endsection
