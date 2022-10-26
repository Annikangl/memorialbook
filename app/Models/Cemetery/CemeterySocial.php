<?php

namespace App\Models\Cemetery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Social
 * @package App\Models\Cemetery
 *
 * @property int id
 * @property int $cemetery_id
 * @property string $facebook
 * @property string $instagram
 * @property string $twitter
 * @property string $wikipedia
 */
class CemeterySocial extends Model
{
    use HasFactory;

    public const FACEBOOK_ICON = 'assets/media/media/icons/social/facebook.svg';
    public const INSTAGRAM_ICON = 'assets/media/media/icons/social/instagram.svg';
    public const TWITTER_ICON = 'assets/media/media/icons/social/twitter.svg';
    public const WIKI_ICON = 'assets/media/media/icons/social/wikipedia.svg';

    protected $fillable = ['facebook', 'instagram',' twitter', 'wikipedia'];

    public function cemetery(): BelongsTo
    {
        return $this->belongsTo(Cemetery::class);
    }
}
