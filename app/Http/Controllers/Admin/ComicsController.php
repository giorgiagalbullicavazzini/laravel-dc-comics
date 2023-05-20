<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Validation\Rule;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newComic = new Comic();
        $data = $request->validate([
            'title' => 'required|unique:comics,title|max:150|string',
            'description' => 'required',
            'thumb' => 'nullable|url|ends_with:png,jpg,webp',
            'price' => 'required|decimal:2|max:99',
            'series' => 'nullable|max:50|string',
            'sale_date' => 'nullable|date',
            'type' => 'required|string|max:30',
            'artists' => 'nullable',
            'writers' => 'nullable',
        ]);
        
        $newComic -> fill($data);
        $newComic->save();

        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->validate([
            'title' => [
                'required',
                Rule::unique('comics')->ignore($comic->id),
                'max:150',
                'string'
            ],
            'description' => 'required',
            'thumb' => 'nullable|url|ends_with:png,jpg,webp',
            'price' => 'required|decimal:2|max:99',
            'series' => 'nullable|max:50|string',
            'sale_date' => 'nullable|date',
            'type' => 'required|string|max:30',
            'artists' => 'nullable',
            'writers' => 'nullable',
        ]);

        $comic->update($data);

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
