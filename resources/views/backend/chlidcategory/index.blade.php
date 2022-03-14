@extends('layouts.app')
@section('content')
<div class="page-content-wrapper">
    <!-- start page content-->
   <div class="page-content">

    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Child Categories</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0 align-items-center">
            <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Child Category</li>
          </ol>
        </nav>
      </div>
    </div>
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
    <!--end breadcrumb-->

        <div class="row">
            <div class="col-6">
                <h6 class="mb-0 text-uppercase">Child Category</h6>
            </div>
            <div class="col-6 d-flex flex-row-reverse ">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">Create Child Category</button>
                <div class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="createLabel">Add New Child Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form-body categoryForm row g-3" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label class="form-lable">Name</label>
                                    <input type="text" name="name" id="name" required placeholder="Category Name" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-lable">Select Catgeory</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        @foreach ($categories as $category )
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-lable">Slug</label>
                                    <input type="text" name="slug" id="slug" required placeholder=""  class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-lable">Add Icon Image</label>
                                    <input type="file" name="icon" id="icon" required class="form-control">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn categoryBtn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($childcategory as $cat)
                                <tr>

                                    <td>{{$cat->name}}</td>
                                    {{-- <td> {{$cat->subcategory->name}}</td> --}}
                                    <td><img src="{{asset('ChildCategoryIcon/'.$cat->icon)}}" width="100px" alt=" NO Image found"></td>
                                    <td>
                                        <a class="btn btn-success viewBtn" data-url="{{ route('childcatgeory.show', $cat->id) }}" data-bs-toggle="modal" data-bs-target="#view"  href="javascript:void(0)">
                                            View
                                        </a>
                                        <a class="btn btn-primary editBtn"  href="{{ route('childcatgeory.edit', $cat->id) }}">
                                            Edit
                                        </a>
                                        <form action="{{ route('childcatgeory.destroy', $cat->id) }}" method="POST" onsubmit="return confirm();" style="display: inline-block;">
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
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="createLabel">Show Category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body getView">

            </div>
        </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
<script>
    $('#name').change(function (e) {
        let name = $('#name').val()
        let str = name.replace(/\s+/g, '-').toLowerCase();
        $('#slug').val(str)
    });
    $('.categoryForm').submit(function (e) {
        e.preventDefault();
        let formData = new FormData($('.categoryForm')[0]);
       $.ajax({
            type: "POSt",
            url: "{{route('childcatgeory.index')}}",
            data: formData,
            processData: false,
            contentType: false,
           success: function (response) {
            $('#create').modal('hide');
            $('#catrgoryFrom').remove();
            success_noti(response)
           }
       });

    });
$("body").on("click",".viewBtn", function(){
let url = $(this).data('url');
$.ajax({
    url: url,
    _method: 'GET',
    success: function(respose) {
       $('.getView').html(respose);
    }
  });
});


$("body").on("click",".deleteBtn", function(){
let url = $(this).data('url');
 console.log(url);
 debugger;
if (confirm('Do You Want To delete')) {
    $.ajax({
    url: url,
    _method: 'DELETE',
    success: function(respose) {
        // round_error_noti()
    }
  });
}


});


</script>
@endsection
