@extends('auth.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="registration-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Existing form fields -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>
                            <div class="col-md-6">
                                <select id="country" class="form-control @error('country') is-invalid @enderror" name="country" required>
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
                        </div>

                        <div class="row mb-3">
                            <label for="state" class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>
                            <div class="col-md-6">
                                <select id="state" class="form-control @error('state') is-invalid @enderror" name="state" required>
                                    <option value="">{{ __('Select State') }}</option>
                                </select>
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>
                            <div class="col-md-6">
                                <select id="city" class="form-control @error('city') is-invalid @enderror" name="city" required>
                                    <option value="">{{ __('Select City') }}</option>
                                </select>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Code Generation Section -->
                        <div class="row mb-3">
                            <label for="generated-code" class="col-md-4 col-form-label text-md-end">{{ __('Generated Code') }}</label>
                            <div class="col-md-6">
                                <input id="generated-code" name="code" type="text" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" id="generate-code-button" class="btn btn-secondary">
                                    {{ __('Generate Code') }}
                                </button>
                                <button type="submit" class="btn btn-primary" id="submit-button" disabled>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const countrySelect = document.getElementById('country');
    const stateSelect = document.getElementById('state');
    const citySelect = document.getElementById('city');
    const generateCodeButton = document.getElementById('generate-code-button');
    const generatedCodeInput = document.getElementById('generated-code');
    const submitButton = document.getElementById('submit-button');
    var base_url = document.getElementById('fefefeffbas134').value;


    // Check local storage to disable the generate code button
    const codeGenerated = localStorage.getItem('codeGenerated');
    if (codeGenerated) {
        generateCodeButton.disabled = true;
    }

    // Clear local storage when the page is unloaded
    window.addEventListener('beforeunload', function () {
        localStorage.removeItem('codeGenerated');
    });

    countrySelect.addEventListener('change', function () {
        const countryId = this.value;
        stateSelect.innerHTML = '<option value="">{{ __('Select State') }}</option>';
        citySelect.innerHTML = '<option value="">{{ __('Select City') }}</option>';
        
        if (countryId) {
            fetch(`${base_url}/states/${countryId}`)
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

    stateSelect.addEventListener('change', function () {
        const stateId = this.value;
        citySelect.innerHTML = '<option value="">{{ __('Select City') }}</option>';
        
        if (stateId) {
            fetch(`${base_url}/cities/${stateId}`)
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

    generateCodeButton.addEventListener('click', function () {
        // Disable the generate code button and submit button
        generateCodeButton.disabled = true;
        submitButton.disabled = true;

        fetch(`${base_url}/generate-code`, {
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
@endsection
