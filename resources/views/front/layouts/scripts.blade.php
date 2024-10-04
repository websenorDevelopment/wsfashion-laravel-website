<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('front-assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('front-assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
<script src="{{ asset('front-assets/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('front-assets/js/custom.js') }}"></script>
<script>
    window.onscroll = function() {
        myFunction()
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addToCart(id) {
        $.ajax({
            url: '{{ route('front.addToCart') }}', // Route for adding item to cart
            type: 'post',
            data: {
                id: id // Sending the product ID to the server
            },
            dataType: 'json',
            success: function(response) { // Use 'response' for handling the server response
                if (response.status == true) {
                    // // Show a confirm dialog to the user
                    // if (confirm(response.message + "\nWould you like to view your cart?")) {
                    //     // If user confirms, redirect to the cart page
                    //     window.location.href = "{{ route('front.cart') }}";
                    // } else {
                    //     // If user cancels, stay on the current page
                    //     console.log("User chose not to view the cart.");
                    // }

                    window.location.href = "{{ route('front.cart') }}";
                } else {
                    console.log(response.message); // Log error messages
                    alert(response.message); // Optionally show an alert for error messages
                }
            },
            error: function(xhr, status, error) { // Error handling for AJAX request failure
                console.error('Error:', error); // Log the error for debugging purposes
                alert("An error occurred while adding the product to the cart.");
            }
        });
    }
</script>
