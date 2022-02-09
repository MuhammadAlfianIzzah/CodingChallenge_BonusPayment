<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ["total", "nama", "user_id"];
    use HasFactory;

    public function pembagianBuruh()
    {
        return $this->hasMany(PembagianBuruh::class, "id_payment");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
