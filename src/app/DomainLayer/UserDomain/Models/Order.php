<?php

namespace App\DomainLayer\UserDomain\Models;

use App\DomainLayer\ClientDomain\Models\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Order extends Model
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

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
