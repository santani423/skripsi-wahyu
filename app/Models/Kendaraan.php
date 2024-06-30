<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_kendaraan'; // Menetapkan primary key ke 'id_kendaraan'
    public $incrementing = false; // Karena id_kendaraan bertipe string, non-incrementing
    protected $keyType = 'string'; // Tipe data primary key

    protected $guarded = []; // Semua field bisa di-mass assignment
}
