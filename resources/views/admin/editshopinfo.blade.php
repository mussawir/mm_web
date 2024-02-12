@extends('layouts.admin')

@section('content')

              <!--raheeellllllllllllllllllllllllllllllllllllllllllllll   -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card-wrapper">
            <!-- Custom form validation -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Update Shop</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
            @foreach ($shop as $info )
                <form action="{{url('/admin/updated/shop/'.$info->id)}}" method="post" enctype="multipart/form-data">
                     @CSRF
                  <div class="form-row">
                    <div class="col-md-4 mb-3" {{ $errors->has('shop_owner') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Shop owner</label>
                      <input type="text" class="form-control" id="validationCustom01" name="shop_owner" placeholder="Please enter owner name" value="{{$info->shop_owner}}"  >
                      <span class="text-danger">{{ $errors->first('shop_owner') }}</span>
                    </div>
                    <div class="col-md-4 mb-3" {{ $errors->has('shop_name') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom02">Shop name</label>
                      <input type="text" class="form-control" id="validationCustom02" name="shop_name" placeholder="Please enter shop name" value="{{$info->shop_name}}"  >
                      <span class="text-danger">{{ $errors->first('shop_name') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('sale_type') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustomUsername">Sale types</label>
                      <input type="text" class="form-control" id="validationCustomUsername" name="sale_type" value="{{$info->sales_type}}" placeholder="Please enter sale types" aria-describedby="inputGroupPrepend">
                     <span class="text-danger">{{ $errors->first('sale_type') }}</span>
                    </div>
                    
                    
                  </div>
                  
                  
                     <div class="form-row">
                         <div class="col-md-4 mb-3" {{ $errors->has('shop_address') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustomUsername">shop Address</label>
                     
                      <input type="text" class="form-control" id="validationCustomUsername" name="shop_address" placeholder="Please enter shop Address" value="{{$info->address}}" aria-describedby="inputGroupPrepend">
                     <span class="text-danger">{{ $errors->first('shop_address') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('whatsapp_number') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Whatsapp phone number</label>
                      <input type="text" class="form-control" id="validationCustom01" name="whatsapp_number" placeholder="Please enter whatsapp phone number" max="5" value="{{$info->phone_number}}">
                      <span class="text-danger">{{ $errors->first('whatsapp_number') }}</span>
                    </div>
                    <div class="col-md-4 mb-3" {{ $errors->has('email') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom02">Email</label>
                      <input type="text" class="form-control" id="validationCustom02" name="email" value="{{$info->email}}" placeholder="Please enter email">
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                   
                  </div>
                  
                  
                      <div class="form-row">
                    <div class="col-md-4 mb-3" {{ $errors->has('area') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="exampleFormControlSelect1">Select area</label>
                    <select class="form-control" name="area" id="exampleFormControlSelect1">
                      <option value="{{$info->area}}">{{$info->area != null ? $info->area_label : 'Select area' }}</option>
                        @foreach ($area as $list )
                        <option value="{{$list->id}}" name="area" >{{$list->label}}</option>
                       @endforeach
                    </select>
                      <span class="text-danger">{{ $errors->first('area') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('sub_area') ? 'has-error' : '' }}>
                           <label class="form-control-label" for="exampleFormControlSelect1">Select sub-area</label>
                    <select class="form-control" name="sub_area" id="exampleFormControlSelect1">
                      <option value="{{$info->sub_area}}">{{$info->sub_area != null ? $info->sub_area_label : 'Select sub-area' }}</option>
                      
                       @foreach ($subarea as $list )
                        <option value="{{$list->id}}" name="sub_area" >{{$list->label}}</option>
                       @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('sub_area') }}</span>
                    </div>
                    
                      <div class="col-md-4 mb-3" {{ $errors->has('category') ? 'has-error' : '' }}>
                           <label class="form-control-label" for="exampleFormControlSelect1">Select Category</label>
                    <select class="form-control" name="category" value="{{ old('category') }}" id="exampleFormControlSelect1">
                      
                       @foreach ($shop_categories as $list )
                        <option value="{{$list->id}}" name="shop_category" >{{$list->name}}</option>
                       @endforeach
                       
                    </select>
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                    </div>
                  </div>
                  
                  
                    <div class="form-row">
                        <div class="col-md-4 mb-3" {{ $errors->has('geo_location') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom02">Geo-location</label>
                      <input type="text" class="form-control" id="validationCustom02" name="geo_location" placeholder="Please enter Geo-location" value="{{$info->geo_location}}">
                      <span class="text-danger">{{ $errors->first('geo_location') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('city') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustomUsername">City</label>
                      <input type="text" class="form-control" id="validationCustomUsername" name="city" placeholder="Please enter city" value="{{$info->city}}" aria-describedby="inputGroupPrepend">
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                    </div>
                    <div class="col-md-4 mb-3" {{ $errors->has('points_balance') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Points balance</label>
                      <input type="text" class="form-control" id="validationCustom01" name="points_balance" value="{{$info->points_balance}}" placeholder="Please enter points balance" >
                    <span class="text-danger">{{ $errors->first('points_balance') }}</span>
                    </div>
                  </div>
                  
                  
                  <div class="form-row">
                      
                       <div class="col-md-4 mb-3" {{ $errors->has('payment') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Payment</label>
                      <input type="number" class="form-control" id="validationCustom01" name="payment" value="{{$info->payment}}" placeholder="Please enter payment" >
                    <span class="text-danger">{{ $errors->first('payment') }}</span>
                    </div>
                      
                  <div class="col-md-4 mb-3" {{ $errors->has('start_date') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Start date</label>
                      <input class="form-control" type="date" name="start_date" value="{{$info->start_date}}"  id="example-date-input">
                      <span class="text-danger">{{ $errors->first('start_date') }}</span>
                    </div>
                    
                      <div class="col-md-4 mb-3" {{ $errors->has('end_date') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">End date</label>
                      <input class="form-control" type="date" name="end_date" value="{{$info->end_data}}"  id="example-date-input">
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                    </div>
                  </div>
                  
                  <div class="form-row">
                      <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustom01">Shop Logo</label>
                     <div class="card">
                <input type="text" class="form-control" id="validationCustom01" name="shop_logo" value="{{$info->logo_type}}" hidden >
         
             <img class="card-img-top" src="{{$info->logo_type}}"  alt="Image placeholder">
            </div>
          </div>
          </div>
          
                    <div class="form-row">
                     <div class="col-md-4 mb-6" {{ $errors->has('image') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Shop logo</label>
                        <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input"  id="customFileLang" lang="en">
                    <label class="custom-file-label" for="customFileLang"></label>
                  </div>
                  <span class="text-danger">{{ $errors->first('image') }}</span>
                    </div>
                    </div>
                 
                  <button class="btn btn-primary" type="submit">Submit form</button>
                  
                  @endforeach
                </form>
              </div>
            </div>
          

          </div>
        </div>
      </div>
     
    </div>

    @endsection