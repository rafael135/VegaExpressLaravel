<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        "active",
        "user_id",
        "cep",
        "bairro",
        "rua",
        "numero"
    ];

    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
