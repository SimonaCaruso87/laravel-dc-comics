<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('admin.comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:70',
            'description' => 'required',
            'thumb' => 'nullable|max:2048',
            'price' => 'required|numeric|min:2|max:100',
            'series' => 'required|max:64',
            'sale_date' => 'nullable|date',
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo non può essere più lungo di 70 caratteri',
        ]);

        // se vogliamo prendere le info una alla volta 
        // dalla request possiamo usare input , che è una funzione che si
        //si aspetta che gli passiamo una stringa con il name che ci interessa
        $comic = new Comic();
        $comic->title = $request->input('title');
        $comic->description = $request->input('description');
        $comic->thumb = $request->input('thumb');
        $comic->price = $request->input('price');
        $comic->series = $request->input('series');
        $comic->sale_date = $request->input('sale_date');
        $comic->type = $request->input('type');
        $comic->artists = $request->input('artists');
        $comic->writers = $request->input('writers');
        $comic->save();

        // lo show vuole un parametro e per prendere 
        // l'id serve la variabile comic freccia id perchè 
        // è un oggetto di tipo Comic
        return redirect()->route('comics.show', ['comic' => $comic->id]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $comic = Comic::findOrFail($id);
        return view('admin.comics.show', compact('comic'));
        // oppure
        // return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::findOrFail($id);

        return view('admin.comics.edit' , compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate([
            'title' => 'required|max:70',
            'description' => 'required',
            'thumb' => 'nullable|max:2048',
            'price' => 'required|numeric|min:2|max:100',
            'series' => 'required|max:64',
            'sale_date' => 'nullable|date',
        ], [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo non può essere più lungo di 70 caratteri',
        ]);

        $comic = new Comic();
        $comic->title = $request->input('title');
        $comic->description = $request->input('description');
        $comic->thumb = $request->input('thumb');
        $comic->price = $request->input('price');
        $comic->series = $request->input('series');
        $comic->sale_date = $request->input('sale_date');
        $comic->type = $request->input('type');
        $comic->artists = $request->input('artists');
        $comic->writers = $request->input('writers');
        $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::findOrFail($id);

        $comic->delete();

        return redirect()->route('comics.index');
    }
}
