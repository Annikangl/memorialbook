<?php

namespace App\Services\Attributes;

use App\Models\Profile\Human\Religion;

class ReligionService
{
    /**
     * Create a new religion
     * @param string $title
     * @return Religion
     */
    public function create(string $title): Religion
    {
        return Religion::query()->create(['title' => $title,'slug'=>\Str::slug($title)]);
    }

    /**
     * Delete a religion
     * @param Religion $religion
     * @return bool|null
     */
    public function delete(Religion $religion): ?bool
    {
        return $religion->delete();
    }
}
