@extends('admin.layouts.app')

@section('dyn-content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Product</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="" method="post" id="productForm" name="productForm" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                placeholder="Title" value="{{ old('title') }}">
                                            <p class="error"></p>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="slug">Slug</label>
                                            <input readonly type="text" name="slug" id="slug"
                                                class="form-control" placeholder="Slug" value="{{ old('slug') }}">
                                            <p class="error"></p>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="short_description">Short Description</label>
                                            <textarea name="short_description" id="short_description" cols="30" rows="10" class="summernote"
                                                placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="summernote"
                                                placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="shipping_returns">Shipping & Returns</label>
                                            <textarea name="shipping_returns" id="shiiping_returns" cols="30" rows="10" class="summernote" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Media</h2>
                                <div id="image" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>Drop files here or click to upload.<br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="product-gallery">

                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Pricing</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" id="price" class="form-control"
                                                placeholder="Price" value="{{ old('price') }}">
                                            <p class="error"></p>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="compare_price">Compare at Price</label>
                                            <input type="text" name="compare_price" id="compare_price"
                                                class="form-control" placeholder="Compare Price">
                                            <p class="text-muted mt-3">
                                                To show a reduced price, move the product's original price into
                                                Compare at
                                                price. Enter a lower value into Price.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Inventory</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sku">SKU (Stock Keeping Unit)</label>
                                            <input type="text" name="sku" id="sku" class="form-control"
                                                placeholder="sku" value="{{ old('sku') }}">
                                            <p class="error"></p>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="barcode">Barcode</label>
                                            <input type="text" name="barcode" id="barcode" class="form-control"
                                                placeholder="Barcode" value="{{ old('barcode') }}">
                                            <p class="error"></p>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox">
                                                {{-- <input type="hidden" name="track_qty" id="track_qty" value="No"> --}}
                                                <input class="custom-control-input" type="checkbox" id="track_qty"
                                                    name="track_qty" value="Yes" checked>
                                                <label for="track_qty" class="custom-control-label">Track Quantity</label>
                                                <p class="error"></p>
                                            </div>

                                        </div>
                                        <div class="mb-3" id="qtyField">
                                            <input type="number" min="0" name="qty"id="qty"
                                                class="form-control" placeholder="Qty"value="{{ old('qty') }}">
                                            <p class="error"></p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product status</h2>
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h2 class="h4  mb-3">Product Section</h2>

                                <div class="mb-3">
                                    <label for="section">Section</label>
                                    <select name="section" id="section" class="form-control">
                                        <option value="">Select The Section</option>
                                        @if (!empty($sections))
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}"
                                                    {{ old('section') == $section->id ? 'selected' : '' }}>
                                                    {{ $section->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="error"></p>
                                </div>

                                <div class="mb-3">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select The Category</option>
                                        @if (!empty($categories))
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="error"></p>
                                </div>

                                <div class="mb-3">
                                    <label for="sub_category">Sub Category</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        <option value="">Select The Sub Category</option>
                                        @if (!empty($subcategories))
                                            @foreach ($subcategories as $subProduct)
                                                <option value="{{ $subProduct->id }}"
                                                    {{ old('sub_category') == $subProduct->id ? 'selected' : '' }}>
                                                    {{ $subProduct->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>



                                {{-- <div class="mb-3">
                                    <label for="section">Section</label>
                                    <select name="section" id="section" class="form-control"
                                        value="{{ old('section') }}">
                                        <option value="">Select
                                            The Section</option>
                                        @if (!empty($sections))
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">
                                                    {{ $section->name }}
                                                </option>
                                           
                                            @endforeach
                                        @endif

                                    </select>
                                    <p class="error"></p>

                                </div>
                                <div class="mb-3">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control"
                                        value="{{ old('category') }}">
                                        <option value="">Select
                                            The Category</option>
                                        @if (!empty($categories))
                                            @foreach ($categories as $category)
                                                <option value=" {{ $category->id }} ">
                                                    {{ $category->name }} </option>
                                            @endforeach
                                        @endif

                                    </select>
                                    <p class="error"></p>

                                </div>
                                <div class="mb-3">
                                    <label for="sub_category">Sub Category</label>
                                    <select name="sub_category" id="sub_category" class="form-control"
                                        value="{{ old('sub_category') }}">
                                        <option value="">Select The Sub Category</option>
                                        @if (!empty($subcategories))
                                            @foreach ($subcategories as $subProduct)
                                                <option value=" {{ $subProduct->id }} ">
                                                    {{ $subProduct->name }}
                                                </option>
                                            @endforeach
                                        @endif

                                    </select>

                                </div> --}}
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Product Brand</h2>
                                <div class="mb-3">
                                    <select name="brand" id="brand" class="form-control">
                                        <option value="">Select The Brand
                                        </option>
                                        @if (!empty($brands))
                                            @foreach ($brands as $brand)
                                                <option value=" {{ $brand->id }} ">
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        @endif

                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Featured product</h2>
                                <div class="mb-3">
                                    <select name="is_featured" id="is_featured" class="form-control">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h2 class="h4 mb-3">Related product</h2>
                                <div class="mb-3">

                                    <select class="related-product form-control" id="related_products"
                                        name="related_products[]" multiple="multiple">
                                        {{-- @if (!empty($relatedProducts))
                                            @foreach ($relatedProducts as $relatedProduct)
                                                <option selected value="{{ $relatedProduct->id }}">
                                                    {{ $relatedProduct->title }}</option>
                                            @endforeach
                                        @endif --}}
                                    </select>
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('products.create') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection


@section('customJs')
    <script>
        $('.related-product').select2({
            ajax: {
                url: '{{ route('products.getProducts') }}',
                dataType: 'json',
                tags: true,
                multiple: true,
                minimumInputLength: 3,
                processResults: function(data) {
                    return {
                        results: data.tags
                    };
                }
            }
        });

        // console.log("Script Is Working"); // For Debugging Purpose.

        $("#productForm").submit(function(event) {
            // console.log("Product Form Is Working"); // For Debugging Purpose.

            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route('products.store') }}',
                type: 'post',
                data: element.serialize(),
                dataType: 'json',
                success: function(response) {
                    // console.log("Product Form Success Response Is Working"); // For Debugging Purpose.
                    $("button[type=submit]").prop('disabled', false);
                    if (response["status"] == true) {
                        // console.log("Product Form Success Response True Is Working");
                        // For Debugging Purpose.
                        window.location.href = "{{ route('products.index') }}";
                        $("#title").removeClass('is-invalid').siblings('p').removeClass(
                            'invalid-feedback').html("");
                        $("$name").removeClass('is-invalid').siblings('p').removeClass(
                            'invalid-feedback').html("");
                    } else {
                        // console.log("Product Form Success Response False Is Working");
                        // For Debugging Purpose.
                        var errors = response['errors'];

                        $(".error").removeClass('invalid-feedback').html('');
                        $("input[ytpe='text'],input[ytpe='number'], select").removeClass('is-invalid');
                        $.each(errors, function(key, value) {
                            $(`#${key}`).addClass('is-invalid').siblings('p').addClass(
                                'invalid-feedback').html(value);
                        });
                    }

                },
                error: function(jqXHR, exception) {
                    console.log("CSRF Token Error Is Working"); // For Debugging Purpose.
                    // console.log("Something Went Wrong");
                }
            });
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // To Get Categories Dynamically according to their respective Sections. 
        $("#section").change(function() {
            var section_id = $(this).val();
            $.ajax({
                url: "{{ route('product-categories.index') }}",
                type: "GET",
                data: {
                    section_id: section_id
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#category").find("option").not(":first").remove();
                    $.each(response["categories"], function(key, item) {
                        $("#category").append(
                            `<option value='${item.id}'>${item.name}</option>`);
                    });
                },
                error: function(jqXHR, exception) {
                    alert("An error occurred while loading categories");
                }
            });
        });

        // To Get Sub-Categories Dynamically according to their respective Categories. 
        $("#category").change(function() {
            var category_id = $(this).val();
            $.ajax({
                url: "{{ route('product-subcategories.index') }}",
                type: "GET",
                data: {
                    category_id: category_id
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#sub_category").find("option").not(":first").remove();
                    $.each(response["SubCategories"], function(key, item) {
                        $("#sub_category").append(
                            `<option value='${item.id}'>${item.name}</option>`);
                    });
                },
                error: function(jqXHR, exception) {
                    alert("An error occurred while loading subcategories");
                }
            });
        });


        // // To Get Categories Dynamically according to their respective Sections. 
        // $("#section").change(function() {
        //     var section_id = $(this).val(); // To Get Selected Category.
        //     $.ajax({
        //         url: "{{ route('product-categories.index') }}",
        //         type: "get",
        //         data: {
        //             section_id: section_id
        //         }, // Pass Selected Category Bt It's ID
        //         dataType: "json",
        //         success: function(response) {
        //             console.log(response); // For Debugging Purpose Only
        //             $("#category").find("option").not(":first").remove();
        //             $.each(response["categories"], function(key, item) {
        //                 $("#category").append(
        //                     `<option value='${item.id}'>${item.name}</option>`);
        //             });
        //         },
        //         error: function(jqXHR, exception) {
        //             // console.log("CSRF Token Error Is Working"); // For Debugging Purpose.
        //             // console.log("Something Went Wrong");
        //         }
        //     });
        // });

        // // To Get Sub-Categories Dynamically according to their respective Categories. 
        // $("#category").change(function() {
        //     var category_id = $(this).val(); // To Get Selected Category.
        //     $.ajax({
        //         url: "{{ route('product-subcategories.index') }}",
        //         type: "get",
        //         data: {
        //             category_id: category_id
        //         }, // Pass Selected Category Bt It's ID
        //         dataType: "json",
        //         success: function(response) {
        //             console.log(response); // For Debugging Purpose Only
        //             $("#sub_category").find("option").not(":first").remove();
        //             $.each(response["SubCategories"], function(key, item) {
        //                 $("#sub_category").append(
        //                     `<option value='${item.id}'>${item.name}</option>`);
        //             });
        //         },
        //         error: function(jqXHR, exception) {
        //             // console.log("CSRF Token Error Is Working"); // For Debugging Purpose.
        //             // console.log("Something Went Wrong");
        //         }
        //     });
        // });

        $("#title").change(function() {
            var element = $(this);
            // console.log("Name Change Is Working"); // For Debugging Purpose.
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route('get.slug') }}',
                type: 'get',
                data: {
                    title: element.val()
                },
                dataType: 'json',
                success: function(response) {
                    // console.log("Name Change Response Is Working"); // For Debugging Purpose.
                    $("button[type=submit]").prop('disabled', false);
                    if (response['status']) {
                        // console.log("Name Change Response If Is Working"); // For Debugging Purpose.
                        $("#slug").val(response['slug']);
                    }
                }
            });
        });

        // // //  Dropzone
        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            // init: function() {
            //     this.on('addedfile', function(file) {
            //         if (this.files.length > 1) {
            //             this.removeFile(this.files[0]);
            //         }
            //     });
            // },
            url: "{{ route('temp-images.create') }}",
            maxFiles: 10,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                // $("#image_id").val(response.image_id);
                // console.log(response)

                var html = `<div class="col-md-3" id="image-row-${response.image_id}"> <div class="card">
                    <input type="hidden" name="image_array[]" value="${response.image_id}">
                    <img src="${response.imagePath}" class="card-img-top" alt="Response Image">
                    <div class="card-body">
                        
                        <a href="javascript:void(0)" onclick="deleteImage(${response.image_id})" class="btn btn-danger">DELETE</a>
                    </div>
                </div> </div>`;

                $("#product-gallery").append(html);
            },
            complete: function(file) {
                this.removeFile(file);
            }
        });

        function deleteImage(id) {
            $("#image-row-" + id).remove();
        }
    </script>
@endsection
