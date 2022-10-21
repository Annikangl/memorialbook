<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Profile\DeathReason
 *
 * @property int $id
 * @property string $title
 * @method static \Database\Factories\Profile\DeathReasonFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathReason newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeathReason newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeathReason query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeathReason whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathReason whereTitle($value)
 * @mixin \Eloquent
 */
class DeathReason extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title'];
}
