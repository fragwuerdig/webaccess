@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Email Aliases</div>

                <div class="panel-body">
                    
                    <table class="table table-hover">
						
						<thead>
							<tr>
								<td>#</td>
								<td>Source</td>
								<td>Destinations</td>
								<td></td>
							</tr>
						</thead>
						
						<tbody>
								@foreach($aliases as $alias)
									@foreach($alias['destination'] as $dest)
										<tr>
											@if(array_search($dest, $alias['destination']) === 0)
												<td style ="vertical-align:middle" rowspan="{{ count($alias['destination']) }}"> {{ $alias->id }} </td>
											@endif
											@if(array_search($dest, $alias['destination']) === 0)
												<td style ="vertical-align:middle" rowspan="{{ count($alias['destination']) }}"> {{ $alias->source }} </td>
											@endif
											<td style ="vertical-align:middle"> {{ $dest }} </td>
											<td><button class="btn btn-danger" formaction="{{ route('aliases_delete', $alias->id) }}"> Delete </button></td>
										</tr>
									@endforeach
								@endforeach
						</tbody>
						
                    </table>
                    
                </div>
            </div>
            
             <div class="panel panel-default">
                <div class="panel-heading">Add an Alias</div>

                <div class="panel-body">
					<form class="form-horizontal" method="POST" action="{{ route('aliases_add') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="source"  class="col-md-4 control-label"> Source Name </label>
							<div class="col-md-6">
								<input class="form-control" method="post" id="source" name="source" required="required">
							</div>
						</div>
						<div class="form-group">
							<label for="domain"  class="col-md-4 control-label"> @ </label>
							<div class="col-md-6">
								 <select id="domain" class="form-control" name="domain">
									@foreach($domains as $domain)
										<option value="{{ $domain->name }}">{{ $domain->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="source"  class="col-md-4 control-label"> Destination </label>
							<div class="col-md-4">
								<input class="form-control" method="post" id="source" name="destination" type="email" required="required">
							</div>
							<div class="col-md-2"><button type="submit" class="btn btn-success"> Add </button></div>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

