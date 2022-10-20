<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class Gallery
 * @package App\Models\Profile
 *
 * @property int $id
 * @property int $profile_id
 * @property string $item
 * @property string $item_sm
 * @property string $extension
 *
 */

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'profile_gallery';

    protected $fillable = ['profile_id', 'item', 'item_sm', 'extension'];

    public function isVideo(): bool
    {
        return $this->extension === 'mp4';
    }
}
