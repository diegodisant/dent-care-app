<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;

class PatientCollection extends ResourceCollection implements CollectionInterface
{
    /** @var string $collects */
    public $collects = PatientResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     */
    public function toArray($request): Arrayable | JsonSerializable |array
    {
        return [
            self::FIELD_ITEMS => $this->collection,
            self::FIELD_PAGINATION => $this->additional,
        ];
    }
}
