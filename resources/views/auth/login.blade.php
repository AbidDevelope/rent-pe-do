<!doctype html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('web/logos/favicon.png') }}" type="image/x-icon">

    <title>RentDo Login</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="">

    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/login.css') }}">
</head>

<body>
    <section class="login-section">
        <div class="card loginCard">
            <div class="card-body">
                <div class="page-content text-center">
                    <img class="page-logo" src="{{ asset('web/logos/logo.png') }}" alt="">
                    <h2 class="pageTitle">Welcome to</h2>
                    <p class="pagePera">Login to your account.!</p>
                </div>

                <form action=" {{ route('login') }}" method="POST"> @csrf
                    <div class="form-outline form-white mb-4">
                        <div class="form-outline form-white mb-3">
                            <input type="email" value="{{ old('email') }}" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email or Phone">
                            @error('email')
                                <span class="text text-danger" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-outline form-white mb-3">
                        <div class="position-relative passwordInput">
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password">
                            <span class="eye" onclick="showHidePassword()">
                                <i class="far fa-eye fa-eye-slash" id="togglePassword"></i>
                            </span>
                        </div>
                        @error('password')
                            <span class="text text-danger" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                        @enderror
                    </div>

                    <div class="remember text-center d-flex justify-content-between flex-wrap gap-3 mt-4">
                        Having trouble in Login?
                        @if (app()->environment('local'))
                            <button class="btn btn-outline-primary btn-sm" type="button"
                                onclick="setLoginCredential()">Set visitor</button>
                        @endif
                    </div>



                    <button class="btn loginButton" type="submit">Login</button>
                </form>
            </div>
        </div>

    </section>

    <script>
        function showHidePassword() {
            const toggle = document.getElementById("togglePassword");
            const password = document.getElementById("password");

            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // toggle the icon
            toggle.classList.toggle("fa-eye-slash");
        }

        const setLoginCredential = function() {
            var password = document.getElementById("password");
            var email = document.getElementById("email");

            email.value = 'visitor@example.com';
            password.value = 'visitor@123';
        }
    </script>

</body>

</html>
