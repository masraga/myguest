<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorCard extends Model
{
    use HasFactory;
    
    protected $table = "visitor_cards";

    protected $fillable = [
        "card_id",
        "face",
        "time_end",
        "is_approve",
        "is_exit",
        "receiptionist_id"
    ];

    public function visitor() {
        return $this->hasMany('App\Models\Visitor');
    }
}
