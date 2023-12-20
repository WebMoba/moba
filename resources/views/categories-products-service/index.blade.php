@extends('layouts.app')

@section('template_title')
    Categories Products Service
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categories Products Service') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('categories-products-service.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Name</th>
										<th>Description</th>
										<th>Status</th>
										<th>Quantity</th>
										<th>Popular</th>
										<th>Type</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriesProductsServices as $categoriesProductsService)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $categoriesProductsService->name }}</td>
											<td>{{ $categoriesProductsService->description }}</td>
											<td>{{ $categoriesProductsService->status }}</td>
											<td>{{ $categoriesProductsService->quantity }}</td>
											<td>{{ $categoriesProductsService->popular }}</td>
											<td>{{ $categoriesProductsService->type }}</td>

                                            <td>
                                                <form action="{{ route('categories-products-service.destroy',$categoriesProductsService->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('categories-products-service.show',$categoriesProductsService->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('categories-products-service.edit',$categoriesProductsService->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $categoriesProductsServices->links() !!}
            </div>
        </div>
    </div>
@endsection
