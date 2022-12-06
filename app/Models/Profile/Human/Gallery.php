<?php

namespace App\Models\Profile\Human;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class Gallery
 *
 * @package App\Models\Human
 * @property int $id
 * @property int $human_id
 * @property string $item
 * @property string $item_sm
 * @property string $extension
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\Profile\Human\GalleryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereItemSm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'human_galleries';

    protected $fillable = ['human_id', 'item', 'item_sm', 'extension'];

    public function isVideo(): bool
    {
        return $this->extension === 'mp4';
    }
}
