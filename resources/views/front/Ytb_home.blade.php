 @extends('front.layouts.app')

 @section('content')

     <style>
         .cardImages {
             transition: transform 0.5s ease-in-out;
             /* Smooth transition for the zoom effect */
         }

         .cardImages:hover {
             transform: scale(0.95);
             /* Adjust the zoom level as needed */
         }
     </style>

     {{-- First Image : Discount Coupons --}}
     <img src="{{ asset('front-assets/images/DiscountCoupon.jpg') }}" alt="Discount Coupon">
     {{-- Second Image : Hero Image --}}
     <img src="{{ asset('front-assets/images/home.png') }}" alt="Hero Image">
     {{-- Third Image : Coupon Corner --}}
     <img src="{{ asset('front-assets/images/CouponCorner.jpg') }}" alt="Coupon Corner">
     {{-- Fourth Image : Coupons --}}
     <img src="{{ asset('front-assets/images/coupons.jpg') }}" alt="Coupons">

     <!-- Main Content (Featured Products) -->
     <section class="section-2">
         <div class="container">
             <div class="row justify-content-center mb-2 g-0"> <!-- Removed space between columns with g-0 -->
                 @if ($featured_products->isNotEmpty())
                     @foreach ($featured_products as $product)
                         @php
                             $productImage = $product->product_images->first();
                         @endphp
                         <div class="col-md-6 col-lg-3 col-sm-6 col-12"> <!-- Removed mb-3 -->

                             <div class="card product-card">

                                 <div class="product-image position-relative">
                                     <a href="{{ route('front.product', $product->slug) }}" class="product-img">
                                         @if ($productImage && $productImage->image != '')
                                             <img src="{{ asset('uploads/Products/' . $productImage->image) }}"
                                                 class="card-img-top cardImages"
                                                 style="height: 300px; object-fit: cover; padding: 5px;"
                                                 alt="Product Image {{ $product->id }}">
                                         @endif
                                     </a>
                                     <!-- Rating Box -->
                                     <div class="rating-box position-absolute bg-white p-2 rounded"
                                         style="bottom: 10px; left: 10px;">
                                         <span>4.0</span>
                                         <i class="fa fa-star"></i>
                                     </div>

                                     <!-- Add To Cart Icon -->
                                     <a class="wishlist position-absolute" href="javascript:void(0);"
                                         onclick="addToCart({{ $product->id }})"
                                         style="top: 10px; left: 10px; z-index: 100;">
                                         <i class="fa fa-shopping-cart"></i>
                                     </a>

                                     <!-- Wishlist Icon -->
                                     <a class="wishlist position-absolute" href="222" style="top: 10px; right: 10px;">
                                         <i class="far fa-heart"></i>
                                     </a>
                                 </div>

                                 <div class="card-body text-center mt-3">

                                     <!-- Product Name -->
                                     <p class="product-item-title mb-2">{{ $product->title }}</p>

                                     <!-- Brand -->
                                     <p class="product-item-brand mb-1"><strong>{!! $product->short_description !!}</strong></p>

                                     <!-- Pricing Section -->
                                     <div class="product-item-pricing">

                                         <!-- Current Price -->
                                         <span class=" product-item-selling-price h5">
                                             <strong> Rs. {{ $product->price }} </strong>
                                         </span>

                                         <s class="product-item-mrp h6 text-muted">
                                             <!-- Original Price (Compare price) -->
                                             Rs. {{ $product->compare_price }}
                                         </s>

                                         <!-- Discount -->
                                         <span class="product-item-discount text-success">(60% OFF)</span>
                                     </div>
                                 </div>

                             </div>
                         </div>
                     @endforeach
                 @else
                     <p class="text-center">Oops. No data found ... !!!</p>
                 @endif
             </div>
         </div>
     </section>



     {{-- Fifth Image : Crazy Deals --}}
     <img src="{{ asset('front-assets/images/CrazyDeals.jpg') }}" alt="Crazy Deals">

     {{-- Section : Section > Categories Showcase --}}
     <div id="sectionCategoriesCarousel" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-indicators">
             @foreach (getSections() as $key => $section)
                 <button type="button" data-bs-target="#sectionCategoriesCarousel" data-bs-slide-to="{{ $key }}"
                     class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                     aria-label="Section {{ $key + 1 }}"></button>
             @endforeach
         </div>

         <div class="carousel-inner">
             @foreach (getSections() as $key => $section)
                 <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                     <section class="section-3">
                         <div class="container mt-5">
                             @if ($section->categories->isNotEmpty())
                                 {{-- <h3>{{ $section->name }}</h3> --}}
                                 <div class="row pb-3">
                                     @foreach ($section->categories->sortByDesc('created_at')->take(4) as $category)
                                         <div class="col-lg-3">
                                             <div class="cat-card">
                                                 <div class="left">
                                                     @if ($category->image != '')
                                                         <img src="{{ asset('uploads/category/' . $category->image) }}"
                                                             alt="" class="img-fluid category-images"
                                                             style="height: 100px; object-fit: cover; padding: 5px;">
                                                     @endif
                                                 </div>
                                                 <div class="right">
                                                     <div class="cat-data">
                                                         <h2>{{ $category->name }}</h2>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     @endforeach
                                 </div>
                             @endif
                         </div>
                     </section>
                 </div>
             @endforeach
         </div>

         <button class="carousel-control-prev" type="button" data-bs-target="#sectionCategoriesCarousel"
             data-bs-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#sectionCategoriesCarousel"
             data-bs-slide="next">
             <span class="carousel-control-next-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Next</span>
         </button>
     </div>

     {{-- Sixth Image : Shop By Category Image --}}
     <img src="{{ asset('front-assets/images/myntra-shop-by-category.jpg') }}" alt="Shop By Category">

     {{-- Section : Category Showcase --}}
     <section class="section-3">
         <div class="container">
             <div class="section-title">
                 <h2>Categories</h2>
             </div>

             @if (!empty(getSubCategories()))
                 <div class="row pb-3">
                     @foreach (getSubCategories() as $subcategory)
                         <div class="col-lg-3">
                             <div class="cat-card">
                                 <div class="left">
                                     @if ($subcategory->image != '')
                                         <img src="{{ asset('uploads/subcategory/' . $subcategory->image) }}"
                                             alt="" class="img-fluid category-images"
                                             style="height: 100px; object-fit: cover; padding: 5px;">
                                     @endif
                                 </div>
                                 <div class="right">
                                     <div class="cat-data">
                                         <h2>{{ $subcategory->name }}</h2>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </div>
             @endif
         </div>
     </section>

 @endsection
