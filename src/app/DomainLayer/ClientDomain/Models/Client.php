<?php

namespace App\DomainLayer\ClientDomain\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    public function scopeOwn(Builder $query): Builder
    {
        return $query->where('user_id', '=', Auth::user()->id);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }

    public function location(): HasOne
    {
        return $this->hasOne(Location::class);
    }
}
