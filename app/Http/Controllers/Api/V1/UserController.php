<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\UserRequest;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): JsonResponse
    {
        $users = DB::table(User::TABLE_NAME)
            ->paginate(self::PAGINATION_PAGE_SIZE);

        $usersCollection = new UserCollection($users);

        $usersCollection->additional($this->buildPaginationData($users));

        return new JsonResponse($usersCollection);
    }

    public function store(UserRequest $request): JsonResponse
    {
        //
    }

    public function show(User $user): JsonResponse
    {
        //
    }

    public function update(UserRequest $request, User $user): JsonResponse
    {
        //
    }

    public function destroy(User $user): JsonResponse
    {
        //
    }
}
