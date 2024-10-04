<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Men Shopping Online - shop for mens</title>

    <style>
        .cardImages {
            transition: transform 0.5s ease-in-out;
            /* Smooth transition for the zoom effect */
        }

        .cardImages:hover {
            transform: scale(1.05);
            /* Adjust the zoom level as needed */
        }
    </style>
</head>

<body>

    <div class="wrapper mx-3">

        {{-- First Row For Information And Sorts --}}
        <div class="row">
            <div class="col-12 border border-secondary">
                {{-- Row - 1 --}}
                <div class="row">
                    <div class="col-md-2">
                        Home / <span> Clothing / </span> <span> Men Topwear </span>
                    </div>
                    <div class="col-md-10"></div>
                </div>
                {{-- Row - 2 --}}
                <div class="row">
                    <div class="col-md-2">
                        Men Topwear <span> - 411849 items </span>
                    </div>
                    <div class="col-md-10"></div>
                </div>
                {{-- Row - 3 --}}
                <div class="row">
                    <div class="col-md-2">
                        <span> <b> FILTERS </b> </span>
                    </div>
                    <div class="col-md-10">

                    </div>
                </div>
            </div>
        </div>
        {{-- Second Row For Showing Products, Details and Filters --}}
        <div class="row">
            <div class="col-md-2 border border-secondary">
                {{-- Row - 1 --}}
                <div class="row">
                    <div class="col-12">
                        <br>
                        <span> <b> CATEGORIES </b></span>

                        <div class="mb-2 mt-2">
                            @if (!empty(getCategories()))
                                @foreach (getCategories() as $category)
                                    <input type="checkbox" name="category" id="category">
                                    <label for="category">{{ $category->name }}</label> <br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                {{-- Row - 2 --}}
                <div class="row">
                    <div class="col-12">
                        <span><b>BRANDS</b></span>

                        <div class="mb-2 mt-2">
                            @if (!empty(getBrands())) {{-- If using the helper function --}}
                                @foreach (getBrands() as $brand)
                                    <input type="checkbox" name="brand" id="brand{{ $brand->id }}"
                                        value="{{ $brand->id }}">
                                    <label for="brand{{ $brand->id }}">{{ $brand->name }}</label><br>
                                @endforeach
                            @else
                                <p>No brands available.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                {{-- Row - 3 --}}
                <div class="row">
                    <div class="col-12">
                        <span> <b> COLOR </b></span>
                        <br>
                        <br>
                        <input type="checkbox" name="blue" id="blue">
                        <label for="blue">Blue</label> <br>
                        <input type="checkbox" name="blue" id="blue">
                        <label for="blue">Blue</label> <br>
                        <input type="checkbox" name="blue" id="blue">
                        <label for="blue">Blue</label> <br>
                        <input type="checkbox" name="blue" id="blue">
                        <label for="blue">Blue</label> <br>
                    </div>
                </div>
                <hr>
                {{-- Row - 4 --}}
                <div class="row">
                    <div class="col-12">
                        <span> <b> DISCOUNT RANGE </b></span>
                        <br>
                        <br>
                        <input type="checkbox" name="10" id="10">
                        <label for="10">For <span> 10</span> % and above </label> <br>
                        <input type="checkbox" name="10" id="10">
                        <label for="10">For <span> 10</span> % and above </label> <br>
                        <input type="checkbox" name="10" id="10">
                        <label for="10">For <span> 10</span> % and above </label> <br>
                        <input type="checkbox" name="10" id="10">
                        <label for="10">For <span> 10</span> % and above </label> <br>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-10 border border-secondary">
                {{-- Row - 1 --}}
                <div class="row mt-2">
                    @if (!empty(getCategories()))
                        @foreach (getCategories() as $Category)
                            @if ($Category->products->isNotEmpty())
                                @foreach ($Category->products as $product)
                                    @php
                                        $productImage = $product->product_images->first();
                                    @endphp
                                    <div class="col-md-6 col-lg-3 mb-3">
                                        <div class="card h-100">
                                            @if ($productImage && $productImage->image != '')
                                                <img src="{{ asset('uploads/Products/' . $productImage->image) }}"
                                                    height="300px" class="card-img-top cardImages"
                                                    alt="Product Image {{ $product->id }}">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->title }}</h5>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">{{ $product->title }}</li>
                                                <li class="list-group-item">{{ $product->price }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    @else
                        <p>Oops. No data found ... !!!</p>
                    @endif
                </div>
               

            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
