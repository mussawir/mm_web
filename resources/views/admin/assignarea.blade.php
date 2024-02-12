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
                <h3 class="mb-0">Assign Area Rider</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
            @foreach ($Assignarea as $list)
                <form action="{{url('/admin/assign/rider/'.$list->id)}}" method="post" enctype="multipart/form-data">
                     @CSRF
                    <div class="form-row">
                    <div class="col-md-4 mb-3" {{ $errors->has('city') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="exampleFormControlSelect1">Select city</label>
                    <select class="form-control" name="city" >
                      <option value="{{$list->city}}">{{$list->city != null ? $list->city : 'Select city' }}</option>
                        @foreach ($city as $list )
                        <option value="{{$list->id}}" name="city" >{{$list->label}}</option>
                       @endforeach
                    </select>
                      <span class="text-danger">{{ $errors->first('city') }}</span>
                    </div>
                    <div class="col-md-4 mb-3" {{ $errors->has('area') ? 'has-error' : '' }}>
                      <label class="form-control-label" for="exampleFormControlSelect1">Select area</label>
                    <select class="form-control" name="area" id="exampleFormControlSelect1">
                      <option value="{{$list->area}}">{{$list->area != null ? $list->area_label : 'Select area' }}</option>
                        @foreach ($area as $list )
                        <option value="{{$list->id}}" name="area" >{{$list->label}}</option>
                       @endforeach
                    </select>
                      <span class="text-danger">{{ $errors->first('area') }}</span>
                    </div>
                    
                    <div class="col-md-4 mb-3" {{ $errors->has('sub_area') ? 'has-error' : '' }}>
                           <label class="form-control-label" for="exampleFormControlSelect1">Select sub-area</label>
                    <select class="form-control" name="sub_area" id="exampleFormControlSelect1">
                    <option value="{{$list->sub_area}}">{{$list->sub_area != null ? $list->sub_area_label : 'Select sub-area' }}</option>
                       @foreach ($subarea as $list )
                        <option value="{{$list->id}}" name="sub_area" >{{$list->label}}</option>
                       @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('sub_area') }}</span>
                    </div>
                  </div>
                  
                  <button class="btn btn-primary" type="submit">Assign</button>
                  @endforeach
                </form>
              </div>
            </div>
          

          </div>
        </div>
      </div>
     
    </div>

    @endsection