<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Area
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AreaPhase[] $phases
 * @property-read int|null $phases_count
 * @method static \Illuminate\Database\Eloquent\Builder|Area newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Area query()
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Area whereUpdatedAt($value)
 */
	class Area extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AreaPhase
 *
 * @property int $id
 * @property string $title
 * @property int $area_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Area $area
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPhase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPhase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPhase query()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPhase whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPhase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPhase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPhase whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaPhase whereUpdatedAt($value)
 */
	class AreaPhase extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Property
 *
 * @property int $id
 * @property string $property_type
 * @property string|null $plot_type
 * @property int $area_id
 * @property int $area_phase_id
 * @property string $status
 * @property string|null $plot_number
 * @property string $street_number
 * @property string $sector
 * @property float $size
 * @property string $size_unit
 * @property float $price
 * @property string $orientation
 * @property string $category
 * @property string|null $extras If any extra information present with property
 * @property string $item_condition
 * @property string|null $agency_name
 * @property string|null $client_name
 * @property string|null $client_mobile
 * @property int $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Area $area
 * @property-read \App\Models\AreaPhase|null $phase
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereAgencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereAreaPhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereClientMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereClientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereExtras($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereItemCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereOrientation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePlotNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePlotType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property wherePropertyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereSector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereSizeUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereStreetNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereUpdatedAt($value)
 */
	class Property extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int|null $parent_id Related with same table.
 * @property string $type
 * @property string|null $designation
 * @property string|null $image
 * @property string|null $address
 * @property string|null $agencyname
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Area[] $areas
 * @property-read int|null $areas_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Property[] $properties
 * @property-read int|null $properties_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAgencyname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

