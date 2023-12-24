<?php

namespace App\Http\Resources\User\Event;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginateEventCollection extends ResourceCollection
{
    public $collects = EventResource::class;

    public function toArray($request): array
    {
        /** @var LengthAwarePaginator|ResourceCollection $this */

        return [
            'data' => $this->collection,

            'links' => [
                'previous_page_url' => $this->previousPageUrl(),
                'next_page_url' => $this->nextPageUrl(),
                'first_page_url' => $this->url(1),
                'last_page_url' => $this->url($this->lastPage()),
            ],
            'meta' => [
                'current_page' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'per_page' => $this->perPage(),
                'total' => $this->total(),
            ]
        ];
    }
}
