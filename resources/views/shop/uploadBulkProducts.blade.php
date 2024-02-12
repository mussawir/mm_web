@extends('layouts.shop')

@section('content')

                 
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card-wrapper">
     
            <!-- Default browser form validation -->
          <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Upload Bulk Items List .xls, .xslx Format.</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
               
               <form action="{{url('/shop/upload-store-items/'.$id)}}" method="post" enctype="multipart/form-data">
                     @CSRF
                      <div className="form-row">

                        <div className="col-md-4 mb-3">
                          <div className="form-group">
                            <label className="form-control-label" >Select File for Upload Items List</label>
                            <input type="file" name="myFile" className="form-control" required/>
                          </div>
                        </div>

                        <div className="col-md-4 mb-3">
                          <div className="form-group upload-item-button">
                          <input type="submit" name="upload" className="btn btn-primary" onClick={onFileUpload} />
                            <!--{/* <button className="btn btn-primary" type="submit">Submit form</button> */}-->
                          </div>
                        </div>

                      </div>
                    
                    </form>
              </div>
            </div>
            
            <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Shop Items List</h3>
              </div>
              
          <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                
                <thead className="thead-light">

                          <tr>
                          <th>S.NO</th>
                          <th>Item Name</th>
                          <th>Discount</th>
                          <th>Stock</th>
                          <th>price</th>
                          <th>images</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                          <th>S.NO</th>
                          <th>Item Name</th>
                          <th>Discount</th>
                          <th>Stock</th>
                          <th>price</th>
                          <th>images</th>
                          </tr>
                        </tfoot>
                    
                        <tbody>
                            @forelse($get_products as $key => $list)
                       <tr>
                     <td>{{$key + 1}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->discount}}</td>
                    <th>
                        <p>
                            {{ $list->instock == '1' ? 'Available' : 'Out Of Stock' }}
                            </p>
                        
                        
                    </th>
                    <td>{{$list->price}} Rs</td>
                    
                    <td><img src={{$list->main_image}} height="50px"/></td>
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
      </div>
      <!-- Footer -->
     
    </div>

    @endsection