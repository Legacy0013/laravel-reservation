<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ["nom", "lieu", "quand", "description", "affiche"];

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }
}
