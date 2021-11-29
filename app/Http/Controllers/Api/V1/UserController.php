<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\V1\UserRequest;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): Response
    {
        //
    }

    public function store(UserRequest $request): Response
    {
        //
    }

    public function show(User $user): Response
    {
        //
    }

    public function update(UserRequest $request, User $user): Response
    {
        //
    }

    public function destroy(User $user): Response
    {
        //
    }
}
