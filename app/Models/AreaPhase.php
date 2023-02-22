<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaPhase extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'title'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}