<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiquette extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public function hotels() {
        return $this->belongsToMany(Hotel::class)
            ->withTimestamps();
    }
}
