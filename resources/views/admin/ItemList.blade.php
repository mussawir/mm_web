@extends('layouts.admin')

@section('content')

                 
    <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
			<div class="d-flex justify-content-between">
			 <h3 class="mb-3">Item Lists</h3>
			<button class="btn btn-primary" > <a href="/admin/branches"  class="text-white text-decoration-none">New  </a></button>
			</div>
			
			<div class="navbar-search navbar-search-light w-50" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" id="search" name="search" class="form-control" placeholder="Search" />
              </div>
            </div>
          </div>
          
            </div>
            <div class="table-responsive py-4">
              <table  id="searching_table" class="table table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>S.NO</th>
					<th>Image</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Instock</th>
                    <th>Qty</th>
                  
					 
                    <!--th class="d-flex justify-content-center">Actions</th-->
                   
                  
                  </tr>
                </thead>
                <tbody>
                     @forelse ($ItemsList as $key => $list )
                  <tr>
                    <td>{{ $key + 1 }}</td>
					<td>  <img src="{{$list->image}}" class="img-fluid w-75" alt="Product-image"></img></td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->description}}</td>
                    <td>{{$list->price}}</td>
                    <td>{{$list->discount}}</td>
					
					@switch($list->instock)
						@case($list->instock == 0)
							<td class="status">No</td>
							@break
			 
						 @case($list->instock == 1)
							<td class="status">Yes</td>
							@break
						 
						@default
							<td class="status">{$list->instock}</td>
					@endswitch
            
                    <td>{{$list->qty}}</td>
                    <!--td>{{$list->qty_reorder}}</td-->
					<!--td> <button class="btn btn-primary"><a href="/admin/edit/item" class="text-white text-decoration-none"> Edit </a></</button> </td-->


					<!--button class="btn btn-danger">Delete</button-->   
                    
					
					
                    <td class="text-center">
                <!--a href="{{url('/admin/open-store/'.$list->id)}}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Approved Shop">
                <span class="btn-inner--icon"><i class="fas fa-chalkboard"></i></span>
                <span class="btn-inner--text">Details</span>
              </a -->
               </td>
              <!--  <td className="text-center">-->
              <!--  <a href="{{url('/admin/store/'.$list->id)}}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit product">-->
              <!--  <span class="btn-inner--icon"><i class="fas fa-address-card"></i></span>-->
              <!--  <span class="btn-inner--text">Create</span>-->
              <!--</a>-->
              <!-- </td>-->
                  </tr>
                  
                  @empty
                      <tr>
                        <td>
                         <a class="font-w600" href="javascript:void(0)"></a>
                          </td>
                          <td>
                          <span class="badge badge-info"></span>
                           </td>
                          <td class="d-none d-sm-table-cell">

                          </td>
                          <td class="d-none d-sm-table-cell">
                          <a href="javascript:void(0)"></a>
                          </td>
                          <td class="d-none d-sm-table-cell">
                          <a href="javascript:void(0)"> </a>
                          </td>
                         <td class="text-right">
                         <span class="text-black"></span>
                          </td>
                         </tr>
                         
                       @endforelse
                       
                </tbody>
              </table>  
              
            </div>
          </div>
        </div>
      </div>
	  
	  
	   <script>  
      $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#searching_table tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  
 </script>
	
	  
	  

    @endsection