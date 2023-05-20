<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    // ez a kerulet
    public function ads() {
        $this->belongsToMany(Ad::class, 'kapcs', 'district_id', 'ad_id');
    }


    protected $fillable = [
        'szam', 'nev'
    ];
}
