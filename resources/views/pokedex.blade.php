@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pokemon List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @guest
                    {{ __('Please log in!')}}
                    @else
                    {{ __('You are logged in!') }}
                    @endguest


                </div>

            </div>
            <div class="container">
                <h1 class="text-center mb-4">Pokemon List</h1>
                <!-- Grid layout 3x3 -->
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($pokemons as $pokemon)
                    <div class="col">
                        <div class="card h-100">
                            @if ($pokemon->photo)
                                <img src="{{ $pokemon->photo_url }}" class="card-img-top">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $pokemon->name }}</h5>
                                <a href="{{ route('pokemon.show', $pokemon) }}" class="card-link">ID: #{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</a>
                                <p class="card-text">Type: {{ $pokemon->primary_type }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-center ">
                {{ $pokemons->links() }}
            </div>
    </div>
@endsection
