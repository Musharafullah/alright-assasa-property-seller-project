<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $with = ["phases"];

    public function phases()
    {
        return $this->hasMany(AreaPhase::class);
    }
}