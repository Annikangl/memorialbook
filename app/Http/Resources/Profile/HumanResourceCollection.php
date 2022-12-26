<?php

namespace App\Http\Resources\Profile;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class HumanResourceCollection extends ResourceCollection
{
    public $collects = HumanSearchResource::class;

    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        /** @var LengthAwarePaginator $this */
        return [
            'data' => $this->collection,
            'links' => [
                'prev' => $this->previousPageUrl(),
                'next' => $this->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $this->currentPage(),
                'per_page' => $this->perPage(),
                'total' => $this->total(),
            ]
        ];
    }
}
