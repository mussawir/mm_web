@extends('layouts.admin')

@section('content')

                 
    <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Approved Riders List</h3>
            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th>S.NO</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>PhoneNumber</th>
                    <th>HouseNumber</th>
                    <th>Street</th>
                    <th>Address</th>
                    <th>Edit Rider info</th>
                    <th>Action Details</th>
                    <th>Action Area</th>
                  </tr>
                </thead>
                <!--<tfoot>-->
                <!--  <tr>-->
                <!--    <th>S.NO</th>-->
                <!--    <th>FirstName</th>-->
                <!--    <th>LastName</th>-->
                <!--    <th>PhoneNumber</th>-->
                <!--    <th>HouseNumber</th>-->
                <!--    <th>Street</th>-->
                <!--    <th>address</th>-->
                <!--    <th>edit Rider info</th>-->
                <!--    <th>add rider</th>-->
                <!--  </tr>-->
                <!--</tfoot>-->
                <tbody>
                    @forelse ($approved_Riders as $key => $list )
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{$list->first_name}}</td>
                    <td>{{$list->last_name}}</td>
                    <td>{{$list->phone_number}}</td>
                    <td>{{$list->house_number}}</td>
                    <td>{{$list->street}}</td>
                    <td>{{$list->address}}</td>
                <td className="text-center">
                <a href="{{url('/admin/open-store/rider/approved/'.$list->id)}}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit Rider">
                <span class="btn-inner--icon"><i class="fas fa-chalkboard"></i></span>
                <span class="btn-inner--text">Edit</span>
                </a>
                </td>
                <td className="text-center">
                <a href="#" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="ReadOnly Rider Details">
                <span class="btn-inner--icon"><i class="fas fa-address-card"></i></span>
                <span class="btn-inner--text">Details</span>
                </a>
                </td>
                <td className="text-center">
                <a href="{{url('/admin/assignarea/rider/'.$list->id)}}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Rider Assign Area">
                <span class="btn-inner--icon"><i class="fas fa-chart-area"></i></span>
                <span class="btn-inner--text">Assign Area</span>
                </a>
                </td>
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

    @endsection