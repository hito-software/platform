<?php

namespace Hito\Platform\Http\Controllers;

use Hito\Core\Module\DTO\MenuDTO;
use Hito\Core\Module\DTO\MenuItemDTO;
use Hito\Core\Module\Facades\Menu;
use Hito\Platform\Http\Requests\UpdateUserRequest;
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
        $this->createMenus();
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
     * @param UpdateUserRequest $request
     * @return RedirectResponse
     */
    public function updateProfile(UpdateUserRequest $request): RedirectResponse
    {
        $user = auth()->user();

        $data = request()->only(['name', 'surname', 'email', 'phone', 'skype', 'whatsapp', 'telegram', 'birthdate']);
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

    private function createMenus(): void
    {
        $menu = new MenuDTO('general', 'General', 'fas fa-users', order: 1, group: 'account');
        $menu->addItem(new MenuItemDTO('Account information', 'account.edit-profile', 'fas fa-user', 'users.update-own'));
        $menu->addItem(new MenuItemDTO('My profile', ['users.show', auth()->id()], 'fas fa-user', 'users.update-own'));
        Menu::add($menu);

        $menu = new MenuDTO('security', 'Security', 'fas fa-users', order: 2, group: 'account');
        $menu->addItem(new MenuItemDTO('Password', 'account.edit-password', 'fas fa-unlock',
            'users.update-own'));
        $menu->addItem(new MenuItemDTO('Two factor authentication', 'account.dashboard',
            'fas fa-fingerprint', 'users.update-own'));
        Menu::add($menu);

        $menu = new MenuDTO('other', 'Other', 'fas fa-users', order: 3, group: 'account');
        $menu->addItem(new MenuItemDTO('Notifications', 'notifications.index', 'fas fa-bell'));
        $menu->addItem(new MenuItemDTO('Help', 'account.dashboard', 'fas fa-question-circle'));
        $menu->addItem(new MenuItemDTO('Logout', 'auth.logout', 'fas fa-sign-out-alt'));
        Menu::add($menu);
    }
}
