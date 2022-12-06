<?php

namespace App\Models\Profile;

use App\Models\Profile\Human\Human;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FamilyBurial extends Model
{
    use HasFactory;

    public function humans(): HasMany
    {
        return $this->hasMany(Human::class);
    }
}
