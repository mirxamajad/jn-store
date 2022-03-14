@extends('layouts.app')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <section class="shop-page">
            <div class="shop-container">

              <div class="card shadow-sm border-0">
                <div class="card-body">

                  <div class="product-detail-card">
                    <div class="product-detail-body">
                      <div class="row g-0">
                        <div class="col-12 col-lg-5">
                          <div class="image-zoom-section">
                            <div class="product-gallery owl-carousel owl-theme border rounded mb-3 p-3" data-slider-id="1">
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($product->image as $key)
                                    <div class="item">
                                        <img src="{{(asset('product/'.$key->name))}}" class="img-fluid" alt="">
                                    </div>
                                    @if ($count<1)
                                        @break
                                    @endif
                                @endforeach



                            </div>
                            <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                @foreach ($product->image as $key)
                                    <button class="owl-thumb-item">
                                        <img src="{{(asset('product/'.$key->name))}}" class="" alt="">
                                    </button>
                                @endforeach

                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-7">
                          <div class="product-info-section p-3">
                            <h3 class="mt-3 mt-lg-0 mb-0">{{$product->name}}</h3>
                            <div class="d-flex align-items-center mt-3 gap-2">
                                @if (!empty($product->discount))
                                    <h5 class="mb-0 text-decoration-line-through text-light-3">$98.00</h5>
                                @endif
                              <h4 class="mb-0">${{$product->price}}</h4>
                            </div>
                            <div class="mt-3">
                              <h6>Summary :</h6>
                              <p class="mb-0">{{$product->summary}}.</p>
                            </div>
                            <dl class="row mt-3">	<dt class="col-sm-3">Product id</dt>
                              <dd class="col-sm-9">#{{$product->sku}}</dd>
                              <dt class="col-sm-3">category</dt>
                              <dd class="col-sm-9">Russia, USA, and Europe</dd>
                            </dl>
                            <div class="row row-cols-auto align-items-center mt-3">
                              <div class="col">
                                <label class="form-label">Quantity</label>
                                <select class="form-select form-select-sm">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                              <div class="col">
                                  {{$product->productvariant}}
                                <label class="form-label">Size</label>
                                <select class="form-select form-select-sm">
                                  <option>S</option>
                                  <option>M</option>
                                  <option>L</option>
                                  <option>XS</option>
                                  <option>XL</option>
                                </select>
                              </div>
                              <div class="col">
                                <label class="form-label">Colors</label>
                                <div class="color-indigators d-flex align-items-center gap-2">
                                  <div class="color-indigator-item bg-primary"></div>
                                  <div class="color-indigator-item bg-danger"></div>
                                  <div class="color-indigator-item bg-success"></div>
                                  <div class="color-indigator-item bg-warning"></div>
                                </div>
                              </div>
                            </div>
                            <!--end row-->
                            <hr/>
                          </div>
                        </div>
                      </div>
                      <!--end row-->
                    </div>
                  </div>


                  <!--start product more info-->
                  <div class="product-more-info">
                    <ul class="nav nav-tabs mb-0" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#discription" role="tab" aria-selected="true">
                          <div class="d-flex align-items-center">
                            <div class="tab-title text-uppercase fw-500">Description</div>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#tags" role="tab" aria-selected="false">
                          <div class="d-flex align-items-center">
                            <div class="tab-title text-uppercase fw-500">Tags</div>
                          </div>
                        </a>
                      </li>
                    </ul>
                    <div class="tab-content pt-3">
                      <div class="tab-pane fade" id="discription" role="tabpanel">
                        <p>{{$product->description}}</p>
                      </div>
                      <div class="tab-pane fade" id="tags" role="tabpanel">
                        <div class="tags-box w-50">	<a href="javascript:;" class="tag-link">Cloths</a>
                          <a href="javascript:;" class="tag-link">Electronis</a>
                          <a href="javascript:;" class="tag-link">Furniture</a>
                          <a href="javascript:;" class="tag-link">Sports</a>
                          <a href="javascript:;" class="tag-link">Men Wear</a>
                          <a href="javascript:;" class="tag-link">Women Wear</a>
                          <a href="javascript:;" class="tag-link">Laptops</a>
                          <a href="javascript:;" class="tag-link">Formal Shirts</a>
                          <a href="javascript:;" class="tag-link">Topwear</a>
                          <a href="javascript:;" class="tag-link">Headphones</a>
                          <a href="javascript:;" class="tag-link">Bottom Wear</a>
                          <a href="javascript:;" class="tag-link">Bags</a>
                          <a href="javascript:;" class="tag-link">Sofa</a>
                          <a href="javascript:;" class="tag-link">Shoes</a>
                        </div>
                      </div>
                    </div>
                  </div>
              <!--end product more info-->
                </div>
              </div>

            </div>
        </section>
    </div>
</div>
@endsection
