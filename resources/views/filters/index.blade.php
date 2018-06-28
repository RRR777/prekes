@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="h2">Prekės priklausančios "{{ $category->name }}" kategorijai</span>
                    <button onclick='location.href="{{ url('/items') }}"'
                        type="button"
                        class="btn btn-info float-right">
                        Pradinis
                    </button>
                    <br>
                    <br>
                    <p class="h5">Kategorija: {{ $category->name }} </p>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        @include('layouts.errors')
                        <table class="table table-sm table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Eil.Nr.</th>
                                    <th scope="col">Pavadinimas</th>
                                    <th scope="col">Kiekis</th>
                                    <th scope="col">Kaina</th>
                                    <th scope="col">Kategorija</th>
                                    <th scope="col">Aprašymas</th>
                                    <th scope="col">Redaguoti</th>
                                    <th scope="col">Trinti</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1 ?>
                                @foreach ($items as $item)
                                    <tr>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td nowrap>{{ $item->name }}</td>
                                        <td nowrap>{{ $item->quantity }}</td>
                                        <td nowrap>{{ $item->price }}</td>
                                        <td nowrap>{{ $item->category->name }}</td>
                                        <td nowrap>{{ $item->description }}</td>
                                        <td nowrap>
                                            <a href = "{{ url('items', $item->id) . '/edit' }}">
                                                {{ __('Redaguoti') }}
                                            </a>
                                        </td>
                                        <td nowrap>
                                            <a href = "{{ url('items', $item->id) . '/delete' }}">
                                                {{ __('Ištrinti') }}
                                            </a>
                                        </td>
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
