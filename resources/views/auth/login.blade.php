<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Dashboard</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('login.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/logos.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="body">
    <div class="container" style="margin-top: 80px">
        <div class="login-wrap">
            @if (session('error-login'))
                <div id="live">
                    <div class="danger-alert">
                        <i class="far fa-check-circle shine-alert"></i> &nbsp; &nbsp;
                        <span>Sorry! {{ session('error-login') }}</span>
                    </div>
                </div>
            @endif
            <div class="login-html">
                <div style="margin-top: 45px">
                    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label
                        style="font-weight: bold; font-family:Noto Serif Balinese;" for="tab-1" class="tab">Sign
                        In</label>
                    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2"
                        class="tab"></label>
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="sign-in-htm">
                                <div class="group">
                                    <label for="email" class="label m-1">Email</label>
                                    <input id="email" type="email" name="email" id="email"
                                        placeholder="Your Email"
                                        class="mt-2 mb-2 input @error('email') is-invalid @enderror" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="group">
                                    <label for="password" class="label m-1">Password</label>
                                    <input id="password" type="password" name="password"
                                        class="mt-2 mb-2 input @error('password') is-invalid @enderror"
                                        data-type="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="group m-1">
                                    <input id="check" type="checkbox" class="check"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label for="check"><span class="icon"></span> Keep me signed in</label>
                                </div>
                                <div class="group">
                                    <button style="margin-top: 80px" type="submit" class="button btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                <div class="foot-lnk">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>
