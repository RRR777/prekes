@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <span class="h2">{{ __('Prekių sąrašas') }}</span>

                    <button onclick='location.href="{{ url('/items/create') }}"'
                        type="button"
                        class="btn btn-info float-right btn-space">
                        {{ __('Įvesti naują prekę') }}
                    </button>

                    <button onclick='location.href="{{ url('/filters/create') }}"'
                        type="button"
                        class="btn btn-info float-right btn-space">
                        {{ __('Prekės pagal kategoriją') }}
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
                        <table class="table table-sm table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Eil.Nr.') }}</th>
                                    <th scope="col">{{ __('Pavadinimas') }}</th>
                                    <th scope="col">{{ __('Kiekis') }}</th>
                                    <th scope="col">{{ __('Kaina') }}</th>
                                    <th scope="col">{{ __('Kategorija') }}</th>
                                    <th scope="col">{{ __('Aprašymas') }}</th>
                                    <th scope="col">{{ __('Redaguoti') }}</th>
                                    <th scope="col">{{ __('Trinti') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1 ?>
                                @foreach ($items as $item)
                                    <tr>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td nowrap>
                                            <a href ="{{ url('/api/items', $item->id) }}">
                                                {{ $item->name }}
                                            </a>
                                        </td>
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
