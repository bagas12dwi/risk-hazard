<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Victim extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function workAccident()
    {
        return $this->belongsTo(WorkAccident::class);
    }
}