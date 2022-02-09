<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembagianBuruh extends Model
{
    protected $fillable = ["id_payment", "no_buruh", "persentasi", "bonus"];
    use HasFactory;
}
