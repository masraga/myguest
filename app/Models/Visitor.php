<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facade\DB;

class Visitor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "visitor_card_id",
        "guest_id",
        "created_at",
    ];

    public function guest() {
        return $this->belongsTo('App\Models\Guest');
    }

    public function visitorCard() {
        return $this->belongsTo('App\Models\VisitorCard');
    }
}
