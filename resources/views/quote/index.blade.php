@extends('layouts.app')

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

                             <div class="float-right">
                                <a href="{{ route('quotes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quotes as $quote)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $quote->date_issuance }}</td>
											<td>{{ $quote->description }}</td>
											<td>{{ $quote->total }}</td>
											<td>{{ $quote->discount }}</td>
											<td>{{ $quote->status }}</td>
											<td>{{ $quote->people_id }}</td>

                                            <td>
                                                <form action="{{ route('quotes.destroy',$quote->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('quotes.show',$quote->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('quotes.edit',$quote->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
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
