@extends('layouts.app')

@section('title', "Pokemon: $pokemon->name")

@section('content')

@if ($pokemon->photo)
    <img src="{{ $pokemon->photo }}" class="rounded img-thumbnail mx-auto d-block my-3"/>
@endif

<div class="col-md-12 mt-4">
<table class="table table-striped table-bordered table-container table-center ">
    <tbody>
        <tr>
            <th scope="row">Name</th>
            <td>{{ $pokemon->name }}</td>
        </tr>
        <tr>
            <th scope="row">Species</th>
            <td>{{ $pokemon->specises }}</td>
        </tr>
        <tr>
            <th scope="row">Primary Type</th>
            <td>{{ $pokemon->primary_type }}</td>
        </tr>
        <tr>
            <th scope="row">Weight</th>
            <td>{{ $pokemon->weight }}</td>
        </tr>
        <tr>
            <th scope="row">height</th>
            <td>{{ $pokemon->height }} </td>
        </tr>
        <tr>
            <th scope="row">hp</th>
            <td>{{ $pokemon->hp }}</td>
        </tr>
        <tr>
            <th scope="row">attack</th>
            <td>{{ $pokemon->attack }}</td>
        </tr>
        <tr>
            <th scope="row">defense</th>
            <td>{{ $pokemon->defense }}</td>
        </tr>
        <tr>
            <th scope="row">Is Legendary</th>
            <td>{{ $pokemon->is_legendary }}</td>
        </tr>
    </tbody>
</table>
</div>

<div class="mb-3">
    <small>Created at: {{ $pokemon->created_at }}</small>
    @if ($pokemon->updated_at)
        <br><small>Updated at: {{ $pokemon->updated_at }}</small>
    @endif
</div>

<div class="mb-4">
    <a href="{{ route('pokemons.index', $pokemon) }}" class="btn btn-secondary btn-sm">
    Back
    </a>
</div><br>

@endsection
