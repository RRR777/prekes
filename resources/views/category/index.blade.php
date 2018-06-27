@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="h2">Kategorijos</span>
                    <button onclick='location.href="{{ url('/items') }}"'
                        type="button"
                        class="btn btn-info float-right btn-space">
                        Pradinis
                    </button>
                    <button onclick='location.href="{{ url('/category/create') }}"'
                        type="button"
                        class="btn btn-info float-right btn-space">
                        Pridėti naują kategoriją
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
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Eil.Nr.</th>
                                    <th scope="col">Kategorija</th>
                                    <th scope="col">Redaguoti</th>
                                    <th scope="col">Trinti</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1 ?>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td nowrap><a href = "{{ url('category', $category->id) . '/edit' }}">{{ __('Redaguoti') }}</a></td>
                                        <td nowrap><a href = "{{ url('category', $category->id) .'/delete' }}">{{ __('Ištrinti') }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
