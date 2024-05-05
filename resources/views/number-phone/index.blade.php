@extends('layouts.app')

@section('template_title')
    Number Phone
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Menu'])

    <div class="container-fluid">
    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif


    <a class="btn btn-primary" href="{{ route('person.index') }}"> {{ __('Volver') }}</a><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    
                    <div class="card-header">
                        
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        
                            <span id="card_title">
                                {{ __('Celular') }}
                            </span>

                            <form action="{{ route('buscarCel') }}" method="GET">
                                <input type="text" name="findCel" placeholder="Buscar....">
                                <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
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
    <td>
     
            {{ $numberPhone->number }}
        </a>
    </td>
    <td>
        <form action="{{ route('number-phone.destroy',$numberPhone->id) }}" method="POST">
            <a class="btn btn-sm btn-primary" href="{{ route('number-phone.show',$numberPhone->id) }}">
                <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}
            </a>
            <a class="btn btn-sm btn-success" href="{{ route('number-phone.edit',$numberPhone->id) }}">
                <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
            </a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar el número telefónico?')">
                <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
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
                {!! $numberPhones->links() !!}
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('a.show-phone').click(function(event) {
            event.preventDefault();
            var numberId = $(this).data('number-id');
            var phoneNumber = $(this).closest('tr').find('td[data-number]').data('number'); // Obtener el número de teléfono del atributo data-number
            console.log(numberId); // Verificar el ID del número de teléfono en la consola del navegador
            console.log(phoneNumber); // Verificar el número de teléfono en la consola del navegador
            window.location.href = "{{ route('person.create') }}?numberPhoneId=" + numberId + "&phoneNumber=" + phoneNumber; // Pasar el ID y el número de teléfono como parámetros
        });
    });
</script>
@endsection
