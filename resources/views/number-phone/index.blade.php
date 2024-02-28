@extends('layouts.app')

@section('template_title')
    Number Phone
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Celular') }}
                            </span>

                            <form action="{{ route('buscarCel') }}" method="GET">
                            <input type="text" name="findCel" placeholder="Buscar por Celular...">
                            <button type="submit">Buscar</button>
                            </form>

                             <div class="float-right">
                                <a href="{{ route('number-phone.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear') }}
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
                                        
										<th>Numero</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($numberPhones as $numberPhone)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td data-number="{{ $numberPhone->number }}"> {{ $numberPhone->number }}</td>

                                            <td>
                                                <form action="{{ route('number-phone.destroy',$numberPhone->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary" href="{{ route('person.create', ['numberPhone' => $numberPhone->number]) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('number-phone.edit',$numberPhone->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $numberPhones->links() !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('a.show-phone').click(function(event) {
                event.preventDefault();
                var phoneNumber = $(this).data('number');
                window.location.href = "{{ route('person.create') }}?numberPhone=" + phoneNumber;
            });
        });
    </script>
@endsection
