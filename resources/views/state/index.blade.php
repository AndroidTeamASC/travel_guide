@extends('backtemplate')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="add">
			<h1>State </h1>
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<form action="{{route('state.store')}}" method="post" enctype="multipart/form-data">
				@csrf

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>state Name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="name" class="form-control">
				</div>
				
				
		 
				

			  
 
				
				
				<div class="col-md-3">
					<input type="submit" value="ADD">
				</div>
				</div>
			</form>	
		</div>
		<div class="edit">
			<h1> Edit state </h1>
			<form action="{{route('state.update',1)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<input type="hidden" name="edit_id" id="edit_id">
				<div class="row mt-4">
					<div class="col-md-3 ">
					<label>state Name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_name" class="form-control" id="edit_name">
				</div>
				
				
				

			  
 
				
				
				<div class="col-md-3">
					<input type="submit" value="Update">
				</div>
				</div>
			</form>	
		</div>

		

	<div class="col-md-8 offset-2 mt-5">

		<table class="table table-dark table-sm ">
			<tr>
				<th>NO.</th>
				<th>state Name</th>
				
				 
				<th colspan="2">Action</th>
			</tr>
			@php $i = 1; @endphp
			@foreach($states as $state)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$state->name}}</td>
			
				<td>
					<a href="#" class="btn btn-secondary  edit_item " 
					data-id="{{$state->id}}" 
					data-name = "{{$state->name}}" 
					>Edit</a>
				</td>
				<td>	
                    <form action="{{route('state.destroy',$state->id)}}" method="post">
                        @method('Delete')
                        @csrf

                        <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                     </form>


                </td>
			</tr>
			@endforeach
		</table>
	</div>
		
	</div>
	
</div>

@endsection

@section('script')

	<script type="text/javascript">
		
		$(document).ready(function(){
			$('.add').show();
			$('.edit').hide();
			$('.edit_item').click(function(){
				$('.edit').show();
				$('.add').hide();
				var id 			 = $(this).data('id');
				var name  		 = $(this).data('name');
				
			 
				console.log(id,name)
				$('#edit_id').val(id);
				$('#edit_name').val(name);
				
				 
			})
		})
	</script>

@endsection
