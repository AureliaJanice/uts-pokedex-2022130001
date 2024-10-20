@extends('layouts.app')

@section('title', 'Update Pokemon')

@section('content')

<div class="text-center mb-4">
    <h1>Update Pokemon</h1>
</div>

<div class="row my-4">
    <div class="col-12 px-5">
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name"
                    placeholder="Input Name" name="name" required value="{{ old('name', $pokemon->name)}}">
            </div><br>

            <div class="form-group">
                <label for="species">Species</label>
                <input type="text" class="form-control" id="species"
                    placeholder="Input Species" name="species" required value="{{ old('species', $pokemon->species)}}">
            </div><br>

            {{-- Select ISO 3166-1 ALPHA-2 Primary Type Codes --}}
            <div class="">
                {{-- mb-3 col-md-12 col-sm-12 --}}
                <label for="primary_type" class="form-group">primary_type</label>
                <select class="form-select" id="primary_type" name="primary_type">
                    <option value="" disabled selected>Select Primary Type</option>
                    @foreach (['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'] as $type)
                        <option value="{{ $type }}"
                            {{ old('primary_type', $pokemon->primary_type) == $type ? 'selected' : '' }}>
                            {{ $type }}</option>
                    @endforeach
                </select>
            </div><br>

            {{-- Power --}}
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="number" class="form-control" id="weight"
                    placeholder="Input Weight" name="weight" value="{{ old('weight', $pokemon->weight)}}">
            </div><br>

            <div class="form-group">
                <label for="height">Height</label>
                <input type="number" class="form-control" id="height"
                    placeholder="Input Height" name="height" value="{{ old('height', $pokemon->height)}}">
            </div><br>

            <div class="form-group">
                <label for="hp">Hp</label>
                <input type="number" class="form-control" id="hp"
                    placeholder="Input Hp" name="hp" value="{{ old('hp', $pokemon->hp)}}">
            </div><br>

            <div class="form-group">
                <label for="attack">Attack</label>
                <input type="number" class="form-control" id="attack"
                    placeholder="Input Attack" name="attack" value="{{ old('attack', $pokemon->attack)}}">
            </div><br>

            <div class="form-group">
                <label for="defense">Defense</label>
                <input type="number" class="form-control" id="defense"
                    placeholder="Input Defense" name="defense" value="{{ old('defense', $pokemon->defense)}}">
            </div><br>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="is_legendary"
                    name="is_legendary" value="{{ old('is_legendary', $pokemon->is_legendary)}}" >
                <label class="form-check-label" for="is_legendary">
                  Is Legendary
                </label>
            </div>

            {{-- Input Pokemon_image --}}
            <div class="form-group">
                <label for="Pokemon_image">Pokemon Image</label>
                <input type="file" class="form-control" id="Pokemon_image" name="Pokemon_image">
                @if ($pokemon->pokemon_image)
                    <img src={{ $pokemon->pokemon_image_url }} class="mt-3" style="max-width: 400px;" />
                @endif
            </div>
            <br>

            <table>
                <td>
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                    <button type="reset" class="btn btn-outline-danger btn-block">Reset</button>
                    <div class="d-flex justify-content-start mt-4">
                    <a href="{{ route('pokemon.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </td>
            </table>
        </form>
    </div>
</div>

@endsection
