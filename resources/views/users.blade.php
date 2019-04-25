@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Email Users</div>

                <div class="panel-body">
                    <table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Email</th>
								<th>Password</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td style="vertical-align: middle">{{ $user->id }}</td>
									<td style="vertical-align: middle">{{ $user->email }}</td>
									<td> 
										<form class="form-inline" method="POST" action="{{ route('users_passwd', ['id' => $user->id]) }}">
											{{ csrf_field() }}
											<div class="form-group">
												<div class="col-md-8">
													<input id="password" class="form-control" name="password">
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-1">
													<button type="submit" class="btn btn-success">Change</button>
												</div>
											</div>
										</form>
									</td>
									<td><a class="btn btn-danger" href="{{ route('users_delete', ['id' => $user->id]) }}" role="button">Delete</a></td>
								</tr>
							@endforeach
						</tbody>
						
                    </table>
                    
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Create New User</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('users_create') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
							<label for="domain" class="col-md-4 control-label">@</label>
                            <div class="col-md-6">
                                <select id="domain" class="form-control" name="domain">
									@foreach($domains as $domain)
										<option value="{{ $domain->name }}">{{ $domain->name }}</option>
									@endforeach
								</select>
                            </div>
                            
                        </div>
                        <div class="form-group">
							<label for="domain" class="col-md-4 control-label">Password</label>
							<div class="col-md-4">
                                <input id="password" class="form-control" name="password">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
