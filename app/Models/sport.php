<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Competition;

class Sport extends Model
{
    use HasFactory;

    public function competition(){
        return $this -> hasMany(Competition::class);
    }
}
