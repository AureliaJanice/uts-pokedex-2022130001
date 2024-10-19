@extends('layouts.app')

@section('title', 'Pokemon List')

@section('content')
<div class="text-center">
    <h1>All Pokemon</h1>

    <a href="{{ route('pokemon.create') }}" class="btn btn-primary btn-sm">Create New Pokemon</a>

</div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

<div class="container mt-5">
    <table class="table table-striped mb-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Species</th>
                    <th scope="col">Primary Type</th>
                    <th scope="col">Power</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody id="pokemon-list">
                @forelse ($pokemons as $pokemon)
                <tr>
                    <th scope="row">{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</th>
                    <td>
                        <a href="{{ route('pokemon.show', $pokemon) }}">
                        {{ $pokemon->name }}
                        </a>
                    </td>

                    <td>{{ $pokemon->species }}</td>
                    <td>{{ $pokemon->primary_type }}</td>
                    <td>{{ $pokemon->hp + $pokemon->attack + $pokemon->defense }}</td>
                    <td>
                        <a href="{{ route('pokemon.edit', $pokemon) }}" class="btn btn-warning  btn-sm">
                           Edit
                        </a>
                        <form action={{ route('pokemon.destroy', $pokemon) }} method="POST" class="d-inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">No pokemons found.</td>
                </tr>
                @endforelse
            </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $pokemons->links() !!}
    </div>
</div>
@endsection

