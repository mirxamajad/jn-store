@extends('layouts.app')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Add New Variant</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
            <div class="p-4 border rounded">
                <form action="{{route('productvariant.update', $proVari->id)}}" method="POST" class="row g-3 createFrom" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12 select2-sm">
                        <label class="form-label">Select Product</label>
                        <select  class="multiple-select" data-placeholder="Select Product" name="product" id="mainproduct">
                            <option></option>
                            @foreach ($products as $product)
                                <option value="{{$product->id}}" @if ($product->id == $proVari->product_id)
                                    {{'selected'}}
                                @endif>{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="col-3 select2-sm">
                        <label class="form-label">Status</label>
                        <select name="status" id="status" class="form-control select2">
                            <option value="active" @if ($proVari->product_id = 'active')
                                {{'selected'}}
                            @endif>Active</option>
                            <option value="inactive" @if ($proVari->product_id = 'inactive')
                                {{'selected'}}
                            @endif>Inactive</option>
                        </select>
                    </div>
                    <div class="col-3 select2-sm sizes">
                        <label class="form-label">Size</label>
                        <select name="size" id="size" class="form-control">
                            <option @if ($proVari->size = 'xs')
                                {{'selected'}}
                            @endif value="xs">Extra Small</option>
                            <option @if ($proVari->size = 's')
                                {{'selected'}}
                            @endif value="s">Small</option>
                            <option @if ($proVari->size = 'm')
                                {{'selected'}}
                            @endif value="m">Medium</option>
                            <option @if ($proVari->size = 'l')
                                {{'selected'}}
                            @endif value="l">Large</option>
                            <option @if ($proVari->size = 'xl')
                                {{'selected'}}
                            @endif value="xl">Extra Large</option>
                            <option @if ($proVari->size = 'xxl')
                                {{'selected'}}
                            @endif value="xxl">X X Large</option>
                        </select>
                    </div>
                    <div class="col-3 select2-sm colors">
                        <label class="form-label">Color</label>
                        <input type="color" class="form-control" name="color" value="{{$proVari->color}}" id="color">
                    </div>
                    <div class="col-3">
                        <label class="form-label">Quntity</label>
                        <input type="text" class="form-control" name="quntity" value="{{$proVari->quntity}}" id="quntity">
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary createCategory"> Update</button>
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
</script>

@endsection

