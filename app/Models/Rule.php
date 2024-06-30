<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_rule'; // Menetapkan primary key ke 'id_rule'
    public $incrementing = false; // Karena id_rule bertipe string, non-incrementing
    protected $keyType = 'string'; // Tipe data primary key

    protected $guarded = []; // Semua field bisa di-mass assignment
}
