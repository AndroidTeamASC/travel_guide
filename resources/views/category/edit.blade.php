@extends('backtemplate')
@section('content')
	<div class="col-md-10 offset-1">
		 
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Lisst</h3>
			</div>
			<form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="card-body">
 
					<div class="row form-group">
						<div class="col-md-3 ">
							<label>Category Name</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="category_name" class="form-control" value="{{$category->category_name}}">
						</div>
	
					</div>
						<div class="row form-group">
						<div class="col-md-3 ">
							<label>Image</label>
						</div>
						<div class="col-md-4">
							<input type="file" name="category_image" class="form-control">
						</div>
						<div class="col-md-4">
							<img src="{{$category->category_image}}" width="200" height="150">
							<input type="hidden" name="old_image" value="{{$category->category_image}}" class="form-control">
						</div>
	
					</div>
					
					<input type="submit" value="ADD" class="btn btn-dark">
				</div>
			</form>	
			
		</div>	
			
		

		</div>
		 
</div>	
@endsection