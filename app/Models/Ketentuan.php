<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketentuan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ketentuan'; // Menetapkan primary key ke 'id_ketentuan'
    public $incrementing = false; // Karena id_ketentuan bertipe string, non-incrementing
    protected $keyType = 'string'; // Tipe data primary key

    protected $guarded = []; // Semua field bisa di-mass assignment
}
