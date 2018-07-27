@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="h2">{{ __('Ar tikrai norite ištrinti šią kategoriją?') }}</span>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        @include('layouts.errors')
                        <form method ="post" action = "{{ url('/category', $category->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                      <th scope="col">{{ __('Eil.Nr.') }}</th>
                                      <th scope="col">{{ __('Kategorija') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1 ?>
                                        <tr>
                                            <th scope="row">{{ $counter++ }}</th>
                                            <td>{{ $category->name }}</td>
                                        </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-info">{{ __('Ištrinti') }}</button>
                            <button onclick='location.href="{{ url('/category') }}"'
                                type="button"
                                class="btn btn-info">
                                {{ __('Atsisakyti') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
