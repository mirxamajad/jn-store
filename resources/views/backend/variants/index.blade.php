@extends('layouts.app')
@section('content')
<div class="page-content-wrapper">
    <!-- start page content-->
   <div class="page-content">

    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Variant</div>
    </div>
    <!--end breadcrumb-->


        <div class="row">
            <div class="col-6">
                <h6 class="mb-0 text-uppercase">All Variants</h6>
            </div>
            <div class="col-6 d-flex flex-row-reverse">
                <a href="{{ route('productvariant.create') }}" type="button" class="btn btn-primary" >New Variant</a>
            </div>
        </div>
        <br>
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
                                  <th>Product Name</th>
                                  <th>Status</th>
                                  <th>Size</th>
                                  <th>Color</th>
                                  <th>Quantity</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($vari as $key)
                                <tr>
                                    <td>
                                       {{$key->product['name']}}
                                    </td>
                                    <td>{{$key->status}}</td>
                                    <td>{{$key->size}}</td>
                                    <td> <span style="background: {{$key->color}};border-radius:5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        </td>
                                    <td>{{$key->quntity}}</td>
                                    <td>
                                        {{-- <a href="#" class="btn btn-primary"> View </a> --}}
                                        <a href="{{ route('productvariant.edit',$key->id) }}" class="btn btn-success"> Edit </a>
                                        <form action="{{ route('productvariant.destroy', $key->id) }}" method="POST" onsubmit="return confirm();" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                        </form>
                                    </td>
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
