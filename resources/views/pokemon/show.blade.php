@extends('layouts.app')

@section('title', "Pokemon: $pokemon->name")

@section('content')

<div class="container">
    <div class="row d-flex justify-content-center ">
        <div class="card">
            <div class="card-header text-center">
                <h1>Detail Pokemon</h1></div>
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-3">
                        @if ($pokemon->photo)
                            <img src="{{ $pokemon->photo_url }}" class="rounded img-thumbnail w-40"/>
                        @endif
                    </div>
        <div class="col-sm-6">
          <div class="row d-flex justify-content-center">
            <div class="col-8 col-sm-4">
                Name
            </div>
            <div class="col-8 col-sm-4">
                {{ $pokemon->name }}
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Species
                </div>
                <div class="col-4 col-sm-4">
                    {{ $pokemon->species }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Primary Type
                </div>
                <div class="col-4 col-sm-4">
                    {{ $pokemon->primary_type }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Weight
                </div>
                <div class="col-4 col-sm-4">
                    {{ $pokemon->weight }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Height
                </div>
                <div class="col-4 col-sm-4">
                    {{ $pokemon->height }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Hp
                </div>
                <div class="col-4 col-sm-4">
                    {{ $pokemon->hp }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Defense
                </div>
                <div class="col-4 col-sm-4">
                    {{ $pokemon->defense }}
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-sm-4">
                    Is Legendary
                </div>
                <div class="col-4 col-sm-4">
                    @if ($pokemon->is_legendary)
                            <td>Yes</td>
                        @else
                            <td>No</td>
                        @endif
                </div>
            </div>
        </div>
      </div>
</div>

<br>
<div class="mb-4 d-flex justify-content-center">
    <a href="{{ route('pokedex', $pokemon) }}" class="btn btn-secondary btn-sm me-3 ">
        Back to Home
    </a>

    <a href="{{ route('pokemon.index', $pokemon) }}" class="btn btn-secondary btn-sm ">
        Back to List Pokemon
    </a>

</div><br>

@endsection
