<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #FDEFEB
        }

        .loginData {
            background-color: white
        }


        .btn-pink {
            background-color: #f73d6e;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="LoginContainer">
                <div class="row">
                    <div class="col-6">
                        <div class="LoginImg">
                            <img src="{{ asset('front-assets/images/Login.jpg') }}" alt="Login Image">
                        </div>
                        <div class="loginData">
                            <b>Login</b> or <b>Signup</b>
                            <input type="">
                            <label for="troubleMsg"> By continuing, I agree to the <span> Terms of Use </span> & <span>
                                    Privacy Policy </span> </label>
                            <br>
                            <button type="submit" class="btn btn-pink">CONTINUE</button>
                            <br>
                            <label for="troubleMsg"> Have trouble logging in? <span> Get Help </span> </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
