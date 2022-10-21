<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeathReason extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['title'];
}
