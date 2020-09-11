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

							<form method="post" action="{{route('info.update',$info->id)}}" enctype="multipart/form-data">
								@csrf
								@method('PUT')
								<div class="form-group">
									<label>Place Name :</label>
									<input type="text" name="edit_place_name" class="form-control" value="{{$info->place_name}}">
								</div>
								<div class="form-group">
									<label>Photo:</label>
									<input type="file"  name="photo" class="form-control-file">
									 <input type="text" name="old_photo" value="{{$info->image}}">
                                 
                                     
                                        <img src="{{$info->image}}" width="150" height="150">    
								</div>
								<div class="form-group">
									<label>Location:</label>
									<input class="form-control" name="edit_location" value="{{$info->location}}" type="text">
								</div>

								<div class="form-group">
									<label>Wonderful :</label>
									<input type="text" name="edit_wonderful" class="form-control" value="{{$info->wonderful}}">
								</div>

								<div class="form-group">
									<label>Best Month :</label>
									<input type="text" name="edit_best_month" class="form-control" value="{{$info->best_month}}">
								</div>

								<div class="form-group">
									<label>Map :</label>
									<input type="text" name="edit_map" class="form-control" value="{{$info->map}}">
								</div>

								<div class="form-group">
									<label>Recommend :</label>
									<input type="text" name="edit_recommend" class="form-control" value="{{$info->recommend}}">
								</div>
								
								<div class="form-group">
									<label>Lat :</label>
									<input type="text" name="edit_lat" class="form-control" value="{{$info->lat}}">
								</div>



								<div class="form-group">
									<label>Long :</label>
									<input type="text" name="edit_long" class="form-control" value="{{$info->long}}">
								</div>

								<div class="form-group">
									<label>Description:</label>
									<textarea class="form-control" name="edit_description" >{{$info->description}}</textarea>
								</div>

								<div class="form-group">
									<label>Description:</label>
									<textarea class="form-control" name="description" >{{$info->description}}</textarea>
								</div>
								<div class="form-group">
									<label>City :</label>
									<select class="form-control" name="city"> 
										<option disabled selected >Choose City</option>
										@foreach($citys as $city)
										<option value="{{$city->id}}"
											@if($city->id == $info->city_id)
											{{'selected'}}
											@endif
											>{{$city->name}}</option>
										@endforeach
										
									</select>
								</div>

								<div class="form-group">
									<label>State :</label>
									<select class="form-control" name="state"> 
										<option disabled selected >Choose State</option>
										@foreach($states as $state)
										<option value="{{$state->id}}"
											@if($state->id == $info->state_id)
											{{'selected'}}
											@endif
											>{{$state->name}}</option>
										@endforeach
										
									</select>
								</div>

								<div class="form-group">
									<label>Category :</label>
									<select class="form-control" name="category"> 
										<option disabled selected >Choose category</option>
										@foreach($categories as $category)
										<option value="{{$category->id}}"
											@if($category->id == $info->category_id)
											{{'selected'}}
											@endif
											>{{$category->category_name}}</option>
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