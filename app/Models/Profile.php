<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable=['name','patronymic','surname','avatar','date_birth',
        'place_birth','date_death','burial_place','reason_death','death_certificate','religious_views','hobby','image_video_gallery',
        'id_father','id_mother','id_spouse','moderation_status','moderators_comment','setting_access','gender','p_id','m_id','f_id'];
}
