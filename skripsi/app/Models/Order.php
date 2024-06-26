<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];
    protected $table = 'orders';
    protected $primaryKey = 'id';

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id' ,'id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'order_id', 'id');
    }

    public function timeline(): HasOne
    {
        return $this->hasOne(Timeline::class,'order_id', 'id');
    }
}
