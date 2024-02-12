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
                <h3 class="mb-0">Approved Rider</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
            @foreach ($hello as $info )
                <form action="{{url('/admin/update/rider/'.$info->id)}}" method="post" enctype="multipart/form-data">
                     @CSRF
                  <div class="form-row">
                    <div class="col-md-4 mb-3" {{ $errors->has('first_name') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">First Name</label>
                      <input type="text" class="form-control" id="validationCustom01" name="first_name" placeholder="Please enter first name" value="{{$info->first_name}}"  >
                      <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    </div>
                    <div class="col-md-4 mb-3" {{ $errors->has('last_name') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom02">Last Name</label>
                      <input type="text" class="form-control" id="validationCustom02" name="last_name" placeholder="Please enter last name" value="{{$info->last_name}}"  >
                      <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('reference_number') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustomUsername">Reference phone number</label>
                      <input type="text" class="form-control" id="validationCustomUsername" name="reference_number" placeholder="Please enter ref phone number" aria-describedby="inputGroupPrepend">
                     <span class="text-danger">{{ $errors->first('reference_number') }}</span>
                    </div>
                    
                    
                  </div>
                  
                  
                     <div class="form-row">
                         <div class="col-md-4 mb-3" {{ $errors->has('shop_address') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustomUsername">Rider Address</label>
                     
                      <input type="text" class="form-control" id="validationCustomUsername" name="shop_address" placeholder="Please enter rider address" value="{{$info->address != null ? $info->address : null }}" aria-describedby="inputGroupPrepend">
                     <span class="text-danger">{{ $errors->first('shop_address') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('whatsapp_number') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Whatsapp phone number</label>
                      <input type="text" class="form-control" id="validationCustom01" name="whatsapp_number" placeholder="Please enter whatsapp phone number" max="5" value="{{$info->phone_number}}">
                      <span class="text-danger">{{ $errors->first('whatsapp_number') }}</span>
                    </div>
                    <div class="col-md-4 mb-3" {{ $errors->has('email') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom02">Email</label>
                      <input type="text" class="form-control" id="validationCustom02" name="email" placeholder="Please enter email">
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
                
                  </div>
                  
                  
                    <div class="form-row">
                        <div class="col-md-4 mb-3" {{ $errors->has('geo_location') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom02">Geo-location</label>
                      <input type="text" class="form-control" id="validationCustom02" name="geo_location" placeholder="Please enter Geo-location" value="{{$info->geo_location != null ? $info->geo_location : null }}">
                      <span class="text-danger">{{ $errors->first('geo_location') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('city') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustomUsername">City</label>
                      <input type="text" class="form-control" id="validationCustomUsername" name="city" placeholder="Please enter city" aria-describedby="inputGroupPrepend">
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                    </div>
                    <div class="col-md-4 mb-3" {{ $errors->has('house_number') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">House Number</label>
                      <input type="text" class="form-control" id="validationCustom01" name="house_number" placeholder="Please enter house number" value="{{$info->house_number}}" >
                    <span class="text-danger">{{ $errors->first('house_number') }}</span>
                    </div>
                  </div>
                  
                  
                  <div class="form-row">
                      
                    <div class="col-md-4 mb-3" {{ $errors->has('street') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Street</label>
                      <input type="text" class="form-control" id="validationCustom01" name="street" placeholder="Please enter house number" value="{{$info->street}}" >
                    <span class="text-danger">{{ $errors->first('street') }}</span>
                    </div>
                      
                  <div class="col-md-4 mb-3" {{ $errors->has('start_date') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">Start date</label>
                      <input class="form-control" type="date" name="start_date"  id="example-date-input">
                      <span class="text-danger">{{ $errors->first('start_date') }}</span>
                    </div>
                    
                      <div class="col-md-4 mb-3" {{ $errors->has('end_date') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="validationCustom01">End date</label>
                      <input class="form-control" type="date" name="end_date"  id="example-date-input">
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                    </div>
                  </div>
                  
                     
                  <!--  <div class="form-row">-->
                  <!--   <div class="col-md-4 mb-6" {{ $errors->has('image') ? 'has-error' : '' }}>-->
                  <!--    <label class="form-control-label" for="validationCustom01">Shop logo</label>-->
                  <!--      <div class="custom-file">-->
                  <!--  <input type="file" name="image" class="custom-file-input" id="customFileLang" lang="en">-->
                  <!--  <label class="custom-file-label" for="customFileLang"></label>-->
                  <!--</div>-->
                  <!--<span class="text-danger">{{ $errors->first('image') }}</span>-->
                  <!--  </div>-->
                  <!--  </div>-->
                 
                  <button class="btn btn-primary" type="submit">Approve</button>
                  
                  @endforeach
                </form>
              </div>
            </div>
          

          </div>
        </div>
      </div>
     
    </div>

    @endsection