<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\User\Network
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Network newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Network newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Network query()
 * @mixin \Eloquent
 */
class Network extends Model
{
    use HasFactory;

    protected $table = 'user_networks';
    public $timestamps = false;
    protected $fillable = ['network', 'identity'];

}
