@include('front.layouts.head')


<header class="bg-white border-bottom">
    <div class="container">
        <nav class="navbar navbar-expand-xl navbar-light bg-white d-flex justify-content-between align-items-center"
            id="navbar">

            <!-- Brand Logo -->
            <div class="text-start">
                <a href="{{ route('front.home') }}" class="navbar-brand">
                    <img class="myntra_home" style="width: 75px;" src="{{ asset('front-assets/images/Myntra_logo.webp') }}"
                        alt="Myntra Home (Logo)" />
                </a>
            </div>

            <!-- Cart Header Details -->
            <div class="text-center d-none d-md-block cart-progress">
                <span class="step">BAG</span> <span class="divider">----------</span>
                <span class="step">Address</span> <span class="divider">----------</span>
                <span class="step">Payment</span>
            </div>

            <!-- Cart Secure -->
            <div class="text-end">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img class="cart-secure" src="{{ asset('front-assets/images/sprite-secure.png') }}"
                        style="width: 30px;" alt="Secure" />
                    <span class="ms-2">100% SECURE</span>
                </a>
            </div>

        </nav>
    </div>
</header>


<!-- Main Content -->
<div class="bg-white">
    <!-- Breadcrumb -->
    <section class="section-5 pt-3 pb-3 mb-3 mt-2 bg-white">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('front.shop') }}">Shop</a></li>
                <li class="breadcrumb-item">Cart</li>
            </ol>
        </div>
    </section>

    <!-- Cart and Summary Section -->
    <div class="row center">
        <div class="col-1"></div>

        <div class="col-10 ml-5 px-5 cart-summary-section ">
            <div class="row">
                @if (Session::has('success'))
                    <div class="md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {!! Session::get('success') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <div class="col-md-8 ">
                    {{-- <div class="deliverTo p-3 mb-3 mt-2 shadow-sm d-flex align-items-center justify-content-between bg-light">
                        <p class="mb-0">Deliver To:</p><input type="text" value="" style="display:none;">
                        <div>
                            <a href="javascript:void(0)" class="btn btn-outline-brown" id="showPincodeCard">CHANGE
                                YOUR ADDRESS</a>
                        </div>
                    </div>
                    <div class="card border shadow-sm mb-3 p-3 bg-light" id="pincodeCard" style="display:none;">
                        <div class="d-flex justify-content-between">
                            <h5>Enter Delivery Pincode</h5>
                            <button type="button" class="btn btn-sm btn-outline-danger"
                                id="closePincodeCard">&times;</button>
                        </div>
                        <input type="text" class="form-control" id="pincodeInput" placeholder="Check Availability">
                    </div> --}}


                    <div
                        class="deliverTo p-3 mb-3 mt-2 shadow-sm d-flex align-items-center justify-content-between bg-light">
                        <p class="mb-0" id="deliverToText">Deliver To:</p>
                        <input type="text" value="" style="display:none;">
                        <div>
                            <a href="javascript:void(0)" class="btn btn-outline-brown" id="showPincodeCard">CHANGE YOUR
                                ADDRESS</a>
                        </div>
                    </div>

                    <div class="card border shadow-sm mb-3 p-3 bg-light" id="pincodeCard" style="display:none;">
                        <div class="d-flex justify-content-between">
                            <h5>Enter Delivery Pincode</h5>
                            <button type="button" class="btn btn-sm btn-outline-danger"
                                id="closePincodeCard">&times;</button>
                        </div>
                        <input type="text" class="form-control" id="pincodeInput" placeholder="Check Availability">
                    </div>

                    <div class="card border shadow-sm p-3 bg-white">
                        <h4>Available Offers</h4>
                        <ul id="offerList">
                            <li>10% Instant Discount on ICICI Bank Credit and Debit Cards on a min spend of ₹3,500.
                                TCA</li>
                            <a id="showMoreOffers" class=" mt-2">Show More</a>
                            <div id="moreOffers" style="display:none;">

                                <li>10% Instant Discount on Kotak Credit and Debit Cards on a min spend of ₹3,500.
                                    TCA</li>
                                <li>10% Instant Discount on Kotak Credit and Debit Cards on a min spend of ₹3,500.
                                    TCA</li>
                                <li>10% Instant Discount on Kotak Credit and Debit Cards on a min spend of ₹3,500.
                                    TCA</li>
                                <li>10% Instant Discount on Kotak Credit and Debit Cards on a min spend of ₹3,500.
                                    TCA</li>

                                <a id="showLessOffers" class="mt-2">Show Less</a>
                            </div>
                        </ul>
                    </div>
                    <div class="bg-white">
                        <div class="details d-flex justify-content-between px-3 pt-3 pb-3">
                            <div>
                                <input type="checkbox" id="selectAll" checked> <span id="selectedCount">1/1</span> ITEMS
                                SELECTED
                            </div>
                            <div>
                                <a href="#remove" id="removeSelected">REMOVE</a> |
                                <a href="#wishlist">ADD TO WISHLIST</a>
                            </div>
                        </div>
                    </div>

                    @if (!empty($cartContent))
                        @foreach ($cartContent as $index => $item)
                            <div class="card border shadow-sm mb-3 p-3">
                                <div class="position-relative mb-2">
                                    <input type="checkbox"
                                        class="productCheckbox position-absolute top-0 start-0 ms-2 mt-2 "
                                        data-index="{{ $index }}" checked>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-borderless cart-table">
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">
                                                    <div class="d-flex align-items-center">

                                                        @if (!empty($item->options->productImage->image))
                                                            <img src="{{ asset('uploads/Products/' . $item->options->productImage->image) }}"
                                                                class="img-fluid " style="width: 130px;"
                                                                alt="Product">
                                                        @else
                                                            {{-- Placeholder image can go here --}}
                                                        @endif
                                                        <div class="ms-3">
                                                            <h6>{{ $item->name ? $item->name : 'Product Name' }}</h6>
                                                            <p class="text-muted">
                                                                {{ $item->short_description ? $item->short_description : 'Product Description' }}
                                                            </p>
                                                            <p><strong>Sold By:</strong>
                                                                {{ $item->brand ? $item->brand : 'Brand' }}</p>
                                                            <p class="align-middle">
                                                                {{ $item->price ? $item->price : 'Price' }}</p>
                                                            <p class="mt-2">
                                                                {{ $item->shipping_returns ? $item->shipping_returns : 'Shipping & Returns' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">

                                                    <div class="input-group quantity pb-4">
                                                        <button class="btn btn-sm btn-outline-dark btn-minus sub"
                                                            data-id="{{ $item->rowId }}">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center"
                                                            value="{{ $item->qty ? $item->qty : 'QTY' }}">
                                                        <button class="btn btn-sm btn-outline-dark btn-plus plus"
                                                            data-id="{{ $item->rowId }}">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>

                                                    <select class="form-select form-select-sm">
                                                        <option value="{{ $item->size }}">Size: {{ $item->size }}
                                                        <option selected>Size: M</option>
                                                        <option value="L">Size: L</option>
                                                        </option>
                                                    </select>
                                                </td>
                                                <td class="align-top">
                                                    <button class="btn btn-sm btn-outline-danger"
                                                        onclick="deleteItem('{{ $item->rowId }}');">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="card">
                            Card is empty
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="card border shadow-sm p-3 mb-3">
                        <div class="donate p-3 shadow-sm">
                            <h5>DONATE FOR COVID-19 RELIEF</h5>
                            <div class="help d-flex align-items-center">
                                <input type="checkbox" />
                                <p class="mb-0 ms-2">Help India fight COVID-19</p>
                            </div>
                            <div class="money d-flex justify-content-around mt-3 flex-wrap">
                                <button class="btn btn-outline-secondary btn-sm rounded">Rs.10</button>
                                <button class="btn btn-outline-secondary btn-sm rounded">Rs.50</button>
                                <button class="btn btn-outline-secondary btn-sm rounded">Rs.100</button>
                                <button class="btn btn-outline-secondary btn-sm rounded">Other</button>
                            </div>
                            <a href="" class="text-brown mt-3 d-block text-center">Know More</a>
                        </div>


                        <div class="offers shadow-sm ">
                            <div class="apply d-flex justify-content-between align-items-center mt-3">
                                <h6>Apply Coupons</h6>
                                <button class="btn btn-outline-danger">APPLY</button>
                            </div>
                            <p>OFFERS & COUPONS</p>
                            <a href="#">1 Offer On Your Bag</a>
                        </div>

                        <div class="price-details pt-3">
                            <h6 class="card-title">PRICE DETAILS</h6>
                            <div class="d-flex justify-content-between">
                                <span>Total MRP</span>
                                <span>{{ Cart::subtotal() }}</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Coupon Discount</span>
                            <span class="text-danger">Apply Coupon</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Platform Fee</span>
                            <span class="text-success">FREE</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Shipping Fee</span>
                            <span class="text-success">FREE</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <strong>Total Amount</strong>
                            <strong>{{ Cart::subtotal() }}</strong>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-danger w-100">PLACE ORDER</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-1"></div>
    </div>
</div>

<style>
    /* Custom Styles */
    body {
        background-color: #f9f9f9;
    }

    .bg-light-gray {
        background-color: #f6f6f6;
    }

    .cart-progress .step {
        font-weight: bold;
        color: #333;
    }

    .cart-progress .divider {
        color: #888;
    }

    .cart-table img {
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .cart-table td {
        padding: 1rem;
    }

    .form-select {
        max-width: 120px;
    }

    .btn-minus,
    .btn-plus {
        padding: 0.3rem 0.6rem;
    }

    .cart-summery .card {
        border-color: #ddd;
        background-color: #fff;
    }

    .breadcrumb {
        background-color: #fff;
    }

    .breadcrumb-item a {
        color: #007bff;
    }

    .btn-outline-dark {
        color: #333;
        border-color: #ddd;
    }

    .btn-danger {
        background-color: #ff3f6c;
        border-color: #ff3f6c;
    }

    .btn-outline-danger {
        color: #ff3f6c;
        border-color: #ff3f6c;
    }

    .btn-danger:hover,
    .btn-outline-danger:hover {
        background-color: #ff3f6c;
        color: #fff;
    }

    .quantity .btn {
        padding: 2px 8px;
        font-size: 12px;
        width: 30px;
        /* Adjust as per requirement */
    }

    .quantity .form-control {
        width: 50px;
        /* Adjust to fit the smaller input */
        font-size: 12px;
        padding: 2px;
    }

    .rounded {
        border-radius: 20%;
    }
</style>

@include('front.layouts.scripts')
<script>
    // Js - 01
    document.addEventListener('DOMContentLoaded', function() {
        let selectAllCheckbox = document.getElementById('selectAll');
        let productCheckboxes = document.querySelectorAll('.productCheckbox');
        let selectedCount = document.getElementById('selectedCount');

        // Update the selected count based on the checked checkboxes
        function updateSelectedCount() {
            let total = productCheckboxes.length;
            let selected = 0;

            productCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selected++;
                }
            });

            selectedCount.textContent = `${selected}/${total}`;
        }

        // Add event listener to each product checkbox
        productCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                updateSelectedCount();
            });
        });

        // Add event listener to "Select All" checkbox
        selectAllCheckbox.addEventListener('change', function() {
            productCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            updateSelectedCount();
        });

        // Initialize selected count on page load
        updateSelectedCount();
    });



    // Js - 02
    // Toggle Pincode Card
    // Toggle Pincode Card
    document.getElementById('showPincodeCard').addEventListener('click', function() {
        document.getElementById('pincodeCard').style.display = 'block';
    });

    // Close Pincode Card
    document.getElementById('closePincodeCard').addEventListener('click', function() {
        document.getElementById('pincodeCard').style.display = 'none';
    });

    // Change Input Field Color
    document.getElementById('pincodeInput').addEventListener('input', function() {
        this.style.color = this.value ? 'black' : 'grey';

        // Update the Deliver To text with the entered pincode
        const deliverToText = document.getElementById('deliverToText');
        if (this.value) {
            deliverToText.innerHTML = `Deliver To: ${this.value}`;
        } else {
            deliverToText.innerHTML = 'Deliver To:';
        }
    });


    // Toggle Offers
    document.getElementById('showMoreOffers').addEventListener('click', function() {
        document.getElementById('moreOffers').style.display = 'block';
        this.style.display = 'none';
    });

    document.getElementById('showLessOffers').addEventListener('click', function() {
        document.getElementById('moreOffers').style.display = 'none';
        document.getElementById('showMoreOffers').style.display = 'block';
    });

    // Js - 03
    // Handle increment
    $('.plus').click(function() {
        var qtyElement = $(this).siblings('input'); // Select the input element
        var qtyValue = parseInt(qtyElement.val()); // Get the current value
        if (qtyValue < 10) { // Limit the value to a maximum of 10
            var rowId = $(this).data('id'); // Get the row ID from data attribute
            qtyElement.val(qtyValue + 1); // Increment value by 1
            var newQty = qtyElement.val(); // Get the updated quantity
            updateCart(rowId, newQty); // Call the updateCart function with the new value
        }
    });

    // Handle decrement
    $('.sub').click(function() {
        var qtyElement = $(this).siblings('input'); // Select the input element
        var qtyValue = parseInt(qtyElement.val()); // Get the current value
        if (qtyValue > 1) { // Limit the value to a minimum of 1
            var rowId = $(this).data('id'); // Get the row ID from data attribute
            qtyElement.val(qtyValue - 1); // Decrement value by 1
            var newQty = qtyElement.val(); // Get the updated quantity
            updateCart(rowId, newQty); // Call the updateCart function with the new value
        }
    });

    // UpdateCart function
    function updateCart(rowId, qty) {
        $.ajax({
            url: '{{ route('front.updateCart') }}',
            type: 'post',
            data: {
                rowId: rowId,
                qty: qty,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(response) {
                window.location.href = "{{ route('front.cart') }}";
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                alert('An error occurred while updating the cart.');
            }
        });
    }
    // deleteProduct function
    function deleteItem(rowId) {
        if (confirm("Do you really want to delete this?")) {
            $.ajax({
                url: '{{ route('front.deleteItem.cart') }}',
                type: 'POST',
                data: {
                    rowId: rowId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        window.location.href =
                            "{{ route('front.cart') }}"; // Refresh the page after success
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                    alert('An error occurred while updating the cart.');
                }
            });
        }
    }
    // Remove Selected Items
    $('#removeSelected').click(function(e) {
        e.preventDefault();
        var selectedItems = [];

        // Get the rowId for each selected item
        $('.productCheckbox:checked').each(function() {
            selectedItems.push($(this).data('index'));
        });

        // Check if there are selected items
        if (selectedItems.length === 0) {
            alert('No items selected');
            return;
        }

        // Confirm before deleting
        if (confirm("Do you really want to remove the selected items?")) {
            $.ajax({
                url: '{{ route('front.deleteMultipleItems.cart') }}',
                type: 'POST',
                data: {
                    items: selectedItems, // Send selected items array
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        window.location.href =
                            "{{ route('front.cart') }}"; // Refresh cart on success
                    } else {
                        alert(response.message); // Show error message
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                    alert('An error occurred while updating the cart.');
                }
            });
        }
    });
</script>
