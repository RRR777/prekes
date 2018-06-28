@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="h2">Ar tikrai norite ištrinti šią prekę?</span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        @include('layouts.errors')
                        <form method ="post" action = "{{ url('/items', $item->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <table class="table table-sm table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Eil.Nr.</th>
                                    <th scope="col">Pavadinimas</th>
                                    <th scope="col">Kiekis</th>
                                    <th scope="col">Kaina</th>
                                    <th scope="col">Kategorija</th>
                                    <th scope="col">Aprašymas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1 ?>
                                    <tr>
                                        <th scope="row">{{ $counter++ }}</th>
                                        <td nowrap>{{ $item->name }}</td>
                                        <td nowrap>{{ $item->quantity }}</td>
                                        <td nowrap>{{ $item->price }}</td>
                                        <td nowrap>{{ $item->category->name }}</td>
                                        <td nowrap>{{ $item->description }}</td>
                                    </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-info">Ištrinti</button>
                        <button onclick='location.href="{{ url('/items') }}"'
                            type="button"
                            class="btn btn-info">
                            Atsisakyti
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
