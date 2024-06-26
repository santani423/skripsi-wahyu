<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'payments';

    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
