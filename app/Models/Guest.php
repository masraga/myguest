<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_card",
        "name",
        "gender",
        "phone",
        "description"
    ];

    public function visitor() {
        return $this->hasMany('App\Models\Visitor');
    }
}
