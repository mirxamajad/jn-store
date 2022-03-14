@extends('layouts.app')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Add New Product</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
            <div class="p-4 border rounded">
                <form action="{{route('products.update', $product->id)}}" method="POST" class="row g-3 createFrom" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-6">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" id="productname" value="{{$product->name}}" class="form-control">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Brand Name</label>
                        <input type="text" name="brandname" id="brandname" value="{{$product->brandname}}" class="form-control">
                    </div>
                    <div class="col-4 select2-sm">
                        <label class="form-label">Select Category</label>
                        <select  class="multiple-select form-control" data-placeholder="Select Catgeory" name="category" id="cate">
                            <option></option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                    @foreach ($product->category as $key )
                                        @if($key->id==$category->id)
                                            selected
                                        @endif
                                    @endforeach
                                    >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4 select2-sm subcategory">
                        <label class="form-label">Select For</label>
                        <select  class="multiple-select form-control" data-placeholder="Select Catgeory" name="subcategory" id="subCat">\
                            @foreach ($subcategories as $category)
                                <option value="{{$category->id}}"
                                    @foreach ($product->category as $key )
                                        @if($key->id==$category->id)
                                            selected
                                        @endif
                                    @endforeach
                                    >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4 select2-sm childcategory">
                        <label class="form-label">Select For</label>
                        <select  class="multiple-select form-control" data-placeholder="Select Catgeory" name="childcategory" id="chileCat">
                            @foreach ($childcategories as $category)
                                <option value="{{$category->id}}"
                                    @foreach ($product->category as $key )
                                        @if($key->id==$category->id)
                                            selected
                                        @endif
                                    @endforeach
                                    >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4 select2-sm">
                        <label class="form-label">Status</label>
                        <select name="status" id="status" class="form-control select2">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="form-label">SKU</label>
                        <input type="text" name="sku" id="sku" value="{{$product->sku}}" class="form-control">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" id="price" value="{{$product->price}}" class="form-control">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Discount</label>
                        <input type="text" name="discount" id="discount" value="{{$product->discount}}" class="form-control">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Tags</label>
                        <input type="text" name="tags" id="tags" class="form-control" data-role="tagsinput" value="{{$product->tags}}">
                    </div>
                    <div class="col-4" id="slug">
                        <label class="form-label">Slugs</label>
                        <input type="text" name="slug" class="slug form-control" data-role="tagsinput" value="{{$product->slug}}">
                    </div>

                    <div class="col-12">
                        <label class="form-label">image</label>
                        <input type="file" name="image[]" multiple id="gallery-photo-add" value="" class="form-control">
                    </div>
                    <div class="gallery col-12">
                        @foreach ($product->image as $key)
                            <img src="{{asset('product/'.$key->name)}}" width="100px" alt="">
                        @endforeach
                    </div>
                    <div class="col-12">
                        <label class="form-label">Summaery</label>
                        <textarea name="summary" id="summary" cols="3" class="form-control" rows="5">
                            {{$product->summary}}
                        </textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Description</label>
                        <textarea name="description" id="description" cols="3" class="form-control" rows="5">
                            {{$product->description}}
                        </textarea>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button  type="submit" class="btn btn-primary createCategory">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
$('#productname').change(function (e) {
    let name = $('#productname').val()
    let str = name.replace(/\s+/g, '-').toLowerCase();
    $('#slug').html(`
    <label class="form-label">Slugs</label>
    <input type="text" disable name="slug" class="slug form-control" data-role="tagsinput" value="${str}">
    `)
});
$(function () {
    // $('.subcategory').hide();
    // $('.childcategory').hide();
});
$('#cate').change(function (e) {
    let id =  $('#cate').val()
    $.ajax({
        type: "POST",
        url: "{{route('subcategory.getsubcat')}}",
        data: {"id":id,"_token": "{{ csrf_token() }}"},
        success: function (response) {
            $('#subCat').html('');
            if (response.length<1) {
                $('.subcategory').hide();
                $('.childcategory').hide();
            }
            $('.subcategory').show();
            $.each(response, function (index, value) {
                  $('#subCat').append(`<option value="${value.id}">${value.name}</option>`)
            });
        }
    });
});
$('#subCat').change(function (e) {
    let id =  $('#subCat').val()
    $.ajax({
        type: "POST",
        url: "{{route('childcategory.getchildcat')}}",
        data: {"id":id,"_token": "{{ csrf_token() }}"},
        success: function (response) {
            $('#chileCat').html('');
            if (response.length<1) {
                $('.childcategory').hide();
            }
            $('.childcategory').show();
            $.each(response, function (index, value) {
                  $('#chileCat').append(`<option value="${value.id}">${value.name}</option>`)
            });
        }
    });
});
$(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img width="100px" >')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>

@endsection
@section('styles')
    <style>
        .bootstrap-tagsinput{
            padding: 7px
        }
    </style>
@endsection
