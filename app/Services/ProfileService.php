<?php


namespace App\Services;


use App\Models\Profile;

class ProfileService
{
    public function search(string $fullName, ?string $birthdateStart, ?string $birthdateEnd, ?string $deathDateStart, ?string $deathDateEnd)
    {
        return Profile::filtered()->get();
    }
}
