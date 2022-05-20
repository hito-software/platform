<?php

namespace Hito\Platform\Http\Controllers\WebService;

use Hito\Platform\Http\Controllers\Controller;
use Hito\Platform\Models\User;
use Hito\Platform\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
        $this->authorizeResource(User::class);
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->userService->getAll());
    }

    public function update(User $user)
    {
        $data = $this->validate(request(), [
            'location_id' => 'uuid'
        ]);

        return response()->json($this->userService->update($user->id, $data));
    }
}
