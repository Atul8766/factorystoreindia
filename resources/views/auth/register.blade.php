<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('public/assets/img/favicon.png') }}">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700">
    <!-- Nucleo Icons -->
    <link href="{{ asset('public/assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/nucleo-svg.css') }}" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('public/assets/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet">
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is an easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer="" data-site="{{ env('ANALYTICS_SITE_DOMAIN') }}" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>


</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('{{ asset('public/assets/img/illustrations/illustration-signup.jpg') }}'); background-size: cover;">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Sign Up</h4>
                                    <p class="mb-0">Enter your email and password to register</p>
                                </div>
                                <div class="card-body">
                                    <form id="registration-form" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Name</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Email</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">PAN Card Number</label>
                                            <input id="pan_card_id" type="text" class="form-control @error('pan_card_id') is-invalid @enderror" name="pan_card_id" value="{{ old('pan_card_id') }}"  autocomplete="pan_card_id" autofocus>
                                            @error('pan_card_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">UPI ID</label>
                                            <input id="upi_id" type="text" class="form-control @error('upi_id') is-invalid @enderror" name="upi_id" value="{{ old('upi_id') }}"  autocomplete="upi_id" autofocus>
                                            @error('upi_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>



                                        <div class="input-group input-group-outline mb-3">
                                            <select id="country" class="form-control @error('country') is-invalid @enderror" name="country" >
                                                <option value="">{{ __('Select Country') }}</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="input-group input-group-outline mb-3">
                                            <select id="state" class="form-control @error('state') is-invalid @enderror" name="state" >
                                                <option value="">{{ __('Select State') }}</option>
                                            </select>
                                            @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="input-group input-group-outline mb-3">
                                            <select id="city" class="form-control @error('city') is-invalid @enderror" name="city" >
                                                <option value="">{{ __('Select City') }}</option>
                                            </select>
                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <input id="generated-code" name="code" type="text" class="form-control" readonly>
                                        </div>

                                        <div class="input-group input-group-outline mb-3">
                                            <button type="button" id="generate-code-button" class="btn btn-secondary w-100 mb-2">
                                                {{ __('Generate Code') }}
                                            </button>
                                            <button type="submit" class="btn btn-primary w-100" id="submit-button" disabled>
                                                {{ __('Register') }}
                                            </button>
                                        </div>


                                        <!-- <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control">
                                        </div> -->
                                        <!-- <div class="form-check form-check-info text-start ps-0">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                                        </div> -->



                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="{{route('login.code')}}" class="text-primary text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const baseUrl = '{{ url('/') }}'; // Set the base URL
            const countrySelect = document.getElementById('country');
            const stateSelect = document.getElementById('state');
            const citySelect = document.getElementById('city');
            const generateCodeButton = document.getElementById('generate-code-button');
            const generatedCodeInput = document.getElementById('generated-code');
            const submitButton = document.getElementById('submit-button');

            // Check local storage to disable the generate code button
            const codeGenerated = localStorage.getItem('codeGenerated');
            if (codeGenerated) {
                generateCodeButton.disabled = true;
            }

            // Clear local storage when the page is unloaded
            window.addEventListener('beforeunload', function() {
                localStorage.removeItem('codeGenerated');
            });

            countrySelect.addEventListener('change', function() {
                const countryId = this.value;
                stateSelect.innerHTML = '<option value="">{{ __('Select State ') }}</option>';
                citySelect.innerHTML = '<option value="">{{ __('Select City ') }}</option>';

                if (countryId) {
                    fetch(`http://localhost/factorystoreindia/states/${countryId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(state => {
                                const option = document.createElement('option');
                                option.value = state.id;
                                option.textContent = state.name;
                                stateSelect.appendChild(option);
                            });
                        });
                }
            });

            stateSelect.addEventListener('change', function() {
                const stateId = this.value;
                citySelect.innerHTML = '<option value="">{{ __('Select City ') }}</option>';

                if (stateId) {
                    fetch(`http://localhost/factorystoreindia/cities/${stateId}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(city => {
                                const option = document.createElement('option');
                                option.value = city.id;
                                option.textContent = city.name;
                                citySelect.appendChild(option);
                            });
                        });
                }
            });

            generateCodeButton.addEventListener('click', function() {
                // Disable the generate code button and submit button
                generateCodeButton.disabled = true;
                submitButton.disabled = true;

                fetch(`http://localhost/factorystoreindia/generate-code`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            country: countrySelect.value,
                            state: stateSelect.value,
                            city: citySelect.value
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.code) {
                            generatedCodeInput.value = data.code;
                            submitButton.disabled = false; // Enable the submit button
                            localStorage.setItem('codeGenerated', true); // Mark code as generated
                        } else {
                            alert('Failed to generate code. Please check your inputs.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while generating the code.');
                    });
            });
        });
    </script>

    <script src="{{ asset('public/assets/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('public/assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>

</body>

</html>