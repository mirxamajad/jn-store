@extends('layouts.app')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Add New Variant</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
            <div class="p-4 border rounded">
                <form action="{{route('productvariant.store')}}" method="POST" class="row g-3 createFrom" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 select2-sm">
                        <label class="form-label">Select Product</label>
                        <select  class="multiple-select" data-placeholder="Select Product" name="product" id="mainproduct">
                            <option></option>
                            @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="col-3 select2-sm">
                        <label class="form-label">Status</label>
                        <select name="status[]" id="status" class="form-control select2">
                            <option value="active" selected>Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-3 select2-sm sizes">
                        <label class="form-label">Size</label>
                        <select name="size[]" id="size" class="form-control">
                            <option value="xs">Extra Small</option>
                            <option value="s">Small</option>
                            <option value="m">Medium</option>
                            <option value="l">Large</option>
                            <option value="xl">Extra Large</option>
                            <option value="xxl">X X Large</option>
                        </select>
                    </div>
                    <div class="col-3 select2-sm colors">
                        <label class="form-label">Color</label>
                        <input type="color" class="form-control" name="color[]" id="color">
                    </div>
                    <div class="col-3">
                        <label class="form-label">Quntity</label>
                        <input type="text" class="form-control" name="quntity[]" id="quntity">
                    </div>

                    <br>
                    <div  id="appendData">
                    </div>
                    <div>

                        <button type="button" class="add btn btn-sm btn-success">
                                Add
                        </button>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary createCategory">Create</button>
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
    let id = 0;
    $('.add').click(function (e) {

        $('#appendData').append(`
            <div class="row remove${id}"  >
                <div class="col-6">
                    <h6 class="form-label" style="margin-top:10px"> New Variant</h6>
                </div>
                <hr />
                <div class="col-3 select2-sm">
                    <label class="form-label">Status</label>
                    <select name="status[]" id="status" class="form-control select2">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="col-3 select2-sm sizes">
                    <label class="form-label">Size</label>
                    <select name="size[]" id="size" class="form-control">
                        <option value="xs">Extra Small</option>
                        <option value="s">Small</option>
                        <option value="m">Medium</option>
                        <option value="l">Large</option>
                        <option value="xl">Extra Large</option>
                        <option value="xxl">X X Large</option>
                    </select>
                </div>
                <div class="col-3 select2-sm colors">
                    <label class="form-label">Color</label>
                    <input type="color" class="form-control" name="color[]" id="color">
                </div>
                <div class="col-3">
                    <label class="form-label">Quntity</label>
                    <input type="text" class="form-control" name="quntity[]" id="quntity">
                </div>
                <div class='col'>
                    <button  type='button' onclick="removedata(${id++})" class="btn btn-danger buttonRemove" > Remove
                    </button>
                </div>
            </div>
        `);
    });
function removedata(id) {
    $(`.remove${id}`).remove();
}
</script>

@endsection

