@extends('layouts.app')

@section('template_title')
    Detail Quote
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Detail Quote') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('detail-quotes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Services Id</th>
										<th>Products Id</th>
										<th>Projects Id</th>
										<th>Quotes Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detailQuotes as $detailQuote)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $detailQuote->services_id }}</td>
											<td>{{ $detailQuote->products_id }}</td>
											<td>{{ $detailQuote->projects_id }}</td>
											<td>{{ $detailQuote->quotes_id }}</td>

                                            <td>
                                                <form action="{{ route('detail-quotes.destroy',$detailQuote->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('detail-quotes.show',$detailQuote->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('detail-quotes.edit',$detailQuote->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $detailQuotes->links() !!}
            </div>
        </div>
    </div>
@endsection
