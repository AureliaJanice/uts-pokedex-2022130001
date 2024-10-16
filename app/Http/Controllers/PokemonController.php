<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required | string | max:225',
            'species' => 'required | string | max:100',
            'primary_type' => 'required | string | max:50 ',
            'weight' => 'required | decimal | max:8 ',
            'height' => 'required | decimal | max:8 ',
            'hp' => 'required | integer | max:4 ',
            'attack' => 'required | integer | max:4 ',
            'defense' => 'required | integer | max:4 ',
            'is_legendary' => 'required | boolean ',
        ]);

        //simpen ke db
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => ' image | mimes:jpeg,png,jpg,giF,svg | max:2048'
            ]);
            $imagePath = $request->file('photo')->store('public/images');

            $validated['photo'] = $imagePath;
        }

        // feedback data ny dh d simpen
        // dump($validated);
        Pokemon::create([
            'name' => $validated['name'],
            'species' => $validated['species'],
            'primary_type' => $validated['primary_type'],
            'weight' => $validated['weight'],
            'height' => $validated['height'],
            'hp' => $validated['hp'],
            'attack' => $validated['origin'],
            'defense' => $validated['defense'] ,
            'is_legendary' => $validated['is_legendary'] ,
            'photo' => $validated['photo']?? null
        ]);

        return redirect()->route('pokemon.index')->with('success', 'pokemon added succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $validated = $request->validate([
            'name' => 'required | string | max:225',
            'species' => 'required | string | max:100',
            'primary_type' => 'required | string | max:50 ',
            'weight' => 'required | decimal | max:8 ',
            'height' => 'required | decimal | max:8 ',
            'hp' => 'required | integer | max:4 ',
            'attack' => 'required | integer | max:4 ',
            'defense' => 'required | integer | max:4 ',
            'is_legendary' => 'required | boolean ',
        ]);

        //simpen ke db
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => ' image | mimes:jpeg,png,jpg,giF,svg | max:2048'
            ]);
            $imagePath = $request->file('photo')->store('public/images');

            $validated['photo'] = $imagePath;

            //hapus file yg ada
            if ($pokemon->photo){
                Pokemon::delete([$pokemon->photo]);
            }

            $validated['photo'] = $imagePath;
        }


        $pokemon->update([
            'name' => $validated['name'],
            'species' => $validated['species'],
            'primary_type' => $validated['primary_type'],
            'weight' => $validated['weight'],
            'height' => $validated['height'],
            'hp' => $validated['hp'],
            'attack' => $validated['origin'],
            'defense' => $validated['defense'] ,
            'is_legendary' => $validated['is_legendary'] ,
            'photo' => $validated['photo']?? $pokemon->pokemon_image,
        ]);

        return redirect()->route('pokemons.index')->with('success', 'pokemon updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        if ($pokemon->pokemon_image) {
            Pokemon::delete($pokemon->pokemon_image);
        }
        $pokemon->delete();
        return redirect()->route('pokemons.index')->with('success', 'pokemon deleted succesfully.');
    }
}
