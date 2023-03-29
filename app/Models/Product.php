<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "author_id",
        "title",
        "description",
        "imgs",
        "price"
    ];


    use HasFactory;


    public function Author() {
        return $this->belongsTo(User::class, "author_id", "id");
    }
}
