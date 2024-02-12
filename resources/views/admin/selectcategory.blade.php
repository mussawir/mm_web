@extends('layouts.admin')

@section('content')

                 
    <div class="row">
        <div class="col">
          <div class="card">
		  @if(session('status'))<h6 class="alert alert-success">{{session('status')}} </h6> @endif
            <!-- Card header -->
			<!--form method="POST" action="{{ url('/admin/addnew/item') }}" onsubmit="return validate() enctype="multipart/form-data""-->
	        <form method="POST" action="{{ url('/admin/savecategory')}}" enctype="multipart/form-data">
              @csrf
			<div class="card-header">
			<div class="d-flex justify-content-between">
			<h3 class="mb-5">Select Category</h3>
			</div>
			 <div class="container "> 
			 <div class="row">
			              
<div class="col-12 mb-3">
		 	 
</div>
			 
<div class="col-12 mb-3">
			 
			   <label for="example-text-input" class="form-control-label d-block">Select a category   <span class="text-danger">{{ $errors->first('name') }}</span></label>
             	  <select name="category_id"  class="alert alert-light border border-5 w-100" >
                    @foreach($categories as $cats)
                     <option value="{{$cats->id}}"  name="name" class='text-dark'>{{$cats->name}} </option>
                    @endforeach

              </select>	 
     
           
			 
</div>			

 <div class="d-flex justify-content-end mt-5">
	  
	  <button type="submit"  class="btn btn-primary">Add Product Details</button>
	  </div>

          </div>
     </form>
		</div>
      </div>
</div>
@endsection