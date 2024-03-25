<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lieu;
use App\Models\Sport;

class Competition extends Model
{
    use HasFactory;

    public function lieu(){
        return $this -> belongsTo(Lieu::class);
    }

    public function sport(){
        return $this -> belongsTo(Sport::class);
    }

    public function reservation(){
        return $this -> hasMany(Reservation::class);
    }
}
