@extends('layouts.admin')

@section('content')

                 
    <div class="row">
        <div class="col">
          <div class="card">
		  @if(session('status'))<h6 class="alert alert-success">{{session('status')}} </h6> @endif
            <!-- Card header -->
			<!--form method="POST" action="{{ url('/admin/addnew/item') }}" onsubmit="return validate() enctype="multipart/form-data""-->
	      
			<div class="card-header">
			<div class="d-flex justify-content-between">
			<h3 class="mb-5">New Item Saved</h3>
			
			</div>
			 <div class="container "> 
			 <div class="row">
			  <div class="col-12">
 
<h5><a href="/admin/addnew/item">Add new item in the same branch and category</a></h5>
</div>
<!-- div>
<h5>Change Category and add new item</h5>
</div -->
<div>
<h5><a href="/admin/selectbranch">Change Branch/Category add new item</a></h5>
</div>       
			
			


             </div>
                 



          </div>

		</div>
      </div>
</div>
@endsection