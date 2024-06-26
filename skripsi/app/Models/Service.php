<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory,HasUuids;

    protected $guarded = [];
    protected $table = 'services';
    protected $primaryKey = 'id';

    public function orders() : HasMany
    {
        return $this->hasMany(Order::class, 'service_id', 'id');
    }


}
