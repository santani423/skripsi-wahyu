<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bunga extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_bunga'; // Menetapkan primary key ke 'id_bunga'
    public $incrementing = false; // Karena id_bunga bertipe string, non-incrementing
    protected $keyType = 'string'; // Tipe data primary key

    protected $guarded = []; // Semua field bisa di-mass assignment
}
