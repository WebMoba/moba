@extends('layouts.app')

@section('template_title')
    Team Work
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Team Work') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('team-works.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Specialty</th>
										<th>Assigned Work</th>
										<th>Assigned Date</th>
										<th>Projects Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teamWorks as $teamWork)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $teamWork->specialty }}</td>
											<td>{{ $teamWork->assigned_work }}</td>
											<td>{{ $teamWork->assigned_date }}</td>
											<td>{{ $teamWork->projects_id }}</td>

                                            <td>
                                                <form action="{{ route('team-works.destroy',$teamWork->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('team-works.show',$teamWork->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('team-works.edit',$teamWork->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $teamWorks->links() !!}
            </div>
        </div>
    </div>
@endsection
