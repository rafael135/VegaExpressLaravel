<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEvaluation extends Model
{
    protected $fillable = [
        "product_id",
        "evaluations_qnt",
        "total_grade"
    ];

    use HasFactory;

    public function getProduct() {
        return $this->hasOne(Product::class, "id", "product_id");
    }
}
