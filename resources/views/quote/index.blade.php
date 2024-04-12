@extends('layouts.app')
@if (Session::has('msj'))
    {{ Session::get('msj') }}
@endif
@section('template_title')
    Quote
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cottizaciones') }}
                            </span>

                            <form action="{{ route('quotes.index') }}" method="get" class="d-flex align-items-center">
                                <div class="col-auto mr-2">
                                    <input type="text" class="form-control" name="search"
                                        placeholder="Buscar..." id="search">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                </div>
                            </form>
                            <div class="float-right">
                                <a href="{{ route('pdf.quote') }}" class="btn btn-danger btn-sm float-right">
                                    <i class="fa fa-file-pdf"></i> {{ __('PDF') }}
                                </a>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('quotes.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Cotización') }}
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
                                        <th>Id</th>
                                        <th>Fecha de expedición</th>
                                        <th>Descripción</th>
                                        <th>Total</th>
                                        <th>Descuento</th>
                                        <th>Estado</th>
                                        <th>Persona</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quotes as $quote)
                                        <tr>
                                            <td>{{ $quote->id }}</td>
                                            <td>{{ $quote->date_issuance }}</td>
                                            <td>{{ $quote->description }}</td>
                                            <td>{{ $quote->total }}</td>
                                            <td>{{ $quote->discount }}</td>
                                            <td>{{ $quote->status }}</td>
                                            <td>{{ $quote->people_id }}</td>
                                            <td>
                                                <form action="{{ route('quotes.destroy', $quote->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('quotes.show', $quote->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success "
                                                        href="{{ route('quotes.edit', $quote->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('¿Está seguro de que desea {{ dd($quote->disable ? 'Habilitar' : 'Deshabilitar') }} el estado de esta cotización?')" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-fw fa-trash"></i> 
                                                        {{ $quote->disable ? 'Habilitar' : 'Deshabilitar' }}
                                                    </button>
                                                </form>
                                                <div class="float-right">
                                                    <a href="{{ route('pdf.quote') }}"
                                                        class="btn btn-info btn-sm float-right">
                                                        <i class="fa fa-file-pdf"></i> {{ __('Generar PDF') }}
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $quotes->links() !!}
            </div>
        </div>
    </div>
@endsection
