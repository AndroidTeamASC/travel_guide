@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="card">
						<div class="card-header">Info Form

						</div>
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

							<form method="post" action="{{route('info.store')}}" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label>Place Name :</label>
									<input type="text" name="place_name" class="form-control">
								</div>
								<div class="form-group">
									<label>Photo:</label>
									<input type="file"  name="photo" class="form-control-file">
								</div>
								<div class="form-group">
									<label>Location:</label>
									<textarea class="form-control" name="location" ></textarea>
								</div>

								<div class="form-group">
									<label>Wonderful :</label>
									<input type="text" name="wonderful" class="form-control">
								</div>

								<div class="form-group">
									<label>Best Month :</label>
									<input type="text" name="best_month" class="form-control">
								</div>

								<div class="form-group">
									<label>Map :</label>
									<input type="text" name="map" class="form-control">
								</div>

								<div class="form-group">
									<label>Recommend :</label>
									<input type="text" name="recommend" class="form-control">
								</div>
								
								<div class="form-group">
									<label>Lat :</label>
									<input type="text" name="lat" class="form-control">
								</div>



								<div class="form-group">
									<label>Long :</label>
									<input type="text" name="long" class="form-control">
								</div>

								<div class="form-group">
									<label>Description:</label>
									<textarea class="form-control" name="description" ></textarea>
								</div>
								<div class="form-group">
									<label>City :</label>
									<select class="form-control" name="city"> 
										<option disabled selected >Choose City</option>
										@foreach($citys as $city)
										<option value="{{$city->id}}">{{$city->name}}</option>
										@endforeach
										
									</select>
								</div>

								<div class="form-group">
									<label>State :</label>
									<select class="form-control" name="state"> 
										<option disabled selected >Choose State</option>
										@foreach($states as $state)
										<option value="{{$state->id}}">{{$state->name}}</option>
										@endforeach
										
									</select>
								</div>

								<div class="form-group">
									<label>Category :</label>
									<select class="form-control" name="category"> 
										<option disabled selected >Choose State</option>
										@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->category_name}}</option>
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
		<div class="col-md-12 mt-5">
			<h3>Infomation list</h3>
			<table class="table table-active">
				<thead>
					<th>NO.</th>
					<th>Title</th>
				 	<th>Description</th>
					<th>Action</th>
				</thead>
				@php $i = 1 @endphp
				  @foreach($infos as $info)	
				 <tbody>
              
                <tr class="tr-shadow">
                  <td>{{$i}}</td>
                  <td>{{$info->place_name}}</td>
                  <td>{{$info->description}}</td>
                  <td>
                    <a href="{{route('info.edit',$info->id)}}" class="btn btn-primary float-left mr-3">Edit </a>
							<form action="{{route('info.destroy',$info->id)}}" method="post">
			                  @method('Delete')
			                  @csrf
			                  <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                			</form>
                  </td>
                </tr>
                <tr class="spacer"></tr>
              
             
              </tbody>
					@endforeach
			</table>
		</div>
</div>	
@endsection