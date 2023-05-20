<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Scopes\UserScope;

class Ad extends Model
{
    use HasFactory;

    protected static function booted()
    {
        // static::addGlobalScope(new UserScope);
    }

    // ennek a hirdnek a
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'kapcs', 'ad_id', 'category_id');
    }

    public function category() {
        return $this->categories->first();
    }

    public function districts() {
        return $this->BelongsToMany(District::class, 'kapcs', 'ad_id', 'district_id');
    }

    public function district() {
        return $this->districts->first();
    }

    public function states() {
        return $this->BelongsToMany(State::class, 'kapcs', 'ad_id', 'state_id');
    }

    public function state() {
        return $this->states->first();
    }


    // Szurok
    public function scopeKategsz($query) {

        if (request()->filled('kategoria')) {
            $kat = request()->input('kategoria');

            return $query->whereHas('categories', function ($q) use ($kat) {
                $q->where('categories.id', '=', $kat);
            });
        }
    }

    public function scopeKerulsz($query) {

        if (request()->filled('kerulet')) {

            $ker = request()->input('kerulet');

            return $query->whereHas('districts', function ($q) use ($ker) {
                $q->where('districts.id', '=', $ker);
            });
        }
    }

    public function scopeAllapsz($query) {

        if (request()->filled('allapot')) {
            $all = request()->input('allapot');

            return $query->whereHas('states', function ($q) use ($all) {
                $q->where('states.id', '=', $all);
            });
        }
    }

    public function scopeBeirtsz($query) {

        if (request()->filled('beirt')) {
            $bi = request()->input('beirt');

            return $query->where('cim', 'LIKE', '%' . $bi . '%');
        }
    }

    public function scopeFelhasznsz($query) {

        if (request()->filled('beirt')) {
            $bi = request()->input('beirt');

            return $query->where('cim', 'LIKE', '%' . $bi . '%');
        }
    }

                                /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cim', 'szoveg', 'ar'
    ];
}
