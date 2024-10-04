<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Laravel Online Shop</title>
    <meta name="description" content="" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />

    <meta property="og:locale" content="en_AU" />
    <meta property="og:type" content="website" />
    <meta property="fb:admins" content="" />
    <meta property="fb:app_id" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="" />
    <meta property="og:image:height" content="" />
    <meta property="og:image:alt" content="" />

    <meta name="twitter:title" content="" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:image:alt" content="" />
    <meta name="twitter:card" content="summary_large_image" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/ion.rangeSlider.min.css') }}" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/video-js.css') }}" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/style.css') }}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap"
        rel="stylesheet">

    <!-- Fav Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front-assets/images/Myntra_logo.webp') }}" />


    <style>
        @media (max-width: 768px) {
            .navbar {
                flex-direction:
                    column;
            }
        }

        .carousel-base {
            -webkit-box-sizing:
                border-box;
            box-sizing:
                border-box;
            padding-top:
                20px;
            padding-bottom:
                15px;
            margin:
                0 auto;
        }

        .container-base {
            -webkit-box-sizing:
                border-box;
            box-sizing:
                border-box;
            width:
                100%;
            position:
                relative;
            overflow:
                hidden;
            background-repeat:
                no-repeat;
        }

        footer {
            height:
                55px;
            background-color:
                #f7f7f7;
            padding-top:
                28px;
            font-size:
                14px;
            color:
                #696b79;
            text-decoration:
                none;
            font-family:
                Whitney,
                -apple-system,
                BlinkMacSystemFont,
                Segoe UI,
                Roboto,
                Helvetica,
                Arial,
                sans-serif;
            -webkit-font-smoothing:
                antialiased;
            -webkit-text-size-adjust:
                100%;
            letter-spacing:
                0.3px;
        }

        footer a {
            cursor:
                pointer;
            color:
                #696b79;
            text-decoration:
                none;
            font-weight:
                500;
        }

        .footer-container {
            display:
                flex;
            flex-direction:
                column;
            background-color:
                #f7f7f7;
            padding-left:
                100px;
            padding-right:
                80px;
            width:
                100%;
        }

        .row {
            display:
                flex;
            margin-bottom:
                20px;
        }

        .online-shopping {
            text-align:
                left;
            margin-right:
                50px;
        }

        .customer-policies {
            text-align:
                left;
            margin-right:
                50px;
        }

        .app {
            text-align:
                left;
            margin-right:
                90px;
        }

        .customer-surity {
            display:
                flex;
            flex-direction:
                column;
            justify-content:
                flex-start;
            align-items:
                flex-start;
            text-align:
                left;
        }

        .content-heading {
            color:
                black;
            font-weight:
                600;
            letter-spacing:
                normal;
        }

        .content-box {
            line-height:
                1.6;
        }

        .para-content {
            margin-top:
                25px;
            margin-bottom:
                40px;
        }

        .copyright-container {
            display:
                flex;
            justify-content:
                space-between;
            margin-bottom:
                30px;
        }

        .horizontal-line {
            margin-bottom:
                30px;
            opacity:
                0.2;
            height:
                0.3px;
        }

        .office-address-content {
            opacity:
                0.9;
            margin-bottom:
                30px;
        }

        .other-info-heading {
            font-weight:
                600;
            letter-spacing:
                normal;
            color:
                black;
            font-size:
                15px;
            opacity:
                0.8;
        }

        .other-info-para-content {
            margin-top:
                8px;
            margin-bottom:
                30px;
            font-size:
                13px;
            opacity:
                0.8;
        }

        .Google-play {
            background-repeat:
                none;
            margin-right:
                10px;
        }

        .App-Store {
            background-repeat:
                none;
        }

        .download-button {
            display:
                flex;
            margin-top:
                30px;
        }

        .download-button img {
            width:
                130px;
            height:
                40px;
        }

        .original {
            margin-bottom:
                30px;
            color:
                black;
            opacity:
                0.8;
        }

        .footer-item {
            display:
                flex;
            align-items:
                center;
            margin-bottom:
                10px;
        }

        .footer-item img {
            margin-right:
                10px;
        }

        .social-links {
            margin-top:
                12px;
        }

        .fb-icon {
            margin-right:
                6px;
        }

        .tw-icon {
            margin-right:
                6px;
        }

        .yt-icon {
            margin-right:
                6px;
        }

        .section7 img {
            cursor:
                pointer;
            width:
                100%;
            background-size:
                cover;
        }

        .section8 {
            display:
                flex;
            justify-content:
                center;
        }


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
</head>
