<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function ads() {
        return $this->belongsToMany(Ad::class, 'kapcs', 'category_id', 'ad_id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nev', 'ikon'
    ];
}
