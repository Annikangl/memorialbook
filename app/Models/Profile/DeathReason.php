<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Human\DeathReason
 *
 * @property int $id
 * @property string $title
 * @method static \Database\Factories\Profile\DeathReasonFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DeathReason query()

 * @mixin \Eloquent
 */
class DeathReason extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title'];

    public static function getReasonList()
    {
        return self::all()->toArray();
    }
}
