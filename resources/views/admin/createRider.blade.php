@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card-wrapper">
            <!-- Custom form validation -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Create New Rider</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
            
                <form action="{{url('/admin/shop/registered')}}" method="post" enctype="multipart/form-data">
                     @CSRF
                  <div class="form-row">
                    <div class="col-md-4 mb-3" {{ $errors->has('first_name') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">First Name</label>
                      
                      <input type="text" class="form-control" id="validationCustom01" name="first_name" value="{{ old('first_name') }}"  placeholder="Please enter first name">
                      <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    </div>
                    <div class="col-md-4 mb-3" {{ $errors->has('last_name') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom02">Last Name</label>
                      <input type="text" class="form-control" id="validationCustom02" name="last_name" value="{{ old('last_name') }}" placeholder="Please enter last name">
                      <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('reference_number') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustomUsername">Reference phone number</label>
                      <input type="text" class="form-control" id="validationCustomUsername" name="reference_number" value="{{ old('reference_number') }}" placeholder="Please enter Ref phone number">
                      <span class="text-danger">{{ $errors->first('reference_number') }}</span>
                    </div>
                    
                    
                  </div>
                  
                  
                     <div class="form-row">
                         <div class="col-md-4 mb-3" {{ $errors->has('address') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustomUsername">Rider Address</label>
                     
                      <input type="text" class="form-control" id="validationCustomUsername" name="address" value="{{ old('address') }}"  placeholder="Please enter rider address"  aria-describedby="inputGroupPrepend">
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('whatsapp_number') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Whatsapp phone number</label>
                      <input type="text" class="form-control" id="validationCustom01" name="whatsapp_number" value="{{ old('whatsapp_number') }}" max="5"  placeholder="Please enter whatsapp phone number">
                      <span class="text-danger">{{ $errors->first('whatsapp_number') }}</span>
                    </div>
                    <div class="col-md-4 mb-3" {{ $errors->has('email') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom02">Please Enter Email</label>
                      <input type="text" class="form-control" id="validationCustom02" name="email" value="{{ old('email') }}"  placeholder="Please enter email">
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                   
                  </div>
                  
                  
                      <div class="form-row">
                    <div class="col-md-4 mb-3" {{ $errors->has('area') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="exampleFormControlSelect1">Select area</label>
                    <select class="form-control" name="area" value="{{ old('area') }}" id="exampleFormControlSelect1">
                        <option value="0">--Select area--</option>
                        @foreach ($Rarea as $list )
                        <option value="{{$list->id}}" name="area" >{{$list->label}}</option>
                       @endforeach
                    </select>
                     <span class="text-danger">{{ $errors->first('area') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('sub_area') ? 'has-error' : '' }}>
                           <label class="form-control-label" for="exampleFormControlSelect1">Select sub-area</label>
                    <select class="form-control" name="sub_area" value="{{ old('sub_area') }}" id="exampleFormControlSelect1">
                
                      <option value="0">--Select sub-area--</option>
                       @foreach ($Rsubarea as $list )
                        <option value="{{$list->id}}" name="sub_area" >{{$list->label}}</option>
                       @endforeach
                       
                    </select>
                     <span class="text-danger">{{ $errors->first('sub_area') }}</span>
                    </div>
                    
                     <div class="col-md-4 mb-3" {{ $errors->has('category') ? 'has-error' : '' }}>
                           <label class="form-control-label" for="exampleFormControlSelect1">Select Category</label>
                    <select class="form-control" name="category" value="{{ old('category') }}" id="exampleFormControlSelect1">
                        <option value="0">--Select category--</option>
                       @foreach ($Rshop_categories as $list )
                        <option value="{{$list->id}}" name="shop_category" >{{$list->name}}</option>
                       @endforeach
                       
                    </select>
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                    </div>
                    
                
                  </div>
                  
                  
                    <div class="form-row">
                        <div class="col-md-4 mb-3" {{ $errors->has('geo_location') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom02">Geo-location</label>
                      <input type="text" class="form-control" id="validationCustom02" name="geo_location" value="{{ old('geo_location') }}"  placeholder="Please enter Geo-location">
                    <span class="text-danger">{{ $errors->first('geo_location') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('city') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustomUsername">City</label>
                      <input type="text" class="form-control" id="validationCustomUsername" name="city" placeholder="Please enter city" value="karachi" aria-describedby="inputGroupPrepend">
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                    </div>
                    <div class="col-md-4 mb-3" {{ $errors->has('points_balance') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Points balance</label>
                      <input type="text" class="form-control" id="validationCustom01" name="points_balance" value="{{ old('points_balance') }}" placeholder="Please enter points balance">
                    <span class="text-danger">{{ $errors->first('points_balance') }}</span>
                    </div>
                    
                    
                    
                  </div>
                  
                  
                  <div class="form-row">
                    <!--<div class="col-md-4 mb-3" {{ $errors->has('payment') ? 'has-error' : '' }}>-->
                    <!--  <label class="form-control-label" for="validationCustom01">Payment</label>-->
                    <!--  <input type="number" class="form-control" id="validationCustom01" name="payment" value="{{ old('payment') }}" placeholder="Please enter payment">-->
                    <!--<span class="text-danger">{{ $errors->first('payment') }}</span>-->
                    <!--</div>-->
                    
                  <div class="col-md-4 mb-3" {{ $errors->has('start_date') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Start date</label>
                      <input class="form-control" type="date" name="start_date" value="{{ old('start_date') }}"  id="example-date-input">
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                    </div>
                    
                      <div class="col-md-4 mb-3" {{ $errors->has('end_date') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">End date</label>
                      <input class="form-control" type="date" name="end_date" value="{{ old('end_date') }}"  id="example-date-input">
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                    </div>
                    
                  </div>
                 
                 <!--<div class="form-row">-->
                 <!--<div class="col-md-4 mb-6" {{ $errors->has('image') ? 'has-error' : '' }}>-->
                 <!--     <label class="form-control-label" for="validationCustom01">Shop logo</label>-->
                 <!--       <div class="custom-file">-->
                 <!--   <input type="file" name="image" class="custom-file-input" id="customFileLang" lang="en">-->
                 <!--   <label class="custom-file-label" for="customFileLang"></label>-->
                   
                 <!-- </div>-->
                 <!--  <span class="text-danger">{{ $errors->first('image') }}</span>-->
                 <!--   </div>-->
                 <!--   </div>-->
                  
                  <div class="form-row">
                      <div class="col-md-4 mb-3">
                  <button class="btn btn-primary" type="submit">Create</button>
                  </div>
                  </div>
              
                </form>
              </div>
            </div>
          

          </div>
        </div>
      </div>
     
    </div>

    @endsection