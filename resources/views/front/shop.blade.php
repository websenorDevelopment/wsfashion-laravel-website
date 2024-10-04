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


        #filter-sidebar {
            position: -webkit-sticky;
            /* For Safari */
            position: sticky;
            top: 0;
            height: 225vh;
            /* Make it the full viewport height */
            overflow-y: auto;
            /* Add scroll for filter content if it overflows */
        }

        .card {
            margin-bottom: 1rem;
        }

        /* Adjustments for smaller screens */
        @media (max-width: 768px) {
            #filter-sidebar {
                position: relative;
                /* Disable sticky on smaller screens */
                height: auto;
            }
        }
    </style>

    <div class="wrapper bg-white">
        <section class="section-5 pt-3 pb-3 mb-3 mt-5">
            <div class="container">
                <div class="light-font">

                    <!-- Breadcrumb for Home / Shop -->
                    <ol class="breadcrumb primary-color mb-0 d-flex justify-content-between align-items-center flex-wrap">
                        <li class="breadcrumb-item">
                            <a class="white-text" href="{{ route('front.home') }}">Home</a> /
                            <span class="breadcrumb-item active">Shop</span>
                        </li>

                        <!-- Sorting Dropdown for large screens -->
                        <div class="dropdown d-none d-md-block">
                            <select name="sort" id="sort" class="form-control form-control-sm">
                                <option value="latest" {{ $sort == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Price Low
                                </option>
                                <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Price High</option>
                            </select>
                        </div>
                    </ol>

                    <!-- Men Topwear -->
                    <ol class="breadcrumb primary-color mb-0">
                        <li class="breadcrumb-item active">Men Topwear - 411849 items</li>
                    </ol>

                    <!-- Filters -->
                    <ol class="breadcrumb primary-color mb-0">
                        <li class="breadcrumb-item">FILTERS</li>
                    </ol>

                    <!-- Sorting Dropdown for small screens -->
                    <div class="mt-2 d-md-none">
                        <select name="sort" id="sort" class="form-control form-control-sm">
                            <option value="latest">Latest</option>
                            <option value="price_desc">Price High</option>
                            <option value="price_asc">Price Low</option>
                        </select>
                    </div>

                </div>
            </div>
        </section>


        <div class="row">
            <!-- Sidebar (Filters) -->
            <div class="col-md-3 col-sm-3 col-12 mb-3 " id="filter-sidebar">
                <!-- Categories Card -->
                <div class="row">
                    <div class="col-12 card">
                        <div class=" text-center p-1 m-0 d-flex justify-content-center align-items-center">
                            <b class="m-0 mt-3">CATEGORIES</b>
                        </div>
                        <div class="card-body">
                            <div class="accordion accordion-flush" id="accordionExample">
                                @if (!empty($categories))
                                    @foreach ($categories as $index => $category)
                                        <div class="accordion-item">
                                            @if ($category->subcategories->isNotEmpty())
                                                <h2 class="accordion-header" id="heading{{ $index }}">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse{{ $index }}" aria-expanded="false"
                                                        aria-controls="collapse{{ $index }}">
                                                        {{ $category->name }}
                                                    </button>
                                                </h2>
                                            @else
                                                <a href="{{ route('front.shop', $category->slug) }}"
                                                    class="nav-item nav-link"
                                                    {{ $categorySelected == $category->id ? 'text-primary' : '' }}>{{ $category->name }}</a>
                                            @endif
                                            @if (!empty($category->subcategories))
                                                <div id="collapse{{ $index }}"
                                                    class="accordion-collapse collapse {{ $categorySelected == $category->id ? 'show' : '' }}"
                                                    aria-labelledby="heading{{ $index }}"
                                                    data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="navbar-nav">
                                                            @foreach ($category->subcategories as $subcategory)
                                                                <a href="{{ route('front.shop', [$category->slug, $subcategory->slug]) }}"
                                                                    class="nav-item nav-link {{ $subCategorySelected == $subcategory->id ? 'text-primary' : '' }}">{{ $subcategory->name }}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <p>No subcategories available</p>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Brands Card -->
                <div class="row mt-3">
                    <div class="col-12 card">
                        <div class=" text-center p-1 m-0 d-flex justify-content-center align-items-center">
                            <b class="m-0 mt-3">BRANDS</b>
                        </div>
                        <div class="card-body">
                            @if (!empty($brands))
                                @foreach ($brands as $brand)
                                    <div class="form-check mb-2">
                                        <input {{ in_array($brand->id, $brandsArray) ? 'checked' : '' }}
                                            class="form-check-input brand-label" type="checkbox" name="brand[]"
                                            value="{{ $brand->id }}" id="brand-{{ $brand->id }}">
                                        <label class="form-check-label" for="brand-{{ $brand->id }}">
                                            {{ $brand->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Price Card -->
                <div class="row mt-3">
                    <div class="col-12 card">
                        <div class=" text-center p-1 m-0 d-flex justify-content-center align-items-center">
                            <b class="m-0 mt-3">PRICE</b>
                        </div>
                        <div class="card-body">
                            <input type="text" class="js-range-slider" name="my_range" id="js-range-slider"
                                value="">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content (Products) -->
            <div class="col-md-9 col-sm-9 col-12">
                <div class="row">
                    @if ($products->isNotEmpty())
                        @foreach ($products as $product)
                            @php
                                $productImage = $product->product_images->first();
                            @endphp
                            <div class="col-md-6 col-lg-3 col-sm-6 col-12 mb-3">
                                {{-- <div class="card h-100">
                                    <a href="{{ route('front.product', $product->slug) }}" class="product-img">
                                        @if ($productImage && $productImage->image != '')
                                            <img src="{{ asset('uploads/Products/' . $productImage->image) }}"
                                                class="card-img-top cardImages"
                                                style="height: 300px; object-fit: cover; padding: 5px;"
                                                alt="Product Image {{ $product->id }}">
                                        @endif
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->title }}</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">{{ $product->title }}</li>
                                        <li class="list-group-item">{{ $product->price }}</li>
                                    </ul>
                                </div> --}}
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
                                        <a class="wishlist position-absolute" href="222"
                                            style="top: 10px; right: 10px;">
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
                                                {{ $product->compare_price }}
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


        </div>

    </div>

@endsection

@section('customJS')
    <script>
        // Initialize the range slider
        var rangeSlider = $(".js-range-slider").ionRangeSlider({
            type: "double",
            min: 0,
            max: 10000,
            from: {{ $price_min }},
            step: 10,
            to: {{ $price_max }},
            skin: "round",
            max_postfix: "+",
            prefix: "₹",
            onFinish: function(data) {
                apply_filters(data);
            }
        });

        var slider = $(".js-range-slider").data("ionRangeSlider");

        // Change event for brand checkboxes
        $(".brand-label").change(function() {
            apply_filters();
        });

        // Change event for sorting
        $("#sort").change(function() {
            apply_filters();
        });

        // Function to apply filters and update URL
        function apply_filters(data = null) {
            var brands = [];
            $(".brand-label:checked").each(function() {
                brands.push($(this).val());
            });

            // Start building the URL
            var url = "{{ url()->current() }}?";

            // Use data from slider if provided; otherwise, use current slider state
            var from = data ? data.from : slider.result.from;
            var to = data ? data.to : slider.result.to;

            // Append brands to URL if selected
            if (brands.length > 0) {
                url += '&brand=' + brands.join(','); // Join brands with a comma
            }

            // Append price range to URL
            url += '&price_min=' + from + '&price_max=' + to;

            // Append sorting option to URL
            if ($("#sort").val()) {
                url += '&sort=' + $("#sort").val();
            }

            // Redirect to the new URL, refreshing the page
            window.location.href = url;
        }

        // Listen for slider changes directly
        $(".js-range-slider").on("change", function() {
            var result = slider.result;
            apply_filters(result);
        });
    </script>

    {{-- <script>
        // Initialize the range slider
        var rangeSlider = $(".js-range-slider").ionRangeSlider({
            type: "double",
            min: 0,
            max: 10000,
            from: {{ $price_min }},
            step: 10,
            to: {{ $price_max }},
            skin: "round",
            max_postfix: "+",
            prefix: "₹",
            onFinish: function(data) {
                apply_filters(data);
            }
        });

        var slider = $(".js-range-slider").data("ionRangeSlider");

        // Change event for brand checkboxes
        $(".brand-label").change(function() {
            apply_filters();
        });
        // Change event for brand checkboxes
        $(".sort").change(function() {
            apply_filters();
        });

        // Function to apply filters and update URL
        function apply_filters(data = null) {
            var brands = [];
            $(".brand-label:checked").each(function() {
                brands.push($(this).val());
            });

            // console.log(brands.toString()); // For Testing Purpose Only. 
            var url = "{{ url()->current() }}?";

            // Use data from slider if provided; otherwise, use current slider state
            var from = data ? data.from : slider.result.from;
            var to = data ? data.to : slider.result.to;

            // Brand Filter
            if (brands.length > 0) {
                url += '&brand=' + brands.join(','); // Join brands with a comma
            }

            // Price Range Filters
            url += '&price_min=' + from + '&price_max=' + to;
            
            // Sorting Filter 
            url += '&sort=' + $("#sort").val();

            // Redirect to the new URL, refreshing the page
            window.location.href = url;
        }

        // Listen for slider changes directly
        $(".js-range-slider").on("change", function() {
            var result = slider.result;
            apply_filters(result);
        });
    </script> --}}
@endsection
