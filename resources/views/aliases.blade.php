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
							<form class="form-vertical">
								@foreach($aliases as $alias)
									@foreach($alias['destination'] as $dest)
										<tr>
											@if(array_search($dest, $alias['destination']) === 0)
												<td style ="vertical-align:middle" rowspan="{{ count($alias['destination']) + 1 }}"> {{ $alias->id }} </td>
											@endif
											@if(array_search($dest, $alias['destination']) === 0)
												<td style ="vertical-align:middle" rowspan="{{ count($alias['destination']) + 1 }}"> {{ $alias->source }} </td>
											@endif
											<td style ="vertical-align:middle"> {{ $dest }} </td>
											<td><button class="btn btn-danger">-</button></td>
										</tr>
									@endforeach
									
										<tr>
											<td style ="vertical-align:middle">
												<div class="form-group"><input class="form-control" method="post" id="source" name="source"></div>
											</td>
											<td>
												<div class="form-group"><button type="submit" class="btn btn-success">+</button></div>
											</td>
										</tr>
									
								@endforeach
							</form>
						</tbody>
						
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

