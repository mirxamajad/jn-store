@extends('layouts.app')
@section('content')
<div class="page-content-wrapper">
    <!-- start page content-->
   <div class="page-content">

    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">All Orders</div>
    </div>
    <!--end breadcrumb-->
          <hr/>
          @if (session('status'))
            <div class="alert alert-dismissible fade show py-2 bg-success">
                <div class="d-flex align-items-center">
                  <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp"></ion-icon>
                  </div>
                  <div class="ms-3">
                    <div class="text-white">{{ session('status') }}</div>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        @endif
          <div class="card">
              <div class="card-body">
                  <div class="table-responsive">
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Customer Name</th>
                                  <th>Email</th>
                                  <th>Phone</th>
                                  <th>Address</th>
                                  <th>Amount</th>
                                  {{-- <th>Action</th> --}}
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($checkout as $key)
                                <tr>
                                    <td>
                                       {{$key->name}}
                                    </td>
                                    <td>{{$key->email}}</td>
                                    <td>{{$key->phone}}</td>
                                    <td>{{$key->address_1}} </td>
                                    <td>{{$key->amount}}</td>
                                    {{-- <td>
                                        <a href="#" class="btn btn-primary"> View </a>
                                        <a href="#" class="btn btn-success"> Edit </a>
                                        <a href="#" class="btn btn-danger"> Delete </a>
                                    </td> --}}
                                </tr>
                              @endforeach

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
    </div>
    <!-- end page content-->
  </div>
@endsection
