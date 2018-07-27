@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="h2">{{ __('Prekės pagal kategoriją') }}</span>
                    <button onclick='location.href="{{ url('/items') }}"'
                        type="button"
                        class="btn btn-info float-right">
                        {{ __('Pradinis') }}
                    </button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        @include('layouts.errors')
                        <form class="needs-validation"
                            novalidate
                            action="{{ url('/filters') }}"
                            method="post">
                            {{ csrf_field() }}

                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationServer01">{{ __('Kategorija:') }}</label>
                                </div>
                                <div class="col-md-10 mb-9">
                                    <select class="form-control"
                                        value="{{ old('category') }}"
                                        name="category"
                                        id="validationServer01"
                                        required>
                                        <option value="">{{ __('Pasirinkite kategoriją') }}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('* Pasirinkite kategoriją!') }}
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-info"
                                    type="submit">
                                    {{ __('Patvirtinti') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection
