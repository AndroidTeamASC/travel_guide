@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="card">
						<div class="card-header">Emergency Form

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

							<form method="post" action="{{route('emergency.store')}}" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label>Station</label>
									<input type="text" name="station" class="form-control">
								</div>
								
								<div class="form-group">
									<label>Location:</label>
									<textarea class="form-control" name="location" ></textarea>
								</div>
								 
								<div class="form-group">
									<label>Phone:</label>
									<input type="number" name="phone" class="form-control">
								</div>
								

								
								<div class="form-group">
									<label>City</label>
									<select class="form-control" name="city"> 
										<option value="">Choose List</option>
										@foreach($citys as $city)
										<option value="{{$city->id}}">{{$city->name}}</option>
										@endforeach
										
									</select>
								</div>
								<div class="form-group">
									<label>State</label>
									<select class="form-control" name="state"> 
										<option selected disabled>Choose State</option>
										@foreach($states as $state)
										<option value="{{$state->id}}">{{$state->name}}</option>
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
			<h3>emergencymation list</h3>
			<table class="table table-active">
				<thead>
					<th>NO.</th>
					<th>Title</th>
					<th>Phone No</th>
				 	<th>Address</th>
					<th>Action</th>
				</thead>
				@php $i = 1 @endphp
				  @foreach($emergencies as $emergency)	
				 <tbody>
              
                <tr class="tr-shadow">
                  <td>{{$i}}</td>
                  <td>{{$emergency->station}}</td>
                  <td>{{$emergency->phone}}</td>
                  <td>{{$emergency->location}}</td>
                  <td>
                    <a href="{{route('emergency.edit',$emergency->id)}}" class="btn btn-primary float-left mr-3">Edit </a>
							<form action="{{route('emergency.destroy',$emergency->id)}}" method="post">
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