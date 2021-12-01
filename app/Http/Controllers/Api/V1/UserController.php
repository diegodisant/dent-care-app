<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Http\Response\Api\ApiResponseInterface;
use App\Http\Response\Api\FailedCreationResponse;
use App\Http\Response\Api\FailedUpdateResponse;
use App\Http\Response\Api\NotFoundErrorResponse;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
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
        $newUser = new User($request->all());
        $wasSaved = $newUser->save();

        if (!$wasSaved) {
            return new FailedCreationResponse(User::class);
        }

        $userResource = new UserResource($newUser);

        event(new Registered($newUser));

        return new JsonResponse($userResource);
    }

    public function show(int $user): JsonResponse
    {
        $userId = (int) $user->id;
        $storedUser = DB::table(User::TABLE_NAME)
            ->find($userId);

        if ($storedUser === null) {
            return new NotFoundErrorResponse(
                User::class,
                $userId
            );
        }

        $userResource = new UserResource($storedUser);

        return new JsonResponse(
            $userResource,
            ApiResponseInterface::HTTP_STATUS_CREATED
        );
    }

    public function update(UserRequest $request, User $user): JsonResponse
    {
        $storedUser = DB::table(User::TABLE_NAME)
            ->find($user->id);

        if ($user === null) {
            return new NotFoundErrorResponse(
                User::class,
                $storedUser
            );
        }

        $updatedRows = $storedUser->update($request->all());
        $wasUpdated = $updatedRows > 0;

        if (!$wasUpdated) {
            return new FailedUpdateResponse(
                User::class,
                $user->id,
                $storedUser
            );
        }

        $userResource = new UserResource($storedUser);

        return new JsonResponse($userResource);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return new JsonResponse(
            null,
            ApiResponseInterface::HTTP_STATUS_OK
        );
    }
}
