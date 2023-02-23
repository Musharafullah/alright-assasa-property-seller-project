<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    const PROPERTY_STATUS_PENDING = "pending";
    const PROPERTY_STATUS_SOLD = "sold";

    const PROPERTY_EXTRAS = [
        "properties" => ["rent", "sale"],
        "item_statuses" => ["plot", "flat", "shop", "house", "plot_file"],
        "plot_types" => ["residential", "commercial", "others"],
        "statuses" => ["pending", "sold"],
        "size_units" => ["marla", "kanal", "hectare"],
        "user_types" => ["admin", "user", "dealer"],
        "orientations" => ["north", "south", "east", "west"],
        "categories" => ["corner", "general", "avenue", "boulevard"],
        "item_conditions" => ["direct_client", "direct_dealer", "one_down_dealer", "other"],
        "purchase_statuses" => ["pending", "sold"]
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function phase()
    {
        return $this->belongsTo(AreaPhase::class, "area_phase_id");
    }
}