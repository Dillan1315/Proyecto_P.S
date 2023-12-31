<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        "id",
        "nombre",
        "descripcion",
        "user_id"
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function products() {
        return $this->hasMany(Product::class,'category_id');
    }
}