@extends('layouts.app')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"> Category Edit</h5>
                <form class="form-body row g-3" action="{{ route('catgeory.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label class="form-lable">Name</label>
                        <input type="text" name="name" id="editname" value="{{$category->name}}" required placeholder="Category Name" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-lable">Slug</label>
                        <input type="text" name="slug" id="editslug" required placeholder="" value="{{$category->slug}}" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-lable">Add Icon Image</label>
                        <input type="file" name="icon" id="icon"  onchange="document.getElementById('images').src = window.URL.createObjectURL(this.files[0])" required class="form-control">

                    </div>
                    <div class="col-12">
                        <img width="120px" id="images" src="{{asset('CategoryIcon/'.$category->image)}}" alt="">
                    </div>

                    <div class="col">
                        <button type="submit" class="btn categoryEditBtn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
$('#editname').change(function (e) {
    let name = $('#eidtname').val()
    let str = name.replace(/\s+/g, '-').toLowerCase();
    $('#editslug').val(str)
});
</script>
@endsection

