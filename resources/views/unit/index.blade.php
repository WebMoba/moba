@extends('layouts.app')

@section('template_title')
    Unit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Unit') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('units.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Unit Type</th>
                                        <th>Size</th>
                                        <th>Area</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $unit)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $unit->unit_type }}</td>
                                            <td>{{ $unit->size }}</td>
                                            <td>{{ $unit->area }}</td>

                                            <td>
                                                <form action="{{ route('units.destroy', $unit->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('units.show', $unit->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('units.edit', $unit->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
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
                {!! $units->links() !!}
            </div>
        </div>
    </div>
@endsection
