@include('front.layouts.head')
<header class="bg-white">
    <div class="container">
        <nav class="navbar navbar-expand-xl navbar-light bg-white" id="navbar">

            <!-- Brand Logo -->
            <a href="{{ route('front.home') }}" class="navbar-brand">
                <img class="myntra_home" src="{{ asset('front-assets/images/Myntra_logo.webp') }}"
                    alt="Myntra Home ( Logo )" />
            </a>

            <!-- Toggler for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if (!empty(getSections()))
                        @foreach (getSections() as $section)
                            <li class="nav-item dropdown mega-dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false"> {{ $section->name }} </a>

                                <!-- Dropdown Menu -->
                                @if ($section->categories->isNotEmpty())
                                    <div class="dropdown-menu mega-menu p-3">
                                        <div class="container">
                                            @php
                                                $categories = $section->categories;
                                                $chunkedCategories = $categories->chunk(4); // Categories are chunked for layout
                                            @endphp
                                            @foreach ($chunkedCategories as $chunk)
                                                <div class="row">
                                                    @foreach ($chunk as $category)
                                                        <div class="col-md-3 col-sm-6">
                                                            <h5 class="dropdown-header">{{ $category->name }}</h5>
                                                            @if ($category->subcategories->isNotEmpty())
                                                                <ul class="list-unstyled">
                                                                    @foreach ($category->subcategories as $subcategory)
                                                                        <li>
                                                                            <a class="dropdown-item" href="#">
                                                                                {{ $subcategory->name }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>

                <!-- Search Bar with Icons -->
                <div class="d-flex align-items-center">
                    <form action="" class="d-flex mt-3">
                        <div class="input-group">
                            <input type="text" placeholder="Search For Products" class="form-control"
                                aria-label="Search for Products">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    <!-- Additional Icons after the Search Bar -->
                    <div class="navbar-icons d-flex align-items-center">

                        <!-- Wishlist Icon -->
                        <a href="#wishlist" class="nav-link me-2">
                            <i class="fas fa-heart text-primary"></i>
                        </a>

                        <!-- Shop Icon -->
                        <a href="{{ route('front.shop') }}" class="nav-link me-2">
                            <i class="fas fa-store text-primary"></i>
                        </a>

                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<main>
    <div id="Login_form" class="container pt-4 ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-lg-4">
                <div class="text-center ">
                    <img src="{{ asset('front-assets/images/Login.jpg') }}" class="img-fluid" alt="Login Image" />
                </div>
                <form class="bg-white p-4 shadow" action="" method="" name="registrationForm"
                    id="registrationForm">
                    @csrf
                    {{-- <div class="text-center mb-4">
                        <img src="{{ asset('front-assets/images/Login.jpg') }}" class="img-fluid" alt="Login Image" />
                    </div> --}}
                    <div class=" mt-4">
                        <h4>Login <span style="fonts"> or </span> Signup </h4>
                    </div>

                    <div class="input-group mt-4" style="border: 1px solid grey;">
                        <input type="text" class="form-control border-0" id="name" name="name"
                            placeholder="Enter Name" title="Enter Correct Name" required>
                    </div>
                    <div class="input-group mt-4" style="border: 1px solid grey;">
                        <input type="text" class="form-control border-0" id="email" name="email"
                            placeholder="Enter E-Mail" title="Enter Correct E-Mail" required>
                    </div>

                    <div class="input-group mt-4" style="border: 1px solid grey;">
                        <span class="input-group-text bg-white border-0">+91 | </span>
                        <input type="text" class="form-control border-0" id="mobile_no" name="mobile_no"
                            placeholder="Enter Number" pattern="[1-9]{1}[0-9]{9}" title="Enter Correct Number" required>
                    </div>
                    <div class="input-group mt-4" style="border: 1px solid grey;">
                        <input type="text" class="form-control border-0" id="password" name="password"
                            placeholder="Password" title="Password" required>
                    </div>
                    <div class="input-group mt-4" style="border: 1px solid grey;">
                        <input type="text" class="form-control border-0" id="password_confirmation"
                            name="password_confirmation" placeholder="Confirm Password" title="Confirm Password"
                            required>
                    </div>


                    <p class="text-muted mt-4" style="font-size: 10px;">
                        By continuing, I agree to the <a href="#"
                            class="text-decoration-none fw-bold text-danger">Terms of Use</a> &
                        <a href="#" class="text-decoration-none fw-bold text-danger">Privacy Policy</a>
                    </p>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-danger">
                            <p class="mb-0">CONTINUE</p>
                        </button>
                    </div>
                    <p class="text-muted mt-4 pb-5" style="font-size: 10px;">Have trouble logging in? <a
                            href="#" class="text-danger fw-bold">Get
                            help</a></p>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    // console.log("Hello");
    $("#registrationForm").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "{{ route('account.processRegister') }}",
            type: "post",
            data: $(this).serializeArray(),
            dataType: "json",
            success: function(response) {
                var errors = response.errors;

                // Handle validation errors
                if (response.status === false) {
                    if (errors.name) {
                        $("#name").addClass("is-invalid").next('.invalid-feedback').html(errors
                            .name);
                    } else {
                        $("#name").removeClass("is-invalid").next('.invalid-feedback').html("");
                    }
                    if (errors.email) {
                        $("#email").addClass("is-invalid").next('.invalid-feedback').html(errors
                            .email);
                    } else {
                        $("#email").removeClass("is-invalid").next('.invalid-feedback').html("");
                    }
                    if (errors.mobile_no) {
                        $("#mobile_no").addClass("is-invalid").next('.invalid-feedback').html(errors
                            .mobile_no);
                    } else {
                        $("#mobile_no").removeClass("is-invalid").next('.invalid-feedback').html(
                            "");
                    }
                    if (errors.password) {
                        $("#password").addClass("is-invalid").next('.invalid-feedback').html(errors
                            .password);
                    } else {
                        $("#password").removeClass("is-invalid").next('.invalid-feedback').html("");
                    }
                } else {
                    // If no errors, clear inputs and redirect to login
                    $("#name, #email, #mobile_no, #password").removeClass("is-invalid").next(
                        '.invalid-feedback').html("");
                    window.location.href = "{{ route('account.login') }}";
                }
            },
            error: function(jqXHR, exception) {
                console.log("Something went wrong.");
            }
        });
    });
</script>
