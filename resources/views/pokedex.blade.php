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
                <h1 class="text-center mb-4">Pokedex</h1>
                <!-- Grid layout 3x3 -->
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($pokemons as $pokemon)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ $pokemon->photo_url }}" class="card-img-top" alt="{{ $pokemon->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pokemon->name }}</h5>
                                <p class="card-text">ID: {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</p>
                                <p class="card-text">Type: {{ $pokemon->type }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="row row-cols-3-center">
                    <div class="col-md-4 mb-4">
                        <div class="card-body card text-center"> --}}
                        {{-- </div>
                    <div class="col-md-4 mb-4">Column</div>
                    <div class="col-md-4 mb-4">Column</div>
                    <div class="col-md-4 mb-4">Column</div>
                    <div class="col-md-4 mb-4">Column</div>
                    <div class="col-md-4 mb-4">Column</div>
                    <div class="col-md-4 mb-4">Column</div>
                    <div class="col-md-4 mb-4">Column</div>
                    <div class="col-md-4 mb-4">Column</div>
                </div> --}}

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $pokemons->links() }}
            </div>
    </div>
@endsection
