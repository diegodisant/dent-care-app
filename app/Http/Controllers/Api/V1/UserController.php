<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        //
    }

    public function store(Request $request): Response
    {
        //
    }

    public function show(User $user): Response
    {
        //
    }

    public function update(Request $request, User $user): Response
    {
        //
    }

    public function destroy(User $user): Response
    {
        //
    }
}
