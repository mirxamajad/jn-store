
<div class="row">
    <div class="col-12">
        <label class="form-label">Category Name :</label>
        {{$category->name}}


    </div>
    <div class="col-12">
        <label class="form-label">Category Slug :</label>

            {{$category->slug}}


    </div>
    <div class="col-12">
        <label class="form-label">Category Image :</label>
        <br>
        <img src="{{asset('ChildCategoryIcon/'.$category->icon)}}"  width="150px" alt="Image Not Found ">
    </div>


</div>

