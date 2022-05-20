<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Core\Module\Facades\Menu;
use Illuminate\Contracts\View\View;
use Hito\Platform\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    /**
     * @return View
     */
    public function dashboard(): View
    {
        $menus = Menu::getAllByUser(auth()->user(), 'account');

        return view('hito::account-dashboard', compact('menus'));
    }


    /**
     * @return View
     */
    public function editProfile(): View
    {
        $user = auth()->user();

        $this->authorize('update', $user);

        return view('hito::account-edit-profile', compact('user'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignoreModel($user)
            ],
            'phone' => 'nullable|numeric|regex:/^[\+]?[0-9]{4,20}$/',
            'skype' => 'nullable',
            'whatsapp' => 'nullable',
            'telegram' => 'nullable',
            'location' => 'required|uuid',
            'timezone' => 'required|uuid',

        ]);
        $data = request()->only(['name', 'surname', 'email', 'phone', 'skype', 'whatsapp', 'telegram']);
        $data['location_id'] = request('location');
        $data['timezone_id'] = request('timezone');

        $this->userService->update($user->id, $data);
        return back()->with('success', 'Your profile was updated successfully');
    }

    /**
     * @return View
     */
    public function editPassword(): View
    {
        $user = auth()->user();

        return view('hito::account-edit-password', compact('user'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function updatePassword(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $this->authorize('update', $user);

        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        $this->userService->update($user->id, request()->only('password'));
        return back()->with('success', 'Your password was updated successfully');
    }
}
