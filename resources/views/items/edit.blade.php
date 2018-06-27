@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="h2">Prekės redagavimas</span>
                    <button onclick='location.href="{{ url('/items') }}"'
                        type="button"
                        class="btn btn-info float-right">
                        Pradinis
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
                            action="{{ url('/items', $item->id) }}"
                            method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">
                                        Prekės pavadinimas:
                                    </label>
                                </div>
                                <div class="col-md-9 mb-9">
                                    <input type="text"
                                        class="form-control"
                                        value="{{ $item->name }}"
                                        name="name"
                                        id="validationServer01"
                                        placeholder="Įveskite prekės pavadinimą"
                                        required>
                                    <div class="invalid-feedback">
                                        * Įveskite Prekės pavadinimą!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">
                                        Prekės kiekis:
                                    </label>
                                </div>
                                <div class="col-md-9 mb-9">
                                    <input type="text"
                                        class="form-control"
                                        value="{{ $item->quantity }}"
                                        name="quantity"
                                        id="validationServer01"
                                        placeholder="Įveskite prekės kiekį"
                                        required>
                                    <div class="invalid-feedback">
                                        * Įveskite Prekės kiekį!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">
                                        Prekės kaina:
                                    </label>
                                </div>
                                <div class="col-md-9 mb-9">
                                    <input type="text"
                                        class="form-control"
                                        value="{{ $item->price }}"
                                        name="price"
                                        id="validationServer01"
                                        placeholder="Įveskite prekės kainą"
                                        required>
                                    <div class="invalid-feedback">
                                        * Įveskite Prekės kainą!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer02">Prekės kategorija: </label>
                                </div>
                                <div class="col-md-9 mb-9">
                                    <select class="form-control"
                                        value="{{ old('category') }}"
                                        name="category" 
                                        id="validationServer02"
                                        required>
                                        <option value="">Pasirinkite prekės kategoriją</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ ( $category->id == $item->category_id ) ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        * Pasirinkite kategoriją!
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer01">
                                        Prekės aprašymas:
                                    </label>
                                </div>
                                <div class="col-md-9 mb-9">
                                    <input type="text"
                                        class="form-control"
                                        value="{{ $item->description }}"
                                        name="description"
                                        id="validationServer01"
                                        placeholder="Įveskite prekės aprašymą"
                                        required>
                                    <div class="invalid-feedback">
                                        * Įveskite Prekės aprašymą!
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Patvirtinti</button>
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
