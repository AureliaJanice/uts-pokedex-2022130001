@extends('layouts.app')

@section('title', 'Update Pokemon')

@section('content')

<div class="mt-4 p-5 bg-black text-white">
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

        <form action="{{ route('Pokemon.store') }}" method="POST" enctype="multipart/form-data">
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
                    <option value="ID" {{ old('primary_type', $pokemon->primary_type) == 'ID' ? 'selected' : '' }}>Grass</option>
                    <option value="CN" {{ old('primary_type', $pokemon->primary_type) == 'CN' ? 'selected' : '' }}>Fire</option>
                    <option value="US" {{ old('primary_type', $pokemon->primary_type) == 'US' ? 'selected' : '' }}>Water</option>
                    <option value="UK" {{ old('primary_type', $pokemon->primary_type) == 'UK' ? 'selected' : '' }}>Bug</option>
                    <option value="MY" {{ old('primary_type', $pokemon->primary_type) == 'MY' ? 'selected' : '' }}>Normal</option>
                    <option value="IN" {{ old('primary_type', $pokemon->primary_type) == 'IN' ? 'selected' : '' }}>Poison</option>
                    <option value="JP" {{ old('primary_type', $pokemon->primary_type) == 'JP' ? 'selected' : '' }}>Electric</option>
                    <option value="SG" {{ old('primary_type', $pokemon->primary_type) == 'SG' ? 'selected' : '' }}>Ground</option>
                    <option value="ID" {{ old('primary_type', $pokemon->primary_type) == 'ID' ? 'selected' : '' }}>Fairy</option>
                    <option value="CN" {{ old('primary_type', $pokemon->primary_type) == 'CN' ? 'selected' : '' }}>Fighting</option>
                    <option value="US" {{ old('primary_type', $pokemon->primary_type) == 'US' ? 'selected' : '' }}>Psychic</option>
                    <option value="UK" {{ old('primary_type', $pokemon->primary_type) == 'UK' ? 'selected' : '' }}>Rock</option>
                    <option value="MY" {{ old('primary_type', $pokemon->primary_type) == 'MY' ? 'selected' : '' }}>Ghost</option>
                    <option value="IN" {{ old('primary_type', $pokemon->primary_type) == 'IN' ? 'selected' : '' }}>Ice</option>
                    <option value="JP" {{ old('primary_type', $pokemon->primary_type) == 'JP' ? 'selected' : '' }}>Dragon</option>
                    <option value="SG" {{ old('primary_type', $pokemon->primary_type) == 'SG' ? 'selected' : '' }}>Dark</option>
                    <option value="JP" {{ old('primary_type', $pokemon->primary_type) == 'JP' ? 'selected' : '' }}>Steel</option>
                    <option value="SG" {{ old('primary_type', $pokemon->primary_type) == 'SG' ? 'selected' : '' }}>Flying</option>
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
                    <a href="{{ route('Pokemon.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </td>
            </table>
        </form>
    </div>
</div>

@endsection
