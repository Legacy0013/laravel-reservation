<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nbrLigne = 10;
        $hotels = Hotel::paginate($nbrLigne);
        
        return view('hotel.index', compact('hotels'))
        ->with('nbrLigne');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.create');
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
            'description' => 'required'
            ]);
            $hotel->nom = $request->nom;
            $hotel->lieu = $request->lieu;
            $hotel->quand = $request->quand;
            $hotel->description = $request->description;
            $hotel->save();
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
        return view('hotel.edit', compact('hotel'));
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
            'description' => 'required'
            ]);
            // $hotel = Hotel::findOrFail($hotel);
            $hotel->nom = $request->nom;
            $hotel->lieu = $request->lieu;
            $hotel->quand = $request->quand;
            $hotel->description = $request->description;
            $hotel->save();
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
