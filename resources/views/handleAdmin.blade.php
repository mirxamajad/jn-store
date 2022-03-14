@extends('layouts.app')

@section('content')
 <!-- start page content wrapper-->
 <div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

      <!--start breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        {{-- <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
              <li class="breadcrumb-item"><a href="javascript:;">
                  <ion-icon name="home-outline"></ion-icon>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">eCommerce</li>
            </ol>
          </nav>
        </div> --}}
        {{-- <div class="ms-auto">
          <div class="btn-group">
            <button type="button" class="btn btn-outline-primary">Settings</button>
            <button type="button"
              class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
              data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                href="javascript:;">Action</a>
              <a class="dropdown-item" href="javascript:;">Another action</a>
              <a class="dropdown-item" href="javascript:;">Something else here</a>
              <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
          </div>
        </div> --}}
      </div>
      <!--end breadcrumb-->


      <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
        <div class="col">
          <div class="card radius-10">
            <div class="card-body">
              <div class="d-flex align-items-center gap-2">
                <div class="fs-5">
                  <ion-icon name="person-add-outline"></ion-icon>
                </div>
                <div>
                  <p class="mb-0">Users</p>
                </div>
                <div class="fs-5 ms-auto">
                  <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                </div>
              </div>
              <div class="d-flex align-items-center mt-3">
                <div>
                  <h5 class="mb-0">{{count($users)}}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card radius-10">
            <div class="card-body">
              <div class="d-flex align-items-center gap-2">
                <div class="fs-5">
                    <i class="fadeIn animated bx bx-coin-stack"></i>
                </div>
                <div>
                  <p class="mb-0">Orders</p>
                </div>
                <div class="fs-5 ms-auto">
                  <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                </div>
              </div>
              <div class="d-flex align-items-center mt-3">
                <div>
                  <h5 class="mb-0">{{$totalOrders}}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card radius-10">
            <div class="card-body">
              <div class="d-flex align-items-center gap-2">
                <div class="fs-5">
                    <i class="fadeIn animated bx bx-gift"></i>
                </div>
                <div>
                  <p class="mb-0">Products</p>
                </div>
                <div class="fs-5 ms-auto">
                  <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                </div>
              </div>
              <div class="d-flex align-items-center mt-3">
                <div>
                  <h5 class="mb-0">{{count($product)}}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card radius-10">
            <div class="card-body">
              <div class="d-flex align-items-center gap-2">
                <div class="fs-5">
                    <i class="fadeIn animated bx bx-money"></i>
                </div>
                <div>
                  <p class="mb-0">Payments</p>
                </div>
                <div class="fs-5 ms-auto">
                  <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                </div>
              </div>
              <div class="d-flex align-items-center mt-3">
                <div>
                  <h5 class="mb-0">{{$amount}}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end row-->


      <div class="row">
        <div class="col-12 col-lg-8 col-xl-8 d-flex">
          <div class="card radius-10 w-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <h6 class="mb-0">Statistics</h6>
                <div class="ms-auto">
                  <div class="d-flex align-items-center font-13 gap-2">
                    <span class="border px-1 rounded cursor-pointer"><i
                        class="bx bxs-circle me-1 text-primary"></i>Earnings</span>
                    <span class="border px-1 rounded cursor-pointer"><i
                        class="bx bxs-circle me-1 text-success"></i>Orders</span>
                  </div>
                </div>
              </div>
              <div class="chart-container1">
                <canvas id="chart5"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 col-xl-4 d-flex">
          <div class="card radius-10 overflow-hidden w-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <h6 class="mb-0">Total Sales</h6>
              </div>
              <div class="chart-container6">
                <div class="piechart-legend">
                  <h2 class="mb-1">$85K</h2>
                  <h6 class="mb-0">Total Sales</h6>
                </div>
                <canvas id="chart6"></canvas>
              </div>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center border-top">
                New
                <span class="badge bg-tiffany rounded-pill">55</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Shipping
                <span class="badge bg-success rounded-pill">20</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Delivered
                <span class="badge bg-warning rounded-pill">10</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Decline
                <span class="badge bg-danger rounded-pill">5</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--end row-->

    </div>
    <!-- end page content-->
  </div>
  <!--end page content wrapper-->
@endsection
