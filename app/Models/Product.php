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
        "price"
    ];


    use HasFactory;


    public function getAuthor() {
        return $this->hasOne(User::class, "id", "author_id");
    }
}
