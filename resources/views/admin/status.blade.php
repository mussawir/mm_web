@extends('layouts.admin')

@section('content')

                 
    <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
			<div>
			 <h3 class="mb-3">Status</h3>
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
             
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="searching_table">
                <thead class="thead-light">
                  <tr>
                    <th>S.NO</th>
                    <th>Product Image</th>
                    <th>Instock</th>
                    <th>Qty</th>
                    <th>Qty Reorder</th>
              
                   
                    <!--<th>add items</th>-->
                  </tr>
                </thead>
                <tbody>
                     @forelse ($Status as $key => $list )
                  <tr>
                    <td>{{ $key + 1 }}</td>
					<td>  <img src='{{($list->image)}}' class="img-fluid w-25" alt="Product-image"></img></td>
                    <td>{{$list->instock}}</td>
                    <td>{{$list->qty}}</td>
                    <td>{{$list->qty_reorder}}</td>
					 
                    
					
					
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