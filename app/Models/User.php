<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const USER_TYPE_USER = "user";
    const USER_TYPE_ADMIN = "admin";
    const USER_TYPE_DEALER = "dealer";

    const USER_TYPES = ["user", "admin", "dealer"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['extras', 'image_url'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    public function child_users()
    {
        return $this->hasMany(User::class, "parent_id");
    }
    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }

    public function getExtrasAttribute()
    {
        if ($this->type == User::USER_TYPE_ADMIN) {
            $pending_count = Property::where("purchase_status", Property::PROPERTY_STATUS_PENDING)->count();
            $sold_count = Property::where("purchase_status", Property::PROPERTY_STATUS_SOLD)->count();
        } else if ($this->type == User::USER_TYPE_DEALER) {
            $pending_count = Property::where("purchase_status", Property::PROPERTY_STATUS_PENDING)->whereHas("user", function ($query) {
                $query->where("id", $this->id)->orWhere("parent_id", $this->id);
            })->count();
            $sold_count = Property::where("purchase_status", Property::PROPERTY_STATUS_SOLD)->whereHas("user", function ($query) {
                $query->where("id", $this->id)->orWhere("parent_id", $this->id);
            })->count();
        } else {
            $pending_count = $this->properties()->where("purchase_status", Property::PROPERTY_STATUS_PENDING)->count();
            $sold_count = $this->properties()->where("purchase_status", Property::PROPERTY_STATUS_SOLD)->count();
        }

        return [
            "total" => $pending_count + $sold_count,
            "pending" => $pending_count,
            "sold" => $sold_count
        ];
    }

    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk("public")->fileExists($this->image)) {
            return Storage::disk("public")->url($this->image);
        }
        return null;
    }
}