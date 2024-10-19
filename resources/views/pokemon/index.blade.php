@extends('layouts.app')

@section('title', 'Pokemon List')

@section('content')
<div class="text-center">
    <h1>All Pokemon</h1>

    <a href="{{ route('Pokemon.create') }}" class="btn btn-primary btn-sm">Create New Pokemon</a>

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

            <tbody>
                @forelse ($Pokemons as $Pokemon)
                <tr>
                    <th scope="row">{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }}</th>
                    <td>
                        <a href="{{ route('Pokemon.show', $Pokemon) }}">
                        {{ $Pokemon->name }}
                        </a>
                    </td>
                    <td>{{ Str::limit($Pokemon->description, 50, '...') }}</td>
                    <td>{{ $Pokemon->species }}</td>
                    <td>{{ $Pokemon->primary_type }}</td>
                    <td>{{ $Pokemon->power }}</td>
                    <td>
                        <a href="{{ route('Pokemon.edit', $Pokemon) }}" class="btn btn-warning  btn-sm">
                           Edit
                        </a>
                        <form action={{ route('Pokemon.destroy', $Pokemon) }} method="POST" class="d-inline-block">
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
                    <td colspan="7">No Pokemons found.</td>
                </tr>
                @endforelse
            </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $Pokemons->links() !!}
    </div>
</div>
@endsection

