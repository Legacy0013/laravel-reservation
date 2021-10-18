<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Categorie;
use App\Models\Etiquette;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {
        // $nbrLigne = 10;
        $query = $slug ? Categorie::whereSlug($slug)->firstOrFail()->hotels() : Hotel::query();
        $hotels = $query->orderBy('id', 'asc')->paginate(10);
        
        return view('hotel.index', compact('hotels'));
        // ->with('nbrLigne');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etiquettes = Etiquette::all();
        return view('hotel.create', compact('etiquettes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Hotel $hotel)
    {
        $request->validate([
            'nom' => 'required',
            'lieu' => 'required',
            'quand' => 'required',
            'description' => 'required',
            'categorie_id' => 'required'
            ]);
            $hotel->nom = $request->nom;
            $hotel->lieu = $request->lieu;
            $hotel->quand = $request->quand;
            $hotel->description = $request->description;
            $hotel->categorie_id = $request->categorie_id;
            $hotel->save();

            $hotel->etiquettes()->attach($request->etiquettes);
            
            return redirect()->route('hotel.index')
                            ->with('success-add','L\'hôtel a bien été crée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        // $hotels = Hotel::findOrFail($id);
        // $hotel->with('etiquettes')->get();
        return view('hotel.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $etiquettes = Etiquette::all();
        return view('hotel.edit', compact('hotel', 'etiquettes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        // dd($hotel);
        $request->validate([
            'nom' => 'required',
            'lieu' => 'required',
            'quand' => 'required',
            'description' => 'required',
            'categorie_id' => 'required'
            ]);
            // $hotel = Hotel::findOrFail($hotel);
            $hotel->nom = $request->nom;
            $hotel->lieu = $request->lieu;
            $hotel->quand = $request->quand;
            $hotel->description = $request->description;
            $hotel->categorie_id = $request->categorie_id;
            $hotel->save();

            $hotel->etiquettes()->sync($request->etiquettes);

            return redirect()->route('hotel.index', $hotel->id)
            ->with('success-modif','L\'hôtel a bien été mit à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotel.index')
            ->with('success-supp','L\'hôtel a bien été supprimé');
    }
}
