<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;


class ReservationController extends Controller
{
    public $hotels = [
                "Tous les hôtels",
                "Disney's Hotel New York - The Art of Marvel",
                "Disney's Newport Bay Club",
                "Disney's Sequoia Lodge",
                "Disney's Hotel Cheyenne",
                "Disney's Hotel Santa Fe",
                "Villages Nature® Paris by Center Parcs",
                "Disney's Davy Crockett Ranch",
                "Dream Castle Fabulous Hotels Group",
                "Magic Circus Fabulous Hotels Group",
                "Radisson Blu Hotel Paris, Marne-la-Vallée",
                "Adagio Marne-la-Vallée Val d'Europe",
                "Explorers Fabulous Hotels Group",
                "Campanile Val de France",
                "Hôtel l’Elysée Val d’Europe",
                "B&B Hôtel"
    ];
    public function create(){
        $hotels = $this->hotels;
        return view('layout.accueil', compact('hotels'));
    }
    public function store(Request $request) {
        $hotels = $this->hotels;
        $this->validate($request,
            [
                'nom' => 'required|between:2,250',
                'prenom' => 'required|between:2,250',
                'datefilter' => 'nullable',
                'depart' => 'required',
                'arrivee' => 'required',
                'hotel' => ['required',
                        Rule::notIn([0])],
                'time' => 'required',
                // 'message' => 'nullable|string'
            ]
        );
   
        $tab = $request->all();
       
        $dateCommande = Carbon::now()->format('d/m/Y');

        Mail::to('webmaster@monsite.fr')
            ->send(new Contact($request->all(), $this->hotels[$request->hotel], $dateCommande));  

        return view('app.reservation-confirm', compact('tab', 'hotels'));
    }
}
