@extends('admin.layouts.app')

@section('dyn-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Brand</h1>
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
        {{-- Section : X-03 --}}
        <div class="container-fluid">

            <form action="{{ route('products.update', $product->id) }}" method="POST" id="productForm" name="productForm"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                                                    placeholder="Title" value="{{ $product->title }}">
                                                <p class="error"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="slug">Slug</label>
                                                <input readonly type="text" name="slug" id="slug"
                                                    class="form-control" placeholder="Slug" value="{{ $product->slug }}">
                                                <p class="error"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="short_description">Short Description</label>
                                                <textarea name="short_description" id="short_description" cols="30" rows="10" class="summernote"
                                                    placeholder="">{{ $product->short_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="description" cols="30" rows="10" class="summernote"
                                                    placeholder="Description">{{ $product->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="shipping_returns">Shipping & Returns</label>
                                                <textarea name="shipping_returns" id="shiiping_returns" cols="30" rows="10" class="summernote" placeholder="">{{ $product->shipping_returns }}</textarea>
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
                                @if (!empty($productImages))
                                    @foreach ($productImages as $image)
                                        <div class="col-md-3" id="image-row-{{ $image->id }}">
                                            <div class="card">


                                                {{-- <input type="hidden" name="image_array[]" value="{{ $image->id }}"> --}}
                                                <img src="{{ asset('uploads/Products/' . $image->image) }}"
                                                    class="card-img-top" alt="Response Image">
                                                <div class="card-body">
                                                    <a href="javascript:void(0)" onclick="deleteImage({{ $image->id }})"
                                                        class="btn btn-danger">DELETE</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Pricing</h2>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="price">Price</label>
                                                <input type="text" name="price" id="price" class="form-control"
                                                    placeholder="Price" value="{{ $product->price }}">
                                                <p class="error"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="compare_price">Compare at Price</label>
                                                <input type="text" name="compare_price" id="compare_price"
                                                    class="form-control" placeholder="Compare Price"
                                                    value="{{ $product->compare_price }}">
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
                                                    placeholder="sku" value="{{ $product->sku }}">
                                                <p class="error"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="barcode">Barcode</label>
                                                <input type="text" name="barcode" id="barcode" class="form-control"
                                                    placeholder="Barcode" value="{{ $product->barcode }}">
                                                <p class="error"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="custom-control custom-checkbox">
                                                    {{-- <input type="hidden" name="track_qty" id="track_qty" value="No"> --}}
                                                    <input class="custom-control-input" type="checkbox" id="track_qty"
                                                        name="track_qty" value="Yes"
                                                        {{ $product->track_qty == 'Yes' ? 'checked' : '' }}>
                                                    <label for="track_qty" class="custom-control-label">Track
                                                        Quantity</label>
                                                    <p class="error"></p>
                                                </div>
                                            </div>
                                            <div class="mb-3" id="qtyField">
                                                <input type="number" min="0" name="qty" id="qty"
                                                    class="form-control" placeholder="Qty" value="{{ $product->qty }}">
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
                                            <option {{ $product->status == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ $product->status == 0 ? 'selected' : '' }} value="0">Block
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Product Category</h2>

                                    <div class="mb-3">
                                        <label for="section">Section</label>
                                        <select name="section" id="section" class="form-control">
                                            <option value="">Select The Product Section</option>
                                            @if (!empty($sections))
                                                @foreach ($sections as $section)
                                                    <option {{ $product->section_id == $section->id ? 'selected' : '' }}
                                                        value="{{ $section->id }}">{{ $section->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p class="error"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="category">Category</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Select The Product Category</option>
                                            @if (!empty($categories))
                                                @foreach ($categories as $category)
                                                    <option {{ $product->category_id == $category->id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p class="error"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="sub_category">Sub Category</label>
                                        <select name="sub_category" id="sub_category" class="form-control">
                                            <option value="">Select The Product Sub Category</option>
                                            @if (!empty($subcategories))
                                                @foreach ($subcategories as $subcategory)
                                                    <option
                                                        {{ $product->sub_category_id == $subcategory->id ? 'selected' : '' }}
                                                        value="{{ $subcategory->id }}">{{ $subcategory->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Product Brand</h2>
                                    <div class="mb-3">
                                        <select name="brand" id="brand" class="form-control">
                                            <option value="">Select The Brand</option>
                                            @if (!empty($brands))
                                                @foreach ($brands as $brand)
                                                    <option {{ $product->brand_id == $brand->id ? 'selected' : '' }}
                                                        value="{{ $brand->id }}">{{ $brand->name }}
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
                                            <option {{ $product->is_featured == 'No' ? 'selected' : '' }} value="No">
                                                No</option>
                                            <option {{ $product->is_featured == 'Yes' ? 'selected' : '' }} value="Yes">
                                                Yes</option>
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
                                            @if (!empty($relatedProducts))
                                                @foreach ($relatedProducts as $relatedProduct)
                                                    <option selected value="{{ $relatedProduct->id }}">
                                                        {{ $relatedProduct->title }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p class="error"></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="pb-5 pt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </div>
            </form>


        </div>
        {{-- Section : X-03 --}}
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
        // Handle form submission via AJAX
        $("#productForm").submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route('products.update', $product->id) }}',
                type: 'PUT',
                data: element.serialize(),
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);
                    if (response.status) {
                        window.location.href = "{{ route('products.index') }}";
                        $("#title").removeClass('is-invalid').siblings('p').removeClass(
                            'invalid-feedback').html("");
                        $("#name").removeClass('is-invalid').siblings('p').removeClass(
                            'invalid-feedback').html("");
                    } else {
                        var errors = response.errors;
                        $(".error").removeClass('invalid-feedback').html('');
                        $("input[type='text'],input[type='number'],select").removeClass('is-invalid');
                        $.each(errors, function(key, value) {
                            $(`#${key}`).addClass('is-invalid').siblings('p').addClass(
                                'invalid-feedback').html(value);
                        });
                    }
                },
                error: function(jqXHR, exception) {
                    console.log("Something went wrong");
                }
            });
        });

        // Fetch Categories dynamically
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
                    $("#category").find("option").not(":first").remove();
                    $.each(response.SubCategories, function(key, item) {
                        $("#category").append(
                            `<option value='${item.id}'>${item.name}</option>`);
                    });
                },
                error: function(jqXHR, exception) {
                    console.log("Something went wrong");
                }
            });
        });

        // Fetch sub-categories dynamically
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
                    $("#sub_category").find("option").not(":first").remove();
                    $.each(response.SubCategories, function(key, item) {
                        $("#sub_category").append(
                            `<option value='${item.id}'>${item.name}</option>`);
                    });
                },
                error: function(jqXHR, exception) {
                    console.log("Something went wrong");
                }
            });
        });

        // Generate slug based on title
        $("#title").change(function() {
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route('get.slug') }}',
                type: 'GET',
                data: {
                    title: element.val()
                },
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);
                    if (response.status) {
                        $("#slug").val(response.slug);
                    }
                }
            });
        });

        // Dropzone configuration
        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            url: "{{ route('product-images.update') }}",
            maxFiles: 10,
            paramName: 'image',
            params: {
                'product_id': '{{ $product->id }}'
            },
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                // Store the image ID in the hidden input field
                var existingIds = $('#image_id').val();
                var updatedIds = existingIds ? existingIds + ',' + response.image_id : response.image_id;
                $('#image_id').val(updatedIds);

                // Add the uploaded image to the gallery
                var html = `<div class="col-md-3" id="image-row-${response.image_id}">
                  <div class="card">
                      <input type="hidden" name="image_array[]" value="${response.image_id}">
                      <img src="${response.imagePath}" class="card-img-top" alt="Response Image">
                      <div class="card-body">
                          <a href="javascript:void(0)" onclick="deleteImage(${response.image_id})" class="btn btn-danger">DELETE</a>
                      </div>
                  </div>
                </div>`;
                $("#product-gallery").append(html);
            }

            // success: function(file, response) {
            //     $("#image_id").val(response.image_id);
            //     var html = `<div class="col-md-3" id="image-row-${response.image_id}"> <div class="card">
        //   <input type="hidden" name="image_array[]" value="${response.image_id}">
        //   <img src="${response.imagePath}" class="card-img-top" alt="Response Image">
        //   <div class="card-body">
        //       <a href="javascript:void(0)" onclick="deleteImage(${response.image_id})" class="btn btn-danger">DELETE</a>
        //   </div> </div> </div>`;
            //     $("#product-gallery").append(html);
            // }
        });

        // Function to remove image
        function deleteImage(id) {
            $("#image-row-" + id).remove();
            if (confirm("Are You Sue To Really Delete This Image ?")) {


                $.ajax({
                    url: '{{ route('product-images.destroy') }}',
                    type: 'DELETE',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response.status == true) {
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    }
                });
            }
        }
    </script>
@endsection
