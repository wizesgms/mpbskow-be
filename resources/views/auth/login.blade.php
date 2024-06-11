<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Login</title>
    <meta name="description" content="" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/materialdesignicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.wizestatic.cloud/assets/iziToast/dist/css/iziToast.min.css">
    <style>
        .ip-address {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>
    <!-- Content -->

    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Login -->
                <div class="card p-2">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <a class="app-brand-link gap-2">
                            <img src="{{ asset('assets/img/cropped-LOGO-PNG-1.png') }}" alt="" width="250">
                        </a>
                    </div>
                    <!-- /Logo -->

                    <div class="card-body mt-4">
                        <form class="mb-4" action="{{ route('doLogin') }}" method="POST">
                            @csrf
                            <div class="form-floating form-floating-outline mb-4">
                                <input type="text" class="form-control" id="us" name="username"
                                    placeholder="Username" value="{{ old('username') }}" autofocus required />
                                <label for="us">Username</label>
                            </div>
                            <div class="mb-4">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder=".........." aria-describedby="password" required />
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input type="text" class="form-control" id="captcha" name="captcha"
                                        placeholder="Validation" autofocus required />
                                    <label for="us">Validation</label>
                                </div>
                            </div>
                            <div class="mb-4 text-center">
                                {!! captcha_img() !!}
                            </div>
                            <div class="mb-5">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                    <p class="text-center">
                        <span>Your IP : </span><span class="ip-address" id="ip-address">Loading...</span></p>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>
    <script src="https://files.wizestatic.cloud/assets/iziToast/dist/js/iziToast.min.js" type="text/javascript"></script>
    @if (session('error'))
        <script>
            iziToast.error({
                title: 'Error',
                position: 'topRight',
                message: '{{ session('error') }}',
            });
        </script>
    @endif

    @error('username')
        <script>
            iziToast.error({
                title: 'Error',
                position: 'topRight',
                message: '{{ $message }}',
            });
        </script>
    @enderror

    @error('password')
        <script>
            iziToast.error({
                title: 'Error',
                position: 'topRight',
                message: '{{ $message }}',
            });
        </script>
    @enderror

    <script>
        function fetchIpAddress() {
            fetch('https://api.ipify.org?format=json')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('ip-address').textContent = data.ip;
                })
                .catch(error => {
                    console.error('Error fetching IP address:', error);
                    document.getElementById('ip-address').textContent = 'Error fetching IP address';
                });
        }
        window.onload = fetchIpAddress;
    </script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
</body>

</html>
