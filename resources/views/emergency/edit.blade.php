@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="card">
						<div class="card-header">Info Form</div>
						<div class="card-body">
							<div class="card-body">
							@if($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach($errors->all() as $error)
										<li>{{$error}}</li>
										@endforeach
									</ul>
									
								</div>
							@endif

							<form method="post" action="{{route('emergency.update',$emergency->id)}}" enctype="multipart/form-data">
								@csrf
								@method('PUT')
								<div class="form-group">
									<label>Station</label>
									<input type="text" name="station" class="form-control" value="{{$emergency->station}}">
								</div>
								
								<div class="form-group">
									<label>Location:</label>
									<textarea class="form-control" name="location" >{{$emergency->location}}</textarea>
								</div>
								 
								<div class="form-group">
									<label>Phone:</label>
									<input type="number" name="phone" class="form-control" value="{{$emergency->phone}}">
								</div>
								

								
								<div class="form-group">
									<label>City</label>
									<select class="form-control" name="city"> 
										<option value="">Choose List</option>
										@foreach($citys as $city)
										<option value="{{$city->id}}" 
												@if($emergency->city_id == $city->id)
											{{'selected'}}
											@endif 
											 
											>{{$city->name}}</option>
										@endforeach
										
									</select>
								</div>
								<div class="form-group">
									<label>State</label>
									<select class="form-control" name="state"> 
										<option selected disabled>Choose State</option>
										@foreach($states as $state)
										<option value="{{$state->id}}"
												@if($emergency->state_id == $state->id)
											{{'selected'}}
											@endif >{{$state->name}}</option>
										@endforeach
										
									</select>
								</div>
								
								<div class="form-group">
									<input  type="submit" class="btn btn-primary" value="Save">
								</div>
							</form>
						</div>
					</div>
			
		

		</div>
	 
</div>	
@endsection