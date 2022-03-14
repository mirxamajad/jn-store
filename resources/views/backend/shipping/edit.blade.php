@extends('layouts.app')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Shipping Charges Edit</h5>
                <form class="form-body row g-3" action="{{ route('shipping.update', $shipping->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label class="form-lable">State</label>
                        <input type="text" name="states" id="editname" value="{{$shipping->states}}" required placeholder="Category Name" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-lable">Charges</label>
                        <input type="text" name="charges" id="editslug" required placeholder="" value="{{$shipping->charges}}" class="form-control">
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

