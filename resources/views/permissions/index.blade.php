@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1 class="display-9">
			Permissions
		</h1>
		<div class="col-sm-12">
  		@if(session()->get('success'))
   			<div class="alert alert-success">
      				{{ session()->get('success') }}
    			</div>
  		@endif
		</div>
		<!--	<div class="container h-100"> --> 
        <!--	<div class="d-flex h-10" style="margin:10px;"> 
			<div class="align-self-end ml-auto"> 
                		<button onclick="window.location='{{ route("contacts.create") }}'" type="button" class="btn btn-success"> 
                  			Add Contact 
                		</button> 
            		</div> 
		</div>
		--> 
    		<!-- </div> -->
	
		<table class="table table-striped">
			<thead>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td colspan = 2>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($permissions as $contact)
				<tr>
					<td>{{$contact->id}}</td>
					<td>{{$contact->name}}</td>
					<td>{{$contact->slug}}</td>
					<!-- <td>
                				<a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a>
						
					</td>
					<td>
                				<form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                  					@csrf
                  					@method('DELETE')
                  					<button class="btn btn-danger" type="submit">Delete</button>
               					 </form>
           				 </td> -->
				</tr>
        		@endforeach
    			</tbody>
  		</table>
<div>
</div>
@endsection

		
