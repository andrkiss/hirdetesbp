<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class UserScope implements Scope
{
    protected $user;

    public function __construct() {
            $this->user = Auth::user();
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $user = $this->user ?: Auth::user();
        //if (auth()->check()) {}
    }
}
