<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkAccident extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function followUp()
    {
        return $this->hasMany(FollowUp::class);
    }

    public function victim()
    {
        return $this->hasOne(Victim::class);
    }

    public function images()
    {
        return $this->hasMany(ImageFile::class);
    }
}
