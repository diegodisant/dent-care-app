<?php
declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Requests\V1\UserRequest;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;

class UserCollection extends ResourceCollection implements CollectionInterface
{
    /** @var string $collects */
    public $collects = UserResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param UserRequest $request
     */
    public function toArray($request): Arrayable | JsonSerializable | array
    {
        return [
            self::FIELD_ITEMS => $this->collection,
            self::FIELD_PAGINATION => $this->additional,
        ];
    }
}
